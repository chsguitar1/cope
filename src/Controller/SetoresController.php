<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Setores Controller
 *
 * @property \App\Model\Table\SetoresTable $Setores
 */
class SetoresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Setores']
        ];
        $this->set('setores', $this->paginate($this->Setores));
        $this->set('_serialize', ['setores']);
    }

    /**
     * View method
     *
     * @param string|null $id Setore id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setore = $this->Setores->get($id, [
            'contain' => ['Setores']
        ]);
        $this->set('setore', $setore);
        $this->set('_serialize', ['setore']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $setore = $this->Setores->newEntity();
        if ($this->request->is('post')) {
            $setore = $this->Setores->patchEntity($setore, $this->request->data);
            if ($this->Setores->save($setore)) {
                $this->Flash->success(__('The setore has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The setore could not be saved. Please, try again.'));
            }
        }
        $setores = $this->Setores->Setores->find('list', ['limit' => 200]);
        $this->set(compact('setore', 'setores'));
        $this->set('_serialize', ['setore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Setore id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setore = $this->Setores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setore = $this->Setores->patchEntity($setore, $this->request->data);
            if ($this->Setores->save($setore)) {
                $this->Flash->success(__('The setore has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The setore could not be saved. Please, try again.'));
            }
        }
        $setores = $this->Setores->Setores->find('list', ['limit' => 200]);
        $this->set(compact('setore', 'setores'));
        $this->set('_serialize', ['setore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Setore id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setore = $this->Setores->get($id);
        if ($this->Setores->delete($setore)) {
            $this->Flash->success(__('The setore has been deleted.'));
        } else {
            $this->Flash->error(__('The setore could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
