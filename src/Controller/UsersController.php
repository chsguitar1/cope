<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\RoleUser;
use App\Model\Entity\User;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Pessoas']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {


                $this->Flash->success(__('O Usuário foi adicionado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possivel adicionar este usuário'));
            }
        }
        $pessoas = $this->Users->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('user', 'pessoas'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O Usuário foi adicionado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possivel adicionar este usuário'));
            }
        }
        $pessoas = $this->Users->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('user', 'pessoas'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        try {
            if ($user->id > 1) {
                $this->Users->delete($user) .
                        $this->Flash->success(__('O Usuário foi removido com sucesso!'));
            } else {
                $this->Flash->error(__('Este Usuário não pode ser removido!'));
            }
        } catch (\PDOException $ex) {
            $this->Flash->error(__('O Usuário não pode ser removido  pois esta associado a outros registros!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        // die();
        $this->loadModel('RoleUsers');
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                $role = $this->RoleUsers->get(['usuario_id' => $user['id'], 'role' => $user['default_role']]);
                //$user['role'] = $role['role'];

                $this->request->session()->write('role', $role);

                if (isset($role)) {
                    $this->Auth->setUser($user);

                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Dados inconsistêntes, comunique o administrador.'));
                }
            }


            $this->Flash->error(__('Usuário ou senha inválidos.'));
        }
    }

    public function logout() {
//        debug($this->Auth);
//        debug($this->params);
//        exit;
        $this->Auth->logout();
        return $this->redirect("/");
    }

    public function alterarPerfil() {
        if ($this->request->is('post')) {

            $new_role = $this->request->data()['role'];
            $user_id = $this->Auth->user('id');
            $this->log($user_id . ' - ' . $new_role);


            $role = \App\Model\Entity\User::userHasHole($user_id, $new_role);

            if ($role != null) {

                $this->request->session()->write('role', $role);

                return $this->redirect(['controller' => 'projetos', 'action' => 'redirecionar', $role['role']]);
            } else {
                $this->Flash->error(__('Acesso negado!'));
            }
        } else {
            die('sem post');
        }
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];


//        debug($user);
//        debug($this->request->action);
//        debug($role);
//        exit;


        if ($this->request->action === 'alterarPerfil') {
            return true;
        } elseif ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['edit', 'view', 'index', 'add', 'logout'])) {
                return true;
            }
        } elseif ($role == User::ROLE_PARECERISTA) {
            if (in_array($this->request->action, ['edit', 'view', 'index', 'add', 'logout'])) {
                return true;
            }
        
        } elseif ($role == User::ROLE_PROPONENTE) {
            if (in_array($this->request->action, ['edit', 'view', 'index', 'add', 'logout'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}
