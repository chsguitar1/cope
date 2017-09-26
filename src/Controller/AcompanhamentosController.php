<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;

/**
 * Acompanhamentos Controller
 *
 * @property \App\Model\Table\AcompanhamentosTable $Acompanhamentos
 */
class AcompanhamentosController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index($id = null) {
        $acompanhamento = $this->Acompanhamentos->newEntity();
        $this->loadModel('Projetos');
        $projeto = $this->Projetos->get($id, [
            'contain' => ['Acompanhamentos', 'Acompanhamentos.Users', 'Acompanhamentos.Users.Pessoas']
        ]);

        if ($this->request->is('post')) {
            $acompanhamento = $this->Acompanhamentos->patchEntity($acompanhamento, $this->request->data);
            $acompanhamento->projeto_id = $id;
            $acompanhamento->created_by = $this->Auth->user('id');
            if ($this->Acompanhamentos->save($acompanhamento)) {
                $this->Flash->success(__('O Acompanhamento foi salvo.'));
                return $this->redirect(['action' => 'index', $id]);
            } else {
                $this->Flash->error(__('The acompanhamento could not be saved. Please, try again.'));
            }
        }

        $this->paginate = [
            'contain' => ['Projetos']
        ];

        $a = new \App\Model\Entity\Acompanhamento();
        $tipos = $a->tiposAcompanhamentos();

        $this->set(compact('projeto', 'tipos', 'acompanhamento'));
        $this->set('acompanhamentos', $this->paginate($this->Acompanhamentos));
        $this->set('_serialize', ['acompanhamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Acompanhamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $acompanhamento = $this->Acompanhamentos->get($id, [
            'contain' => ['Projetos']
        ]);
        $this->set('acompanhamento', $acompanhamento);
        $this->set('_serialize', ['acompanhamento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $acompanhamento = $this->Acompanhamentos->newEntity();
        if ($this->request->is('post')) {
            $acompanhamento = $this->Acompanhamentos->patchEntity($acompanhamento, $this->request->data);
            if ($this->Acompanhamentos->save($acompanhamento)) {
                $this->Flash->success(__('The acompanhamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The acompanhamento could not be saved. Please, try again.'));
            }
        }
        $projetos = $this->Acompanhamentos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('acompanhamento', 'projetos'));
        $this->set('_serialize', ['acompanhamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Acompanhamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $acompanhamento = $this->Acompanhamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acompanhamento = $this->Acompanhamentos->patchEntity($acompanhamento, $this->request->data);
            if ($this->Acompanhamentos->save($acompanhamento)) {
                $this->Flash->success(__('The acompanhamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The acompanhamento could not be saved. Please, try again.'));
            }
        }
        $projetos = $this->Acompanhamentos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('acompanhamento', 'projetos'));
        $this->set('_serialize', ['acompanhamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Acompanhamento id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $acompanhamento = $this->Acompanhamentos->get($id);
        if ($this->Acompanhamentos->delete($acompanhamento)) {
            $this->Flash->success(__('The acompanhamento has been deleted.'));
        } else {
            $this->Flash->error(__('The acompanhamento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function getNomePessoa($id = null) {
        
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];
        if ($this->request->action === 'redirecionar') {
            return true;
        }

        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['add', 'edit', 'view', 'index'])) {
                return true;
            }
        }




        return parent::isAuthorized($user);
    }

}
