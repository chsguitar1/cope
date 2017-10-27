<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;


/**
 * RelatorioFinal Controller
 *
 * @property \App\Model\Table\RelatorioFinalTable $RelatorioFinal
 */
class RelatorioFinalController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('relatorioFinal', $this->paginate($this->RelatorioFinal));
        $this->set('_serialize', ['relatorioFinal']);
    }

    /**
     * View method
     *
     * @param string|null $id Relatorio Final id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $relatorioFinal = $this->RelatorioFinal->get($id, [
            'contain' => []
        ]);
        $this->set('relatorioFinal', $relatorioFinal);
        $this->set('_serialize', ['relatorioFinal']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
//    public function add() {
//        $relatorioFinal = $this->RelatorioFinal->newEntity();
//        if ($this->request->is('post')) {
//            $relatorioFinal = $this->RelatorioFinal->patchEntity($relatorioFinal, $this->request->data);
//            if ($this->RelatorioFinal->save($relatorioFinal)) {
//                $this->Flash->success(__('The relatorio final has been saved.'));
//                return $this->redirect(['action' => 'index']);
//            } else {
//                $this->Flash->error(__('The relatorio final could not be saved. Please, try again.'));
//            }
//        }
//        $this->set(compact('relatorioFinal'));
//        $this->set('_serialize', ['relatorioFinal']);
//    }

    public function add($id_projeto = null) {
        $relatorioFinal = $this->RelatorioFinal->newEntity();
       
        if ($this->request->is('post')) {
            $relatorioFinal = $this->RelatorioFinal->patchEntity($relatorioFinal, $this->request->data);
            $relatorioFinal->id_projeto = $id_projeto;
            if ($this->RelatorioFinal->save($relatorioFinal)) {
                $this->Flash->success(__('Relatório salvo com sucesso!'));
                return $this->redirect(['controller'=>'Projetos','action' => 'index']);
            } else {
                debug($relatorioFinal);
                exit;
                $this->Flash->error(__('Erro ao salvar o relatorio'));
            }
        }
        $this->set(compact('relatorioFinal'));
        $this->set('_serialize', ['relatorioFinal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Relatorio Final id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $relatorioFinal = $this->RelatorioFinal->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relatorioFinal = $this->RelatorioFinal->patchEntity($relatorioFinal, $this->request->data);
            if ($this->RelatorioFinal->save($relatorioFinal)) {
                $this->Flash->success(__('The relatorio final has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The relatorio final could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('relatorioFinal'));
        $this->set('_serialize', ['relatorioFinal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Relatorio Final id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $relatorioFinal = $this->RelatorioFinal->get($id);
        if ($this->RelatorioFinal->delete($relatorioFinal)) {
            $this->Flash->success(__('The relatorio final has been deleted.'));
        } else {
            $this->Flash->error(__('The relatorio final could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
     public function redirecionar($role = null) {
        $role = $this->request->session()->read('role')['role'];
       // debug($role); exit;
        switch ($role) {
            case \App\Model\Entity\User::ROLE_PROPONENTE :
                return $this->redirect(['action' => 'index']);
            case \App\Model\Entity\User::ROLE_ADMIN :
                return $this->redirect(['action' => 'index']);
            case \App\Model\Entity\User::ROLE_PRESIDENTE :
                return $this->redirect(['action' => 'index_presidente']);
            case \App\Model\Entity\User::ROLE_PARECERISTA :
                return $this->redirect(['controller' => 'SolicitacaoPareceres', 'action' => 'index_parecerista']);
        }
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role')['role'];

        if ($this->request->action === 'redirecionar') {
            return true;
        }
        if ($role == User::ROLE_PARECERISTA) {
            if (in_array($this->request->action, ['index', 'view'])) {
                return true;
            }
        }
        if ($role == User::ROLE_PRESIDENTE) {
            if (in_array($this->request->action, ['edit', 'view'])) {
                return true;
            }
        }
        if ($role == User::ROLE_PROPONENTE) {
            if (in_array($this->request->action, ['index', 'edit', 'view', 'add', 
                        'delete'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}
