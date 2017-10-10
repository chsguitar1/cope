<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Model\Entity\User;



/**
 * Projetos Controller
 *
 * @property \App\Model\Table\ProjetosTable $Projetos
 */
class ProjetosController extends AppController {

    public function lastProtocolo() {
        //$q = $this->Projetos->find('all', ['fields' => ['MAX(Projetos.num_protocolo)']]);
        $q = $this->Projetos->find()->select(['max' => 'MAX(Projetos.num_protocolo)']);
//        $q = $this->Projetos->find();
//        $q = $q->select(['max' => $q->func()->max('num_protocolo')]);
//        $q->select(['num_protocolo']);
//        printf($q);
        return $q->first()->toArray()['max'];
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $pessoa = $this->Auth->user('pessoa_id');
//        $query = $this->Projetos->find('all')->contain(['Cursos', 'Pessoas', 'AreasConhecimentos', 'Setores']);
        $query = $this->Projetos->find('all')->contain(['Cursos', 'Pessoas', 'AreasConhecimentos', 'Setores','Cronograma'])
//                ->hydrate(false)
                        ->join([
                            'p' => [
                                'table' => 'participantes_projetos',
                                'type' => 'LEFT',
                                'conditions' => 'p.projeto_id = Projetos.id',
                            ],
                        ])->where(['OR' => ['Projetos.created_by' => $this->Auth->user('id'), 'p.pessoa_id' => $pessoa]])->distinct();
//        $this->paginate = [
//            'contain' => ['Cursos', 'Pessoas', 'AreasConhecimentos', 'Setores']
//        ];
//        $this->set('projetos', $this->paginate($this->Projetos));
       //debug($query); exit;
        
       
     
        $this->set('projetos', $this->paginate($query));
        
        $this->set('_serialize', ['projetos']);
       
        
        
    }

