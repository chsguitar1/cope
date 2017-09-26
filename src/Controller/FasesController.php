<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fases Controller
 *
 * @property \App\Model\Table\FasesTable $Fases
 */
class FasesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos']
        ];
        $this->set('fases', $this->paginate($this->Fases));
        $this->set('_serialize', ['fases']);
    }

    /**
     * View method
     *
     * @param string|null $id Fase id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fase = $this->Fases->get($id, [
            'contain' => ['Projetos', 'Relatorios']
        ]);
        $this->set('fase', $fase);
        $this->set('_serialize', ['fase']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fase = $this->Fases->newEntity();
        if ($this->request->is('post')) {
            $fase = $this->Fases->patchEntity($fase, $this->request->data);
            if ($this->Fases->save($fase)) {
                $this->Flash->success(__('The fase has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fase could not be saved. Please, try again.'));
            }
        }
        $projetos = $this->Fases->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('fase', 'projetos'));
        $this->set('_serialize', ['fase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fase id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fase = $this->Fases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fase = $this->Fases->patchEntity($fase, $this->request->data);
            if ($this->Fases->save($fase)) {
                $this->Flash->success(__('The fase has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fase could not be saved. Please, try again.'));
            }
        }
        $projetos = $this->Fases->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('fase', 'projetos'));
        $this->set('_serialize', ['fase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fase id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fase = $this->Fases->get($id);
        if ($this->Fases->delete($fase)) {
            $this->Flash->success(__('The fase has been deleted.'));
        } else {
            $this->Flash->error(__('The fase could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
