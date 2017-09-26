<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>


<h2><?= h($pessoa->nome) ?></h2>
<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Nome') ?></h6>
        <p><?= h($pessoa->nome) ?></p>
        <h6><?= __('Matricula') ?></h6>
        <p><?= h($pessoa->matricula) ?></p>
        <h6><?= __('Rg') ?></h6>
        <p><?= h($pessoa->rg) ?></p>
        <h6><?= __('Cpf') ?></h6>
        <p><?= h($pessoa->cpf) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($pessoa->id) ?></p>
        <h6><?= __('Vinculo') ?></h6>
        <p><?= $this->Number->format($pessoa->vinculo) ?></p>
        <h6><?= __('Siape') ?></h6>
        <p><?= $this->Number->format($pessoa->siape) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Criado em ') ?></h6>
        <p><?= h($pessoa->created) ?></p>
        <h6><?= __('Modificado em ') ?></h6>
        <p><?= h($pessoa->modified) ?></p>
    </div>
    <div class="col-lg-2">
       <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
    </div>
    
</div>
<div class="related row">
    <div class = "col-lg-12">
        <h4><?= __('Participação em projetos') ?></h4>
        <?php if (!empty($pessoa->participantes_projetos)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Carga Horaria') ?></th>
                    <th><?= __('Tipo Participante') ?></th>
                    <th><?= __('Bolsista') ?></th>
                    <th><?= __('Bolsa') ?></th>
                    <th><?= __('Data Entrada') ?></th>
                    <th><?= __('Data Saida') ?></th>
                    <th><?= __('Vinculo Projeto') ?></th>
                    <th><?= __('Recebe Certificado') ?></th>
                    <th><?= __('Pessoa Id') ?></th>
                    <th><?= __('Projeto Id') ?></th>
                    <th><?= __('Created') ?></th>
                    <th><?= __('Modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoa->participantes_projetos as $participantesProjetos): ?>
                <tr>
                    <td><?= h($participantesProjetos->id) ?></td>
                    <td><?= h($participantesProjetos->carga_horaria) ?></td>
                    <td><?= h($participantesProjetos->tipo_participante) ?></td>
                    <td><?= h($participantesProjetos->bolsista) ?></td>
                    <td><?= h($participantesProjetos->bolsa) ?></td>
                    <td><?= h($participantesProjetos->data_entrada) ?></td>
                    <td><?= h($participantesProjetos->data_saida) ?></td>
                    <td><?= h($participantesProjetos->vinculo_projeto) ?></td>
                    <td><?= h($participantesProjetos->recebe_certificado) ?></td>
                    <td><?= h($participantesProjetos->pessoa_id) ?></td>
                    <td><?= h($participantesProjetos->projeto_id) ?></td>
                    <td><?= h($participantesProjetos->created) ?></td>
                    <td><?= h($participantesProjetos->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ParticipantesProjetos', 'action' => 'view', $participantesProjetos->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'ParticipantesProjetos', 'action' => 'edit', $participantesProjetos->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'ParticipantesProjetos', 'action' => 'delete', $participantesProjetos->id], ['confirm' => __('Deseja remover a pessoa # {0}?', $participantesProjetos->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

