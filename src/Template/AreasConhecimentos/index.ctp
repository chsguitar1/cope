<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Areas Conhecimento'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('descricao'); ?></th>
            <th><?= $this->Paginator->sort('cod_pai'); ?></th>
            <th><?= $this->Paginator->sort('nivel'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($areasConhecimentos as $areasConhecimento): ?>
        <tr>
            <td><?= $this->Number->format($areasConhecimento->id) ?></td>
            <td><?= h($areasConhecimento->descricao) ?></td>
            <td><?= $this->Number->format($areasConhecimento->cod_pai) ?></td>
            <td><?= $this->Number->format($areasConhecimento->nivel) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $areasConhecimento->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $areasConhecimento->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $areasConhecimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areasConhecimento->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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