<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ParticipantesProjetos Controller
 *
 * @property \App\Model\Table\ParticipantesProjetosTable $ParticipantesProjetos
 */
class ParticipantesProjetosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'Projetos']
        ];
        $this->set('participantesProjetos', $this->paginate($this->ParticipantesProjetos));
        $this->set('_serialize', ['participantesProjetos']);
    }

    /**
     * View method
     *
     * @param string|null $id Participantes Projeto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participantesProjeto = $this->ParticipantesProjetos->get($id, [
            'contain' => ['Pessoas', 'Projetos']
        ]);
        $this->set('participantesProjeto', $participantesProjeto);
        $this->set('_serialize', ['participantesProjeto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participantesProjeto = $this->ParticipantesProjetos->newEntity();
        if ($this->request->is('post')) {
            $participantesProjeto = $this->ParticipantesProjetos->patchEntity($participantesProjeto, $this->request->data);
            if ($this->ParticipantesProjetos->save($participantesProjeto)) {
                $this->Flash->success(__('The participantes projeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participantes projeto could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->ParticipantesProjetos->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->ParticipantesProjetos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('participantesProjeto', 'pessoas', 'projetos'));
        $this->set('_serialize', ['participantesProjeto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participantes Projeto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participantesProjeto = $this->ParticipantesProjetos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participantesProjeto = $this->ParticipantesProjetos->patchEntity($participantesProjeto, $this->request->data);
            if ($this->ParticipantesProjetos->save($participantesProjeto)) {
                $this->Flash->success(__('The participantes projeto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participantes projeto could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->ParticipantesProjetos->Pessoas->find('list', ['limit' => 200]);
        $projetos = $this->ParticipantesProjetos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('participantesProjeto', 'pessoas', 'projetos'));
        $this->set('_serialize', ['participantesProjeto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participantes Projeto id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participantesProjeto = $this->ParticipantesProjetos->get($id);
        try {
            $this->ParticipantesProjetos->delete($participantesProjeto);
           $this->Flash->success(__('The participantes  projeto has been deleted.'));
        } catch (\PDOException $ex) {
            $this->Flash->error(__('The participantes projeto could not be deleted. Please, try again.'));
        }
       
        
        return $this->redirect(['action' => 'index']);
    }
}
