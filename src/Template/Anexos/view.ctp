<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('Edit Anexo'), ['action' => 'edit', $anexo->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Anexo'), ['action' => 'delete', $anexo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anexo->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Anexos'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Anexo'), ['action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h2><?= h($anexo->id) ?></h2>
<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Nome') ?></h6>
        <p><?= h($anexo->nome) ?></p>
        <h6><?= __('Caminho') ?></h6>
        <p><?= h($anexo->caminho) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($anexo->id) ?></p>
        <h6><?= __('Tamanho') ?></h6>
        <p><?= $this->Number->format($anexo->tamanho) ?></p>
        <h6><?= __('Created By') ?></h6>
        <p><?= $this->Number->format($anexo->created_by) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Created') ?></h6>
        <p><?= h($anexo->created) ?></p>
        <h6><?= __('Modified') ?></h6>
        <p><?= h($anexo->modified) ?></p>
    </div>
</div>

