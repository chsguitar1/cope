<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Utility\Text;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

/**
 * Pareceres Controller
 *
 * @property \App\Model\Table\PareceresTable $Pareceres
 */
class PareceresController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    
    public function encaminharParecer($id = null) {
        $parecer = $this->Pareceres->newEntity();
        $this->loadModel('SolicitacaoPareceres');
        $solicitacaoParecer = $this->SolicitacaoPareceres->get($id, [
            'contain' => ['Pessoas', 'Projetos']
        ]);
        
        if ($this->request->is('post')) {
            $parecerNovo = $this->Pareceres->patchEntity($parecer, $this->request->data);
            $btn = $this->request->data()['submit'];
            if ($btn == 'voltar') {
                return $this->redirect(['action' => 'index']);
            }

            $parecerNovo->is_solicitacao_parecer = $id;
         //   if ($parecerNovo->tipo_parecer > 1) {
//                if ($this->request->data['arquivo']) {
//                    $filename = $this->request->data['arquivo']['name'];
//                    $tmp_path = $this->request->data['arquivo']['tmp_name'];
//                    $novo_nome = Text::uuid() . '-' . $filename;
//                    $file_old = new File($tmp_path);
//                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
//                    //die($ext);
//                    if (!in_array(strtolower($ext), ['pdf', 'jpg', 'doc', 'docx'])) {
//                        $this->Flash->error(__('A extensão não é permitida.'));
//                        return $this->redirect(['action' => 'addAnexos', $projeto->id]);
//                    }
////                copy(string $dest, boolean $overwrite = true)
//
//                    $dir = new Folder('anexos', true);
//                    $file_old->copy('anexos/' . $novo_nome, true);
//                }

              //  $parecerNovo->arquivo = 'anexos/' . $novo_nome;
             //   $parecerNovo->nome_arquivo = $filename;
           // }
            $parecerNovo->data_recebimento = \Cake\I18n\Time::now();
            $parecerNovo->id_solicitacao_parecer = $solicitacaoParecer->id;
          //  debug($parecerNovo); exit;
            if ($this->Pareceres->save($parecerNovo)) {
                $this->Flash->success(__('O Parecer foi salvo.'));
                $eventos = new EventosController();
                $eventos->registraEvento(['pid' => $solicitacaoParecer->id_projeto, 'tipo' => \App\Model\Entity\Evento::TP_MOV_PARECERISTA, 'descricao' => 'Pareceber encaminhado.', 'responsavel_id' => $this->Auth->user('pessoa_id')]);


                $solicitacaoParecer->situacao = \App\Model\Entity\SolicitacaoParecer::TPSIT_CONCLUIDO;
                $this->SolicitacaoPareceres->save($solicitacaoParecer);
                return $this->redirect(['controller' => 'projetos', 'action' => 'index-parecerista']);
            } else {
                $this->Flash->error(__('Erro ao salvar o Parecer. Tente novamente.'));
            }
        }
        $this->set('solicitacaoParecer', $solicitacaoParecer);
        $this->set('parecer', $parecer);
        $this->set('_serialize', ['parecer']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Pareceres', 'Projetos']
        ];
        $this->set('pareceres', $this->paginate($this->Pareceres));
        $this->set('_serialize', ['pareceres']);
    }

    /**
     * View method
     *
     * @param string|null $id Parecere id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $parecere = $this->Pareceres->get($id, [
            'contain' => [ 'Projetos']
        ]);
        $this->set('parecere', $parecere);
        $this->set('_serialize', ['parecere']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $parecere = $this->Pareceres->newEntity();
        if ($this->request->is('post')) {
            $parecere = $this->Pareceres->patchEntity($parecere, $this->request->data);
            if ($this->Pareceres->save($parecere)) {
                $this->Flash->success(__('The parecere has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parecere could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->Pareceres->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->Pareceres->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('parecere', 'pessoas', 'projetos'));
        $this->set('_serialize', ['parecere']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parecere id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $parecere = $this->Pareceres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parecere = $this->Pareceres->patchEntity($parecere, $this->request->data);
            if ($this->Pareceres->save($parecere)) {
                $this->Flash->success(__('The parecere has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parecere could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->Pareceres->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->Pareceres->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('parecere', 'pessoas', 'projetos'));
        $this->set('_serialize', ['parecere']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parecere id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $parecere = $this->Pareceres->get($id);
        if ($this->Pareceres->delete($parecere)) {
            $this->Flash->success(__('The parecere has been deleted.'));
        } else {
            $this->Flash->error(__('The parecere could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

//    public function download($idSol = null) { {
//            $this->loadModel('SolicitacaoPareceres');
//            $anexo = $this->Pareceres->find('all', ['conditions' => ['id_solicitacao_parecer' => $idSol]]);
//            $file = new File($anexo->first()->arquivo);
//            $this->response->file($file->path);
//            return $this->response;
//        }
//    }
    public function download($id = null) {
     
    $ $parecere = $this->Pareceres->get('1', [
            'contain' => [ 'SolicitacaoPareceres']
        ]);
        $this->set('parecere', $parecere);
        $this->set('_serialize', ['parecere']);
    }
    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];

        if ($this->request->action === 'redirecionar') {
            return true;
        }

        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['add', 'edit', 'view', 'index', 'addSolicitacao', 'download'])) {
                return true;
            }
        }

        if ($role == User::ROLE_PARECERISTA) {
            if (in_array($this->request->action, ['encaminharParecer'])) {
                return true;
            }
        }


        return parent::isAuthorized($user);
    }

}
