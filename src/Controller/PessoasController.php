<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */
class PessoasController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('pessoas', $this->paginate($this->Pessoas));
        $this->set('_serialize', ['pessoas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['ParticipantesProjetos']
        ]);
        $this->set('pessoa', $pessoa);
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            $pessoa->created_by = $this->Auth->user('id');
            $pessoa->modified_by = $this->Auth->user('id');

            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pessoa'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            $pessoa->modified_by = $this->Auth->user('id');
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pessoa'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($id > 1) {
            try {
               $this->Pessoas->delete($pessoa);
                $this->Flash->success(__(' ' . $pessoa->nome . ' foi removido com sucesso! '));
            } catch (\PDOException $ex) {
                $nome = $pessoa->nome;
                $this->Flash->error(__('A pessoa ' . $pessoa->nome . ' não pode ser removido pois esta associado a outros registros!'));
            }
        }else{
            $this->Flash->success(__('O Administrador não pode ser removido! ')); 
        }
        return $this->redirect(['action' => 'index']);
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
            if (in_array($this->request->action, ['edit', 'view', 'index', 'add'])) {
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
