<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LinhasExtensao Controller
 *
 * @property \App\Model\Table\LinhasExtensaoTable $LinhasExtensao
 */
class LinhasExtensaoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('linhasExtensao', $this->paginate($this->LinhasExtensao));
        $this->set('_serialize', ['linhasExtensao']);
    }

    /**
     * View method
     *
     * @param string|null $id Linhas Extensao id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $linhasExtensao = $this->LinhasExtensao->get($id, [
            'contain' => []
        ]);
        $this->set('linhasExtensao', $linhasExtensao);
        $this->set('_serialize', ['linhasExtensao']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $linhasExtensao = $this->LinhasExtensao->newEntity();
        if ($this->request->is('post')) {
            $linhasExtensao = $this->LinhasExtensao->patchEntity($linhasExtensao, $this->request->data);
            if ($this->LinhasExtensao->save($linhasExtensao)) {
                $this->Flash->success(__('The linhas extensao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The linhas extensao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('linhasExtensao'));
        $this->set('_serialize', ['linhasExtensao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Linhas Extensao id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $linhasExtensao = $this->LinhasExtensao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $linhasExtensao = $this->LinhasExtensao->patchEntity($linhasExtensao, $this->request->data);
            if ($this->LinhasExtensao->save($linhasExtensao)) {
                $this->Flash->success(__('The linhas extensao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The linhas extensao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('linhasExtensao'));
        $this->set('_serialize', ['linhasExtensao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Linhas Extensao id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $linhasExtensao = $this->LinhasExtensao->get($id);
        if ($this->LinhasExtensao->delete($linhasExtensao)) {
            $this->Flash->success(__('The linhas extensao has been deleted.'));
        } else {
            $this->Flash->error(__('The linhas extensao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
