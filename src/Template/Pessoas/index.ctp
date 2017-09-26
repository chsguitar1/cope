<?php

$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>

    <!--<li><?= $this->Html->link(__('New Pessoa'), ['action' => 'add']); ?></li>-->
    <!--<li><?= $this->Html->link(__('List ParticipantesProjetos'), ['controller' => 'ParticipantesProjetos', 'action' => 'index']); ?></li>-->
    <!--<li><?= $this->Html->link(__('New Participantes Projeto'), ['controller' => ' ParticipantesProjetos', 'action' => 'add']); ?></li>-->

<nav class="navbar navbar-default">
    <div class="container-fluid container">
            <?= $this->Html->link(__('Add. Pessoa'), ['action' => 'add'],['class' => 'btn btn-primary']); ?>
    </div>
</nav>    
 <legend><?= __('Pessoas') ?></legend>
<div class="table-responsive">
    <table class="table table-bordered" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id'); ?></th>
                <th><?= $this->Paginator->sort('nome'); ?></th>
<!--                <th><?= $this->Paginator->sort('vinculo'); ?></th>-->
                <th><?= $this->Paginator->sort('siape'); ?></th>
                <th><?= $this->Paginator->sort('matricula'); ?></th>
                <th><?= $this->Paginator->sort('rg'); ?></th>
                <th><?= $this->Paginator->sort('cpf'); ?></th>
                <th class="actions"><?= __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?= $this->Number->format($pessoa->id) ?></td>
                <td><?= h($pessoa->nome) ?></td>
               
                <td><?= h($pessoa->siape) ?></td>
                <td><?= h($pessoa->matricula) ?></td>
                <td><?= h($pessoa->rg) ?></td>
                <td><?= h($pessoa->cpf) ?></td>
                <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $pessoa->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $pessoa->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $pessoa->id], ['confirm' => __('Deseja excluir a pessoa  {0} ?', $pessoa->nome), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('próximo') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>