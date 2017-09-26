<?php

namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;
use App\Model\Entity\User;
/**
 * Anexos Controller
 *
 * @property \App\Model\Table\AnexosTable $Anexos
 */
class AnexosController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('anexos', $this->paginate($this->Anexos));
        $this->set('_serialize', ['anexos']);
    }

    /**
     * View method
     *
     * @param string|null $id Anexo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $anexo = $this->Anexos->get($id, [
            'contain' => []
        ]);
        $this->set('anexo', $anexo);
        $this->set('_serialize', ['anexo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $anexo = $this->Anexos->newEntity();
        if ($this->request->is('post')) {
            $anexo = $this->Anexos->patchEntity($anexo, $this->request->data);
            if ($this->Anexos->save($anexo)) {
                $this->Flash->success(__('The anexo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The anexo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('anexo'));
        $this->set('_serialize', ['anexo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Anexo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $anexo = $this->Anexos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anexo = $this->Anexos->patchEntity($anexo, $this->request->data);
            if ($this->Anexos->save($anexo)) {
                $this->Flash->success(__('The anexo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The anexo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('anexo'));
        $this->set('_serialize', ['anexo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Anexo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $anexo = $this->Anexos->get($id);
        if ($this->Anexos->delete($anexo)) {
            $this->Flash->success(__('The anexo has been deleted.'));
        } else {
            $this->Flash->error(__('The anexo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function download($id = null) { {
            $anexo = $this->Anexos->get($id);
            $file = new File($anexo->caminho);

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


        if ($role == User::ROLE_PROPONENTE) {
            if (in_array($this->request->action, ['download'])) {
                return true;
            }
        }

        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['download'])) {
                return true;
            }
        }
        
        return parent::isAuthorized($user);
    }

}
