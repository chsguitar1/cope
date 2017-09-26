<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Acompanhamento'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Projeto'), ['controller' => ' Projetos', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('data'); ?></th>
            <th><?= $this->Paginator->sort('tipo'); ?></th>
            <th><?= $this->Paginator->sort('projeto_id'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('created_by'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($acompanhamentos as $acompanhamento): ?>
        <tr>
            <td><?= $this->Number->format($acompanhamento->id) ?></td>
            <td><?= h($acompanhamento->data) ?></td>
            <td><?= $this->Number->format($acompanhamento->tipo) ?></td>
            <td>
                <?= $acompanhamento->has('projeto') ? $this->Html->link($acompanhamento->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $acompanhamento->projeto->id]) : '' ?>
            </td>
            <td><?= h($acompanhamento->created) ?></td>
            <td><?= h($acompanhamento->modified) ?></td>
            <td><?= $this->Number->format($acompanhamento->created_by) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $acompanhamento->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $acompanhamento->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $acompanhamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acompanhamento->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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