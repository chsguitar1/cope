<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RoleUsers Controller
 *
 * @property \App\Model\Table\RoleUsersTable $RoleUsers
 */
class RoleUsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('roleUsers', $this->paginate($this->RoleUsers));
        $this->set('_serialize', ['roleUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Role User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roleUser = $this->RoleUsers->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('roleUser', $roleUser);
        $this->set('_serialize', ['roleUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roleUser = $this->RoleUsers->newEntity();
        if ($this->request->is('post')) {
            $roleUser = $this->RoleUsers->patchEntity($roleUser, $this->request->data);
            if ($this->RoleUsers->save($roleUser)) {
                $this->Flash->success(__('The role user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The role user could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->RoleUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('roleUser', 'users'));
        $this->set('_serialize', ['roleUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roleUser = $this->RoleUsers->get($usuario_id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roleUser = $this->RoleUsers->patchEntity($roleUser, $this->request->data);
            if ($this->RoleUsers->save($roleUser)) {
                $this->Flash->success(__('The role user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The role user could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->RoleUsers->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('roleUser', 'usuarios'));
        $this->set('_serialize', ['roleUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roleUser = $this->RoleUsers->get($id);
        if ($this->RoleUsers->delete($roleUser)) {
            $this->Flash->success(__('The role user has been deleted.'));
        } else {
            $this->Flash->error(__('The role user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
