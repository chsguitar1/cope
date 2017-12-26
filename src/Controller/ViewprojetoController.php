<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Viewprojeto Controller
 *
 * @property \App\Model\Table\ViewprojetoTable $Viewprojeto
 */
class ViewprojetoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cursos', 'Pareceresista']
        ];
        $this->set('viewprojeto', $this->paginate($this->Viewprojeto));
        $this->set('_serialize', ['viewprojeto']);
    }

    /**
     * View method
     *
     * @param string|null $id Viewprojeto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $viewprojeto = $this->Viewprojeto->get($id, [
            'contain' => ['Cursos', 'Pareceresista']
        ]);
        $this->set('viewprojeto', $viewprojeto);
        $this->set('_serialize', ['viewprojeto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $viewprojeto = $this->Viewprojeto->newEntity();
        if ($this->request->is('post')) {
            $viewprojeto = $this->Viewprojeto->patchEntity($viewprojeto, $this->request->data);
            if ($this->Viewprojeto->save($viewprojeto)) {
                $this->Flash->success(__('The viewprojeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The viewprojeto could not be saved. Please, try again.'));
            }
        }
        $cursos = $this->Viewprojeto->Cursos->find('list', ['limit' => 200]);
        $pareceresista = $this->Viewprojeto->Pareceresista->find('list', ['limit' => 200]);
        $this->set(compact('viewprojeto', 'cursos', 'pareceresista'));
        $this->set('_serialize', ['viewprojeto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Viewprojeto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $viewprojeto = $this->Viewprojeto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $viewprojeto = $this->Viewprojeto->patchEntity($viewprojeto, $this->request->data);
            if ($this->Viewprojeto->save($viewprojeto)) {
                $this->Flash->success(__('The viewprojeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The viewprojeto could not be saved. Please, try again.'));
            }
        }
        $cursos = $this->Viewprojeto->Cursos->find('list', ['limit' => 200]);
        $pareceresista = $this->Viewprojeto->Pareceresista->find('list', ['limit' => 200]);
        $this->set(compact('viewprojeto', 'cursos', 'pareceresista'));
        $this->set('_serialize', ['viewprojeto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Viewprojeto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $viewprojeto = $this->Viewprojeto->get($id);
        if ($this->Viewprojeto->delete($viewprojeto)) {
            $this->Flash->success(__('The viewprojeto has been deleted.'));
        } else {
            $this->Flash->error(__('The viewprojeto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
