<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Relatorios Controller
 *
 * @property \App\Model\Table\RelatoriosTable $Relatorios
 */
class RelatoriosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fases']
        ];
        $this->set('relatorios', $this->paginate($this->Relatorios));
        $this->set('_serialize', ['relatorios']);
    }

    /**
     * View method
     *
     * @param string|null $id Relatorio id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relatorio = $this->Relatorios->get($id, [
            'contain' => ['Fases']
        ]);
        $this->set('relatorio', $relatorio);
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relatorio = $this->Relatorios->newEntity();
        if ($this->request->is('post')) {
            $relatorio = $this->Relatorios->patchEntity($relatorio, $this->request->data);
            if ($this->Relatorios->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
            }
        }
        $fases = $this->Relatorios->Fases->find('list', ['limit' => 200]);
        $this->set(compact('relatorio', 'fases'));
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Relatorio id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relatorio = $this->Relatorios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relatorio = $this->Relatorios->patchEntity($relatorio, $this->request->data);
            if ($this->Relatorios->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
            }
        }
        $fases = $this->Relatorios->Fases->find('list', ['limit' => 200]);
        $this->set(compact('relatorio', 'fases'));
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Relatorio id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relatorio = $this->Relatorios->get($id);
        if ($this->Relatorios->delete($relatorio)) {
            $this->Flash->success(__('The relatorio has been deleted.'));
        } else {
            $this->Flash->error(__('The relatorio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
