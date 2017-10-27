<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\I18n\Time;
use Cake\Mailer\Email;

/**
 * SolicitacaoPareceres Controller
 *
 * @property \App\Model\Table\SolicitacaoPareceresTable $SolicitacaoPareceres
 */
class SolicitacaoPareceresController extends AppController {

    public function indexParecerista() {

        $pessoa_usuario = $this->Auth->user('pessoa_id');
        $query = $this->SolicitacaoPareceres->find('all', ['contain' => ['Projetos']])->where(['id_pessoa' => $pessoa_usuario, 'situacao' => \App\Model\Entity\SolicitacaoParecer::TPSIT_AGUARDANDO]);
        $solicitacoes_pendentes = $this->SolicitacaoPareceres->find('all', ['contain' => ['Projetos']])->where(['id_pessoa' => $pessoa_usuario, 'situacao' => \App\Model\Entity\SolicitacaoParecer::TPSIT_ACEITO]);
        $this->set('solicitacoes_pendentes', $this->paginate($solicitacoes_pendentes));
        $this->set('solicitacoes', $this->paginate($query));
//        die(print_r($query));

        $this->set('solicitacoes', $this->paginate($query));
        $this->set('_serialize', ['projetos']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Pessoas', 'Projetos']
        ];
        $this->set('solicitacaoPareceres', $this->paginate($this->SolicitacaoPareceres));
        $this->set('_serialize', ['solicitacaoPareceres']);
    }

