<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Cronograma Controller
 *
 * @property \App\Model\Table\CronogramaTable $Cronograma
 */
class CronogramaController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('cronograma', $this->paginate($this->Cronograma));
        $this->set('_serialize', ['cronograma']);
    }

    /**
     * View method
     *
     * @param string|null $id Cronograma id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $cronograma = $this->Cronograma->get($id, [
            'contain' => []
        ]);
        $this->set('cronograma', $cronograma);
        $this->set('_serialize', ['cronograma']);
    }

    public function indexprojeto($id = null) {
        $cronograma = $this->Cronograma->find()
                ->where(['idprojeto' => $id])
                ->contain(['Projetos']);

        $this->set('cronograma', $this->paginate($cronograma));
        $this->set('idprojeto', $id);
        $this->set('_serialize', ['cronograma']);
        $this->set('_serialize', ['idprojeto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
//    public function add()
//    {
//        $cronograma = $this->Cronograma->newEntity();
//        if ($this->request->is('post')) {
//            $cronograma = $this->Cronograma->patchEntity($cronograma, $this->request->data);
//            if ($this->Cronograma->save($cronograma)) {
//                $this->Flash->success(__('The cronograma has been saved.'));
//                return $this->redirect(['action' => 'index']);
//            } else {
//                $this->Flash->error(__('The cronograma could not be saved. Please, try again.'));
//            }
//        }
//        $this->set(compact('cronograma'));
//        $this->set('_serialize', ['cronograma']);
//    }
    public function add($id = null) {
        $this->set('cronograma', $this->paginate($this->Cronograma));
        $this->set('_serialize', ['cronograma']);
        $cronograma = $this->Cronograma->newEntity();
        $this->loadModel('Projetos');
        $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Pessoas', 'Cronograma', 'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);

        if ($this->request->is('post')) {
            $cronograma = $this->Cronograma->patchEntity($cronograma, $this->request->data);
            $cronograma->idprojeto = $projeto->id;
            if ($this->Cronograma->save($cronograma)) {
                $this->Flash->success(__('Cronograma salvo com sucesso!'));
                $projeto = $this->Projetos->get($id, ['contain' => ['Cursos', 'Pessoas', 'Cronograma', 'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
                return $this->redirect(['action' => 'indexprojeto', $projeto->id]);
            } else {
                $this->Flash->error(__('Erro ao salvar o cronograma.'));
            }
        }
        $this->set(compact('cronograma'));
        $this->set('idprojeto', $projeto->id);
        $this->set('_serialize', ['cronograma']);
        $this->set('_serialize', ['idprojeto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cronograma id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $cronograma = $this->Cronograma->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('Projetos');
            $cronograma = $this->Cronograma->patchEntity($cronograma, $this->request->data);
            $idprojeto = $cronograma->idprojeto;
            if ($this->Cronograma->save($cronograma)) {
                $this->Flash->success(__('Cronograma salvo com sucesso!'));
                $projeto = $this->Projetos->get($idprojeto, ['contain' => ['Cursos', 'Pessoas', 'Cronograma', 'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
                return $this->redirect(['action' => 'indexprojeto', $projeto->id]);
            } else {
                $this->Flash->error(__('O Cronograma não pod ser salvo!'));
            }
        }
        $this->set(compact('cronograma'));
        $this->set('_serialize', ['cronograma']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cronograma id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Projetos');
        $cronograma = $this->Cronograma->get($id);
        $idprojeto = $cronograma->idprojeto;

        if ($this->Cronograma->delete($cronograma)) {
            $this->Flash->success(__('Cronograma excluido com sucesso!'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o cronograma. '));
        }
        $projeto = $this->Projetos->get($idprojeto, ['contain' => ['Cursos', 'Pessoas', 'Cronograma', 'AreasConhecimentos', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
        return $this->redirect(['action' => 'indexprojeto', $projeto->id]);
    }

}
