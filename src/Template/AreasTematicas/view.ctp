<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('Edit Areas Tematica'), ['action' => 'edit', $areasTematica->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Areas Tematica'), ['action' => 'delete', $areasTematica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areasTematica->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Areas Tematicas'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Areas Tematica'), ['action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h2><?= h($areasTematica->id) ?></h2>
<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Nome') ?></h6>
        <p><?= h($areasTematica->nome) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($areasTematica->id) ?></p>
    </div>
</div>

