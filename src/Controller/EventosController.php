<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Eventos Controller
 *
 * @property \App\Model\Table\EventosTable $Eventos
 */
class EventosController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Projetos']
        ];
        $this->set('eventos', $this->paginate($this->Eventos));
        $this->set('_serialize', ['eventos']);
    }

    /**
     * View method
     *
     * @param string|null $id Evento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $evento = $this->Eventos->get($id, [
            'contain' => ['Projetos']
        ]);
        $this->set('evento', $evento);
        $this->set('_serialize', ['evento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $evento = $this->Eventos->newEntity();
        if ($this->request->is('post')) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->data);
            if ($this->Eventos->save($evento)) {
                $this->Flash->success(__('The evento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evento could not be saved. Please, try again.'));
            }
        }
        $projetos = $this->Eventos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('evento', 'projetos'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $evento = $this->Eventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->data);
            if ($this->Eventos->save($evento)) {
                $this->Flash->success(__('The evento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evento could not be saved. Please, try again.'));
            }
        }
        $projetos = $this->Eventos->Projetos->find('list', ['limit' => 200]);
        $this->set(compact('evento', 'projetos'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evento id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $evento = $this->Eventos->get($id);
        if ($this->Eventos->delete($evento)) {
            $this->Flash->success(__('The evento has been deleted.'));
        } else {
            $this->Flash->error(__('The evento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function registraEvento($dados = null) {
        $tipo = $dados['tipo'];
        $id = $dados['pid'];
        $descricao = $dados['descricao'];
        $responsavel_id = isset($dados['responsavel_id']) ? $dados['responsavel_id'] : null;
        $setor_destino = isset($dados['setor_destino']) ? $dados['setor_destino'] : null;


        $evento = new \App\Model\Entity\Evento();

        $evento->projeto_id = $id;
        $evento->tipo = $tipo;
        $evento->descricao = $descricao;
        $evento->data_evento = date('Y-m-d H:i:s');
        $evento->setor_destino = $setor_destino;
        $evento->responsavel_id = $responsavel_id;

        //echo 'ddddddddddddddd';
        $resultado = $this->Eventos->save($evento);
        return 'Resultado evento ' . $resultado . ' ' . $evento;
    }

}