    /**
     * View method
     *
     * @param string|null $id Solicitacao Parecere id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $solicitacaoParecere = $this->SolicitacaoPareceres->get($id, [
                'contain' => ['Pessoas', 'Projetos']
            ]);
              $this->loadModel('Pareceres');
            if ($solicitacaoParecere != null) {
               
                 $parecere = $this->Pareceres->find()
                         ->where(['id_solicitacao_parecer' =>$solicitacaoParecere->id]);
                $this->set('solicitacaoParecere', $solicitacaoParecere);
                $this->set('pareceres', $this->paginate($parecere));
                $this->set('_serialize', ['solicitacaoParecere']);
                $this->set('_serialize', ['$parecere']);
            }
        } catch (\PDOException $ex) {
            $this->Flash->error(__('O Usuário não pode ser removido  pois esta associado a outros registros!'));
        }
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function addSolicitacao($projeto_id = null) {

        $this->loadModel('Projetos');
        $projeto = $this->Projetos->get($projeto_id, [
            'contain' => ['Acompanhamentos', 'SolicitacaoPareceres']
        ]);
        $nome_projeto = $projeto->tituto_projeto;

        $tipos_pareceres = \App\Model\Entity\Parecere::tiposPareceres();

        $solicitacaoParecer = $this->SolicitacaoPareceres->newEntity();
        $solicitacaoParecer->data_limite_aceite = Time::now();
        $solicitacaoParecer->data_limite_aceite->addDays(15);
        $solicitacaoParecer->data_limite_envio = Time::now();
        $solicitacaoParecer->data_limite_envio->addDays(45);
        $solicitacaoParecer->created = Time::now();
        if ($this->request->is('post')) {
            $solicitacaoParecer = $this->SolicitacaoPareceres->patchEntity($solicitacaoParecer, $this->request->data);
            $solicitacaoParecer->id_projeto = $projeto_id;
            $solicitacaoParecer->created_by = $this->Auth->user('id');
            $solicitacaoParecer->data_solicitacao = new Time();
            $solicitacaoParecer->situacao = 1;

            $emailPessoa = $this->SolicitacaoPareceres->Pessoas->get($this->request->data['id_pessoa'], [
                'contain' => []
            ]);


            $eventos = new EventosController();
            $s = new \App\Model\Entity\Setore();
            $setor = $s->setorResponsavel(\App\Model\Entity\Projeto::SETOR_PARECERISTA);

            if ($this->SolicitacaoPareceres->save($solicitacaoParecer)) {
                $ress = $eventos->registraEvento(['pid' => $projeto_id, 'tipo' => 1, 'descricao' => 'Designado parecerista.',
                    'setor_destino' => $setor->id, 'responsavel_id' => $this->Auth->user('pessoa_id')]);
                //$email = new Email('default');
                //$email->from(['chsguitar1@gmail.com' => 'Cope'])
                  //      ->to($emailPessoa->email)
                    //    ->subject('Projeto Cope')
                      //  ->send('Foi designado um projeto  para sua apreciação');
                $this->Flash->success(__('A solicitação foi salva!'));


                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar a solicitação, tente novamente.'));
            }
        }
        $pessoas = $this->SolicitacaoPareceres->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->SolicitacaoPareceres->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('solicitacaoParecer', 'pessoas', 'projetos', 'nome_projeto', 'tipos_pareceres'));
        $this->set('_serialize', ['solicitacaoParecer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $solicitacaoParecere = $this->SolicitacaoPareceres->newEntity();
        if ($this->request->is('post')) {
            $solicitacaoParecere = $this->SolicitacaoPareceres->patchEntity($solicitacaoParecere, $this->request->data);
            if ($this->SolicitacaoPareceres->save($solicitacaoParecere)) {
                $this->Flash->success(__('The solicitacao parecere has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solicitacao parecere could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->SolicitacaoPareceres->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->SolicitacaoPareceres->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('solicitacaoParecere', 'pessoas', 'projetos'));
        $this->set('_serialize', ['solicitacaoParecere']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Solicitacao Parecere id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $solicitacaoParecere = $this->SolicitacaoPareceres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solicitacaoParecere = $this->SolicitacaoPareceres->patchEntity($solicitacaoParecere, $this->request->data);
            if ($this->SolicitacaoPareceres->save($solicitacaoParecere)) {
                $this->Flash->success(__('The solicitacao parecere has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solicitacao parecere could not be saved. Please, try again.'));
            }
        }


        $pessoas = $this->SolicitacaoPareceres->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->SolicitacaoPareceres->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('solicitacaoParecere', 'pessoas', 'projetos'));
        $this->set('_serialize', ['solicitacaoParecere']);
    }

    public function aceitar($id = null) {
        $solicitacaoParecer = $this->SolicitacaoPareceres->get($id, [
            'contain' => []
        ]);
        $pessoa_id = $this->Auth->user('pessoa_id');
        $solicitacaoParecer->id_pessoa;

        if ($solicitacaoParecer->id_pessoa != $pessoa_id) {
            $this->Flash->error(__('Acesso Negado'));
            return $this->redirect(['action' => 'index-parecerista']);
        }

//        die(print_r($solicitacaoParecer));

        if ($solicitacaoParecer->situacao != \App\Model\Entity\SolicitacaoParecer::TPSIT_AGUARDANDO) {
            $this->Flash->error(__('Parecer não disponível para aceitação!'));

            return $this->redirect(['action' => 'index-parecerista']);
        }


        $solicitacaoParecer->situacao = \App\Model\Entity\SolicitacaoParecer::TPSIT_ACEITO;
        $solicitacaoParecer->data_aceitacao_rejeicao = Time::now();

        $this->SolicitacaoPareceres->save($solicitacaoParecer);
        $this->Flash->success("Parecer aceito com sucesso!");
        return $this->redirect(['action' => 'index-parecerista']);
    }

    public function rejeitar($id = null) {
        $solicitacaoParecer = $this->SolicitacaoPareceres->get($id, [
            'contain' => []
        ]);
        $pessoa_id = $this->Auth->user('pessoa_id');
        $solicitacaoParecer->id_pessoa;

        if ($solicitacaoParecer->id_pessoa != $pessoa_id) {
            $this->Flash->error(__('Acesso Negado'));
            return $this->redirect(['action' => 'index-parecerista']);
        }

//        die(print_r($solicitacaoParecer));

        if ($solicitacaoParecer->situacao != \App\Model\Entity\SolicitacaoParecer::TPSIT_AGUARDANDO) {
            $this->Flash->error(__('Parecer não disponível para rejeição!'));

            return $this->redirect(['action' => 'index-parecerista']);
        }


        $solicitacaoParecer->situacao = \App\Model\Entity\SolicitacaoParecer::TPSIT_REJEITADO;
        $solicitacaoParecer->data_aceitacao_rejeicao = Time::now();

        $this->SolicitacaoPareceres->save($solicitacaoParecer);
        $this->Flash->success("Parecer rejeitado com sucesso!");
        return $this->redirect(['action' => 'index-parecerista']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Solicitacao Parecere id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $solicitacaoParecere = $this->SolicitacaoPareceres->get($id);
        if ($this->SolicitacaoPareceres->delete($solicitacaoParecere)) {
            $this->Flash->success(__('The solicitacao parecere has been deleted.'));
        } else {
            $this->Flash->error(__('The solicitacao parecere could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function download($id = null) { {
            $anexo = $this->SolicitacaoPareceres->get($id, ['contain' => 'Pareceres']);

            $file = new File($anexo->arquivo);

            // a view.
            //$this->response->file($file, ['download' => true, 'name' => $anexo->nome]);
//            die($file->path);
            $this->response->file($file->path);
            return $this->response;
        }
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];

        if ($this->request->action === 'redirecionar') {
            return true;
        }



        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['add', 'edit', 'view', 'index', 'addSolicitacao'])) {
                return true;
            }
        }

        if ($role == User::ROLE_PARECERISTA) {
            if (in_array($this->request->action, ['view', 'indexParecerista', 'aceitar', 'rejeitar'])) {
                return true;
            }
        }


        return parent::isAuthorized($user);
    }

}
