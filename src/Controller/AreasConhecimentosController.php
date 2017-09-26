<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * AreasConhecimentos Controller
 *
 * @property \App\Model\Table\AreasConhecimentosTable $AreasConhecimentos
 */
class AreasConhecimentosController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('areasConhecimentos', $this->paginate($this->AreasConhecimentos));
        $this->set('_serialize', ['areasConhecimentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Areas Conhecimento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $areasConhecimento = $this->AreasConhecimentos->get($id, [
            'contain' => []
        ]);
        $this->set('areasConhecimento', $areasConhecimento);
        $this->set('_serialize', ['areasConhecimento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $areasConhecimento = $this->AreasConhecimentos->newEntity();
        if ($this->request->is('post')) {
            $areasConhecimento = $this->AreasConhecimentos->patchEntity($areasConhecimento, $this->request->data);
            if ($this->AreasConhecimentos->save($areasConhecimento)) {
                $this->Flash->success(__('The areas conhecimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The areas conhecimento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('areasConhecimento'));
        $this->set('_serialize', ['areasConhecimento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Areas Conhecimento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $areasConhecimento = $this->AreasConhecimentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $areasConhecimento = $this->AreasConhecimentos->patchEntity($areasConhecimento, $this->request->data);
            if ($this->AreasConhecimentos->save($areasConhecimento)) {
                $this->Flash->success(__('The areas conhecimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The areas conhecimento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('areasConhecimento'));
        $this->set('_serialize', ['areasConhecimento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Areas Conhecimento id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $areasConhecimento = $this->AreasConhecimentos->get($id);
        if ($this->AreasConhecimentos->delete($areasConhecimento)) {
            $this->Flash->success(__('The areas conhecimento has been deleted.'));
        } else {
            $this->Flash->error(__('The areas conhecimento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function grupos() {
        $areasConhecimento = $this->AreasConhecimentos->newEntity();
        $gg = $this->AreasConhecimentos->newEntity()->populaAreas();
        $this->set('gp', $gg);
    }
    
    
    public function populaAreas() {
        $query = $this->AreasConhecimentos->find('all')->where(['AreasConhecimentos.nivel = ' => 0]);
        $gp = array();
        foreach ($query as $r) {
            $gp += [$r['id'].' - '.$r['descricao'] => $this->getFilhos($r['id'])];
        }
        $this->set('gp', $gp);
    }

    public function getFilhos($id_pai) {
        $q = $this->AreasConhecimentos->find('all')->where(['AreasConhecimentos.cod_pai = ' => $id_pai]);

        $filhos = array();

        foreach ($q as $r) {

            if ($r['analitico'] == 1) {
                $filhos += [$r['id'] => $r['id'].' - '.$r['descricao']];
            } else {
                $filhos += [ $r['id'] . ' - ' . $r['descricao'] => $this->getFilhosDosFilhos($r['id'])];
            }
        }
        return $filhos;
    }

    public function getFilhosDosFilhos($id_pai) {
        $q = $this->AreasConhecimentos->find('all')->where(['AreasConhecimentos.cod_pai = ' => $id_pai]);

        $filhos = array();

        foreach ($q as $r) {
            $filhos += [$r['id'] => $r['id'] . ' - ' . $r['descricao']];
        }
        return $filhos;
    }

}
