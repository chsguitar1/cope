<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Anexo'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('nome'); ?></th>
            <th><?= $this->Paginator->sort('caminho'); ?></th>
            <th><?= $this->Paginator->sort('tamanho'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('created_by'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($anexos as $anexo): ?>
        <tr>
            <td><?= $this->Number->format($anexo->id) ?></td>
            <td><?= h($anexo->nome) ?></td>
            <td><?= h($anexo->caminho) ?></td>
            <td><?= $this->Number->format($anexo->tamanho) ?></td>
            <td><?= h($anexo->created) ?></td>
            <td><?= h($anexo->modified) ?></td>
            <td><?= $this->Number->format($anexo->created_by) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $anexo->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $anexo->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $anexo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anexo->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>