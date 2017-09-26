<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('Edit Linhas Extensao'), ['action' => 'edit', $linhasExtensao->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Linhas Extensao'), ['action' => 'delete', $linhasExtensao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $linhasExtensao->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Linhas Extensao'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Linhas Extensao'), ['action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h2><?= h($linhasExtensao->id) ?></h2>
<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Nome') ?></h6>
        <p><?= h($linhasExtensao->nome) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($linhasExtensao->id) ?></p>
    </div>
</div>

