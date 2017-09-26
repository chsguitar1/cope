<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AreasTematicas Controller
 *
 * @property \App\Model\Table\AreasTematicasTable $AreasTematicas
 */
class AreasTematicasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('areasTematicas', $this->paginate($this->AreasTematicas));
        $this->set('_serialize', ['areasTematicas']);
    }

    /**
     * View method
     *
     * @param string|null $id Areas Tematica id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $areasTematica = $this->AreasTematicas->get($id, [
            'contain' => []
        ]);
        $this->set('areasTematica', $areasTematica);
        $this->set('_serialize', ['areasTematica']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $areasTematica = $this->AreasTematicas->newEntity();
        if ($this->request->is('post')) {
            $areasTematica = $this->AreasTematicas->patchEntity($areasTematica, $this->request->data);
            if ($this->AreasTematicas->save($areasTematica)) {
                $this->Flash->success(__('The areas tematica has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The areas tematica could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('areasTematica'));
        $this->set('_serialize', ['areasTematica']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Areas Tematica id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $areasTematica = $this->AreasTematicas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $areasTematica = $this->AreasTematicas->patchEntity($areasTematica, $this->request->data);
            if ($this->AreasTematicas->save($areasTematica)) {
                $this->Flash->success(__('The areas tematica has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The areas tematica could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('areasTematica'));
        $this->set('_serialize', ['areasTematica']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Areas Tematica id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $areasTematica = $this->AreasTematicas->get($id);
        if ($this->AreasTematicas->delete($areasTematica)) {
            $this->Flash->success(__('The areas tematica has been deleted.'));
        } else {
            $this->Flash->error(__('The areas tematica could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
