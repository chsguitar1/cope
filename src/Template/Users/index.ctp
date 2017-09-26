<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>
  
  <nav class="navbar navbar-default">
        <div class="container-fluid container">
           <?= $this->Html->link(__('Novo Usuário'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
    </nav>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('username'); ?></th>
            <th><?= $this->Paginator->sort('pessoa_id'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->username) ?></td>
            <td>
                <?= $user->has('pessoa') ? $this->Html->link($user->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $user->pessoa->id]) : '' ?>
            </td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Html->link('',[ 'controller' => 'RoleUsers' ,'action' => 'view', $user->id], ['title' => __('Permissões'), 'class' => 'btn btn-default glyphicon glyphicon-user']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que deseja remover # {0}', $user->username), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('próximo') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>