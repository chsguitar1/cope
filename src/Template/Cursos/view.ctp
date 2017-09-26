<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Curso'), ['action' => 'edit', $curso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Curso'), ['action' => 'delete', $curso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cursos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cursos view large-9 medium-8 columns content">
    <h3><?= h($curso->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($curso->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($curso->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Coordenador Id') ?></th>
            <td><?= $this->Number->format($curso->coordenador_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($curso->projetos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ano') ?></th>
                <th><?= __('Data Inicio') ?></th>
                <th><?= __('Data Fim') ?></th>
                <th><?= __('Encerrado') ?></th>
                <th><?= __('Grande Area Conhecimento') ?></th>
                <th><?= __('Comite Etica') ?></th>
                <th><?= __('Num Protocolo') ?></th>
                <th><?= __('Num Sipac') ?></th>
                <th><?= __('Situacao Projeto') ?></th>
                <th><?= __('Tipo Projeto') ?></th>
                <th><?= __('Tituto Projeto') ?></th>
                <th><?= __('Descricao Projeto') ?></th>
                <th><?= __('Curso Id') ?></th>
                <th><?= __('Parecerista Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Rascunho') ?></th>
                <th><?= __('Data Protocolo') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Modified By') ?></th>
                <th><?= __('Cod Areas Conhecimentos') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($curso->projetos as $projetos): ?>
            <tr>
                <td><?= h($projetos->id) ?></td>
                <td><?= h($projetos->ano) ?></td>
                <td><?= h($projetos->data_inicio) ?></td>
                <td><?= h($projetos->data_fim) ?></td>
                <td><?= h($projetos->encerrado) ?></td>
                <td><?= h($projetos->grande_area_conhecimento) ?></td>
                <td><?= h($projetos->comite_etica) ?></td>
                <td><?= h($projetos->num_protocolo) ?></td>
                <td><?= h($projetos->num_sipac) ?></td>
                <td><?= h($projetos->situacao_projeto) ?></td>
                <td><?= h($projetos->tipo_projeto) ?></td>
                <td><?= h($projetos->tituto_projeto) ?></td>
                <td><?= h($projetos->descricao_projeto) ?></td>
                <td><?= h($projetos->curso_id) ?></td>
                <td><?= h($projetos->parecerista_id) ?></td>
                <td><?= h($projetos->created) ?></td>
                <td><?= h($projetos->modified) ?></td>
                <td><?= h($projetos->rascunho) ?></td>
                <td><?= h($projetos->data_protocolo) ?></td>
                <td><?= h($projetos->created_by) ?></td>
                <td><?= h($projetos->modified_by) ?></td>
                <td><?= h($projetos->cod_areas_conhecimentos) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projetos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projetos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
