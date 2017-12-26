<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ParticipantesV Controller
 *
 * @property \App\Model\Table\ParticipantesVTable $ParticipantesV
 */
class ParticipantesVController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index($id = null)
    {
        $participantesv = TableRegistry::get('ParticipantesV');
       
        $queryparty = $participantesv->find()
                ->where(['idprojeto = '=>$id]);
       
//  $projeto = $this->Projetos->get($this->ParticipantesV->id, 
//          ['contain' => ['Cursos', 'Anexos', 'Pessoas', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
      $projeto = TableRegistry::get('Projetos');
      $query = $projeto->find()
              ->where(['id ='=>$id]);
     
      $this->set('participantesv',$queryparty);
        $this->set('_serialize', ['participantesv']);
        $this->set('projeto',$query);
        $this->set('_serialize', ['projeto']);
       
    }
    public function indexform($id = null)
    {
        $this->set('participantesv',$this->ParticipantesV);
        
//  $projeto = $this->Projetos->get($this->ParticipantesV->id, 
//          ['contain' => ['Cursos', 'Anexos', 'Pessoas', 'SolicitacoesCertificados', 'ParticipantesProjetos', 'ParticipantesProjetos.Pessoas']]);
      $projeto = TableRegistry::get('Projetos');
      $query = $projeto->find()
              ->where(['id ='=>$id]);
      
        $this->set('_serialize', ['participantesv']);
        $this->set('projeto',$query);
        $this->set('_serialize', ['projeto']);
       
    }

    /**
     * View method
     *
     * @param string|null $id Participantes V id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participantesV = $this->ParticipantesV->get($id, [
            'contain' => []
        ]);
        $this->set('participantesV', $participantesV);
        $this->set('_serialize', ['participantesV']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participantesV = $this->ParticipantesV->newEntity();
        if ($this->request->is('post')) {
            $participantesV = $this->ParticipantesV->patchEntity($participantesV, $this->request->data);
            if ($this->ParticipantesV->save($participantesV)) {
                $this->Flash->success(__('The participantes v has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participantes v could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('participantesV'));
        $this->set('_serialize', ['participantesV']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participantes V id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participantesV = $this->ParticipantesV->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participantesV = $this->ParticipantesV->patchEntity($participantesV, $this->request->data);
            if ($this->ParticipantesV->save($participantesV)) {
                $this->Flash->success(__('The participantes v has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participantes v could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('participantesV'));
        $this->set('_serialize', ['participantesV']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participantes V id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participantesV = $this->ParticipantesV->get($id);
        if ($this->ParticipantesV->delete($participantesV)) {
            $this->Flash->success(__('The participantes v has been deleted.'));
        } else {
            $this->Flash->error(__('The participantes v could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
