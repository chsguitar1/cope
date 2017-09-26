<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;

/**
 * Pareceristas Controller
 *
 * @property \App\Model\Table\PareceristasTable $Pareceristas
 */
class PareceristasController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $this->set('pareceristas', $this->paginate($this->Pareceristas));
        $this->set('_serialize', ['pareceristas']);
    }

    /**
     * View method
     *
     * @param string|null $id Parecerista id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $parecerista = $this->Pareceristas->get($id, [
            'contain' => ['Pessoas', 'Projetos', 'Pareceres', 'Pareceristas']
        ]);
        $this->set('parecerista', $parecerista);
        $this->set('_serialize', ['parecerista']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $parecerista = $this->Pareceristas->newEntity();
        if ($this->request->is('post')) {
            $parecerista = $this->Pareceristas->patchEntity($parecerista, $this->request->data);
            if ($this->Pareceristas->save($parecerista)) {
                $this->Flash->success(__('The parecerista has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parecerista could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->Pareceristas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('parecerista', 'pessoas'));
        $this->set('_serialize', ['parecerista']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parecerista id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $parecerista = $this->Pareceristas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parecerista = $this->Pareceristas->patchEntity($parecerista, $this->request->data);
            if ($this->Pareceristas->save($parecerista)) {
                $this->Flash->success(__('The parecerista has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parecerista could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->Pareceristas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('parecerista', 'pessoas'));
        $this->set('_serialize', ['parecerista']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parecerista id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $parecerista = $this->Pareceristas->get($id);
        if ($this->Pareceristas->delete($parecerista)) {
            $this->Flash->success(__('The parecerista has been deleted.'));
        } else {
            $this->Flash->error(__('The parecerista could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function definirParecerista($id = null) {

        $this->loadModel('Projetos');
        $projeto = $this->Projetos->get($id, [
            'contain' => ['Acompanhamentos']
        ]);


        $parecerista = $this->Pareceristas->newEntity();
        if ($this->request->is('post')) {
            $parecerista = $this->Pareceristas->patchEntity($parecerista, $this->request->data);

            $parecerista->created_by = $this->Auth->user('id');
            $parecerista->projeto_id = $id;
            $projeto->parecerista_id = $parecerista->parecerista_id;
            if ($this->Pareceristas->save($parecerista) && $this->Projetos->save($projeto)) {

                $eventos = new EventosController();

                $s = new \App\Model\Entity\Setore();
                $setor = $s->setorResponsavel(\App\Model\Entity\Projeto::SETOR_PARECERISTA);
//                die(print_r($setor));
                if ($parecerista->prazo != null) {
                    $ress = $eventos->registraEvento(['pid' => $projeto['id'], 'tipo' => \App\Model\Entity\Evento::TP_MOV_PARECERISTA,
                        'descricao' => 'Designado parecerista prazo, ' . date_format($parecerista->prazo, 'd/m/Y') . '.', 'setor_destino' => $setor->id, 'responsavel_id' => $parecerista->parecerista_id]);
                } else {
                    $ress = $eventos->registraEvento(['pid' => $projeto['id'], 'tipo' => 1, 'descricao' => 'Designado parecerista.', 'setor_destino' => $setor->id, 'responsavel_id' => $parecerista->parecerista_id]);
                }

                $this->Flash->success(__('O parecerista foi salvo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o parecerecista.'));
            }
        }

        $pessoas = $this->Pareceristas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('parecerista', 'pessoas', 'projeto'));
        $this->set('_serialize', ['parecerista']);
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];

        if ($this->request->action === 'redirecionar') {
            return true;
        }

        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['edit', 'view', 'definirParecerista'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