    /**
     * Index method
     *
     * @return void
     */
    public function indexParecerista() {

        $pessoa_usuario = $this->Auth->user('pessoa_id');
        $query = $this->Projetos->find('all')->where(['parecerista_id' => $pessoa_usuario]);
   //     $this->set('projetos', $this->paginate($query));
//        $this->paginate = [
//            'contain' => ['Cursos', 'Pessoas', 'AreasConhecimentos', 'Setores']
//        ];
        $this->set('projetos', $this->paginate($query));
        $this->set('_serialize', ['projetos']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function indexPresidente() {

        $this->paginate = [
            'contain' => ['Cursos', 'Pessoas'], 'finder' => 'protocolados'
        ];
       
        $this->set('role', User::ROLE_PROPONENTE);
        $this->set('projetos', $this->paginate($this->Projetos));
        $this->set('_serialize', ['projetos']);
        $this->set('_serialize', ['role']);
    }

    /**
     * View method
     *
     * @param string|null $id Projeto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $projeto = $this->Projetos->get($id, [
            'contain' => ['Cursos', 'created_user', 'created_user.Pessoas', 'Pessoas', 'SolicitacaoPareceres', 'SolicitacaoPareceres.Pessoas',
                'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas', 'Eventos', 'Eventos.Pessoas',
                'Eventos.Setores', 'Acompanhamentos', 'Acompanhamentos.Users', 'Acompanhamentos.Users.Pessoas', 'Cronograma']
        ]);
        $role = $this->request->session()->read('role')['role'];
        $isCoor = $projeto->isCoordenador($this->Auth->user(), $projeto);
//        if (!$isCoor && $role == User::ROLE_PROPONENTE  ) {
//            $this->Flash->error(__('Usuário não tem permissão para visualizar o Projeto.'));
//            return $this->redirect(['action' => 'index']);
//        }
//        $role = $this->request->session()->read('role')['role'];
        $this->set('projeto', $projeto);
        $this->set('user_role', $role);
        $this->set('_serialize', ['projeto']);
        $eventos = $this->loadModel('Eventos');
//        $q = $eventos->find()
//                ->where(['projeto_id =' => $id])
//                ->order(['data_evento' => 'DESC']);
//
//        $eventosProjeto = $q->toArray();
//        die(print_r($projeto));
    }

    public function preProtocolo($id = null) {
//        die($this->lastProtocolo());
        $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Anexos', 'Pessoas', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
        $this->set('projeto', $projeto);
        $this->set('_serialize', ['projeto']);
        $this->loadModel('Anexos');
        $anexo = $this->Anexos->newEntity();
//        die(print_r($projeto->participantes_projetos));
        $temA = $anexo->temDespacho($projeto->anexos);
        $incosistencias = $projeto->inconsistencias($projeto);
        if (!$projeto->rascunho) {
            $this->Flash->error(__('Projeto já protocolado.'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('post')) {
            $rVal = $projeto->validarPreProtocolo();
            if ($rVal != null) {
                $this->Flash->error(__('Erro: ' . $rVal));
            } else {
                $projeto->rascunho = false;
                $projeto->data_protocolo = date('Y-m-d H:i:s');
                $projeto->num_protocolo = $this->lastProtocolo() + 1;
                $setor = \App\Model\Entity\Projeto::setorAtualProtocolo($projeto);
                $projeto->setor_atual = $setor->id;
                if ($this->Projetos->save($projeto)) {
                    $this->Flash->success(__('Projeto Protocolado com Sucesso número de protocolo ' . $projeto->num_protocolo . '.'));
                    $this->log(['projeto_id ' => $projeto->id, 'tipo' => 0, 'descricao' => 'Projeto autuado no sistema.']);
                    //App::import('Controller', 'Eventos');
                    $eventos = new EventosController();
                    $ress = $eventos->registraEvento(['pid' => $projeto['id'], 'tipo' => 0, 'descricao' => 'Projeto autuado no sistema.', 'setor_destino' => $setor->id, 'responsavel_id' => $this->Auth->user('pessoa_id')]);
                    $this->log($ress);
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Erro ao protocolar o processo.'));
                }
            }
            $this->log('Protocolando! ' . $rVal);
        }
        $this->set('inconsistencias', $incosistencias);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $projeto = $this->Projetos->newEntity();
        if ($this->request->is('post')) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->data);
            $projeto->situacao_projeto = 0;
            $projeto->created_by = $this->Auth->user('id');
            $projeto->modified_by = $this->Auth->user('id');
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
            }
        }
        $cursos = $this->Projetos->Cursos->find('list', ['limit' => 200]);
        $pessoas = $this->Projetos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('projeto', 'cursos', 'pessoas'));
        $this->set('_serialize', ['projeto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function addRequerente() {

        $this->loadComponent('Date');
        $this->log($this->request->data);
        $projeto = $this->Projetos->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['data_fim'] = $this->Date->formataDataCalendario($this->request->data['data_fim']);
            $this->request->data['data_inicio'] = $this->Date->formataDataCalendario($this->request->data['data_inicio']);
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->data);
            $projeto->situacao_projeto = 0;
            $projeto->rascunho = true;
            $setores = new \App\Model\Entity\Setore;
            $setor = $setores->setorResponsavel(\App\Model\Entity\Projeto::SETOR_PROPONENTE);
            $projeto->created_by = $this->Auth->user('id');
            $projeto->modified_by = $this->Auth->user('id');
            $setor = \App\Model\Entity\Projeto::setorAtualProtocolo($projeto);
            $projeto->setor_atual = $setor->id;
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('O Projeto foi salvo.'));
                return $this->redirect(['action' => 'addParticipantes', $projeto->id]);
            } else {
                $this->Flash->error(__('Erro ao salvara o projeto. Tente novamente.'));
            }
        }
        $this->loadModel('AreasConhecimentos');
        $areas = $this->AreasConhecimentos->newEntity()->populaAreas();
        $areas_tematicas = $this->Projetos->AreasTematicas->find('list', ['limit' => 200]);
        $linhas_extensao = $this->Projetos->LinhasExtensao->find('list', ['limit' => 200]);
        $cursos = $this->Projetos->Cursos->find('list', ['limit' => 200]);
        $pessoas = $this->Projetos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('projeto', 'cursos', 'pessoas', 'areas', 'areas_tematicas', 'linhas_extensao'));
        $this->set('_serialize', ['projeto']);
    }

    public function addParticipantes($id = null) {

        $this->loadModel('ParticipantesProjetos');
        $participante = $this->ParticipantesProjetos->newEntity();
        $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Pessoas', 'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
        if (!$projeto->rascunho) {
            $this->Flash->error(__('Não é possível alterar projeto protocolado.'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('post')) {
            $this->log("Inside POST!");
            $participante = $this->ParticipantesProjetos->patchEntity($participante, $this->request->data);
            $btn = $this->request->data()['submit'];
            if ($btn == 'salvar') {
                return $this->redirect(['action' => 'index']);
            }
//            if ($participante->data_entrada < $projeto->data_inicio) {
//                $this->Flash->error(__('Data deve ser posterior ao início do projeto. ' . $participante->data_abertura . ' - ' . $projeto->data_inicio));
//                $this->log('Data P. ' . $participante->data_abertura . ' - Data Pro. ' . $projeto->data_inicio);
//                return $this->redirect(['action' => 'addParticipantes', $projeto->id]);
//            }
            //setar Projeto
            $participante->projeto_id = $projeto->id;
            if ($this->ParticipantesProjetos->save($participante)) {
                $this->log("Participante salvo!");
                $this->Flash->success(__('O Participante foi salvo.'));
                $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Pessoas', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
                return $this->redirect(['action' => 'addParticipantes', $projeto->id]);
            } else {
                $this->Flash->error(__('Erro ao salvar o Participante. Tente novamente.'));
            }
        }


//        $participante = $this->ParticipantesProjetos->newEntity();



        $cursos = $this->Projetos->Cursos->find('list', ['limit' => 200]);
        $pessoas = $this->Projetos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('projeto', 'cursos', 'pessoas', 'participante'));
        $this->set('_serialize', ['projeto']);
    }

//     public function addCronograma($id = null){
//            $this->loadModel('Cronograma');
//        $cronograma = $this->Cronograma->newEntity();
//        $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Pessoas','Cronograma', 'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
//        
//        if ($this->request->is('post')) {
//            $cronograma = $this->Cronograma->patchEntity($cronograma, $this->request->data);
//            $cronograma->idprojeto = $projeto->id;
//            if ($this->Cronograma->save($cronograma)) {
//                $this->Flash->success(__('The cronograma has been saved.'));
//                return $this->redirect(['action' => 'index']);
//            } else {
//                $this->Flash->error(__('The cronograma could not be saved. Please, try again.'));
//            }
//        }
//        $this->set(compact('cronograma'));
//        $this->set('_serialize', ['cronograma']);
//    }

    /**
     * Edit method
     *
     * @param string|null $id Projeto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $projeto = $this->Projetos->get($id, [
            'contain' => []
        ]);

        if (!$projeto->rascunho) {
            $this->Flash->error(__('Impossível alterar projeto protocolado.'));
            return $this->redirect(['action' => 'index']);
        }
        $projeto->data_inicio = date_format($projeto->data_inicio, 'd/m/Y');


        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->loadComponent('Date');
            $this->request->data['data_fim'] = $this->Date->formataData($this->request->data['data_fim']);
            $this->request->data['data_inicio'] = $this->Date->formataData($this->request->data['data_inicio']);
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->data);
            $projeto->modified_by = $this->Auth->user('id');
            if (!empty($projeto->colegiado) && !empty($projeto->resumo) &&
                    !empty($projeto->palavras_chave) && !empty($projeto->fundamentacao) && !empty($projeto->objetivos) && !empty($projeto->recursos) && !empty($projeto->referencias) && !empty($projeto->metodologia)) {
                $projeto->status = true;
            } else {
                $projeto->status = false;
            }

            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('O projeto atualizado com sucesso!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O projeto não pode ser atualizado!'));
            }
        }

        $this->loadModel('AreasConhecimentos');
        $areas = $this->AreasConhecimentos->newEntity()->populaAreas();

        $cursos = $this->Projetos->Cursos->find('list', ['limit' => 200]);
        $pessoas = $this->Projetos->Pessoas->find('list', ['limit' => 200]);
         $cronograma = $this->Projetos->Cronograma->find()
                ->where(['idprojeto' => $projeto->id])
                ->contain(['Projetos']);
        
      //  debug($cronograma); exit;
        $this->set(compact('projeto', 'cursos', 'pessoas', 'areas','cronograma'));
        $this->set('_serialize', ['projeto']);
    }

    public function imprime() {
        $this->loadModel('Projeto');
        $estado = new Estado();

        $estados = $estado->getTodosEstados();

        $this->set(compact($estados, 'estados'));

        $this->layout = 'pdf';
//        App::import('Vendor', 'PDF');
        $pdf = new PDF('P', 'mm', 'A4');

        $pdf->AddPage();
        $pdf->SetFont("Arial", '', 6.7);

        $pdf->Cell(90, 4, 'Estados', 1, 1, 'L');
        foreach ($estados as $estado) {
            $pdf->Cell(90, 4, $estado, 1, 1, 'L');
        }

        $pdf->Output('doc.pdf', 'I');
        $pdf->Output('doc.pdf', 'D');
    }

    /**
     * Delete method
     *
     * @param string|null $id Projeto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projetos->get($id);
        try {
            $this->Projetos->delete($projeto);
            $this->Flash->success(__('O projeto foi removido com sucesso!'));
        } catch (\PDOException $e) {
            $this->Flash->error(__('O projeto não pode ser removido  pois esta associado a outros registros!'), ['clear' => true]);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete Participante method
     *
     * @param string|null $id Participante id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delParticipante($id = null) {
        $this->loadModel('ParticipantesProjetos');
        $this->request->allowMethod(['post', 'delete']);
        $participante = $this->ParticipantesProjetos->get($id);
        $projeto_id = $participante->projeto_id;
        $this->log($projeto_id);
        if ($this->ParticipantesProjetos->delete($participante)) {
            $this->Flash->success(__('Participante removido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao remover o participante.'));
        }
        return $this->redirect(['action' => 'addParticipantes', $projeto_id]);
    }

    public function addAnexos($id = null) {

        $this->loadModel('Projetos');
        // $anexo = $this->Anexos->newEntity();

        $projeto = $this->Projetos->get(3, ['contain' => ['Cursos', 'Pessoas', 'Anexos', 'Anexos.Users', 'Anexos.Users.Pessoas']]);

        if (!$projeto->rascunho) {
            $this->Flash->error(__('Não é possível alterar projeto protocolado.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('post')) {
            //$anexo = $this->ParticipantesProjetos->patchEntity($anexo, $this->request->data);
            $btn = $this->request->data()['submit'];
            if ($btn == 'voltar') {
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The ducumento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
            }
            // $anexo->projeto_id = $projeto->id;
//            if (isset($this->request->data['arquivo'])) {
//                $filename = $this->request->data['arquivo']['name'];
//                $tmp_path = $this->request->data['arquivo']['tmp_name'];
//
//
//                $novo_nome = Text::uuid() . '-' . $filename;
//
//                $file_old = new File($tmp_path);
//                $ext = pathinfo($filename, PATHINFO_EXTENSION);
//                //die($ext);
//                if (!in_array(strtolower($ext), ['pdf', 'jpg', 'doc', 'docx'])) {
//                    $this->Flash->error(__('A extensão não é permitida.'));
//                    return $this->redirect(['action' => 'addAnexos', $projeto->id]);
//                }
////                copy(string $dest, boolean $overwrite = true)
//
//
//                $dir = new Folder('anexos', true);
//                $file_old->copy('anexos/' . $novo_nome, true);
//            }
//            $anexo = $this->addAnexos()->patchEntity($this->request->data);
//            $anexo->descricao = $this->request->data['descricao'];
//            $anexo->tipo_anexo = $this->request->data['tipo_anexo'];
//            $anexo->caminho = 'anexos/' . $novo_nome;
//            $anexo->tamanho = $file_old->size();
//            $anexo->created_by = $this->Auth->user('id');
//
//            $anexo->nome = $filename;
//
//            if ($this->Anexos->save($anexo)) {
//                $this->Flash->success(__('O Anexo foi salvo.'));
//                return $this->redirect(['action' => 'addAnexos', $projeto->id]);
//            } else {
//                $this->Flash->error(__('Erro ao salvar o Anexo. Tente novamente.'));
//            }
        }


        $cursos = $this->Projetos->Cursos->find('list', ['limit' => 200]);
        $pessoas = $this->Projetos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('projeto', 'cursos', 'pessoas', 'participante', 'anexo'));
        //$this->set('_serialize', ['projeto']);
    }

    public function listarAnexos($id = null) {

        $this->loadModel('Anexos');
        $anexo = $this->Anexos->newEntity();

        $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Pessoas', 'Anexos', 'Anexos.Users', 'Anexos.Users.Pessoas']]);


        $cursos = $this->Projetos->Cursos->find('list', ['limit' => 200]);
        $pessoas = $this->Projetos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('projeto', 'cursos', 'pessoas', 'participante', 'anexo'));
        //$this->set('_serialize', ['projeto']);
    }

    public function delAnexo($id = null) {
        $this->loadModel('Anexos');
        $this->request->allowMethod(['post', 'delete']);
        $anexo = $this->Anexos->get($id);
        $projeto_id = $anexo->projeto_id;
        if ($this->Anexos->delete($anexo)) {
            $this->Flash->success(__('Anexo removido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao remover o Anexo.'));
        }
        return $this->redirect(['action' => 'addAnexos', $projeto_id]);
    }

    public function redirecionar($role = null) {
        
        

        $role = $this->request->session()->read('role')['role'];
       // debug($role); exit;
        switch ($role) {
            case \App\Model\Entity\User::ROLE_PROPONENTE :
                return $this->redirect(['action' => 'index']);
            case \App\Model\Entity\User::ROLE_ADMIN :
                return $this->redirect(['action' => 'index']);
            case \App\Model\Entity\User::ROLE_PRESIDENTE :
                return $this->redirect(['action' => 'index_presidente']);
            case \App\Model\Entity\User::ROLE_PARECERISTA :
                return $this->redirect(['controller' => 'SolicitacaoPareceres', 'action' => 'index_parecerista']);
        }
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];

        if ($this->request->action === 'redirecionar') {
            return true;
        }


        if ($role == User::ROLE_PARECERISTA) {
            if (in_array($this->request->action, ['indexParecerista', 'view'])) {
                return true;
            }
        }

        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['edit', 'view', 'indexPresidente', 'listarAnexos'])) {
                return true;
            }
        }

        if ($role == User::ROLE_PROPONENTE) {
            if (in_array($this->request->action, ['index', 'edit', 'view', 'preProtocolo', 'addRequerente', 'addParticipantes',
                        'delete', 'delParticipante', 'addAnexos', 'delAnexo', 'listarAnexos'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}
