<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('Edit Areas Conhecimento'), ['action' => 'edit', $areasConhecimento->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Areas Conhecimento'), ['action' => 'delete', $areasConhecimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areasConhecimento->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Areas Conhecimentos'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Areas Conhecimento'), ['action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h2><?= h($areasConhecimento->id) ?></h2>
<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Descricao') ?></h6>
        <p><?= h($areasConhecimento->descricao) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($areasConhecimento->id) ?></p>
        <h6><?= __('Cod Pai') ?></h6>
        <p><?= $this->Number->format($areasConhecimento->cod_pai) ?></p>
        <h6><?= __('Nivel') ?></h6>
        <p><?= $this->Number->format($areasConhecimento->nivel) ?></p>
    </div>
</div>

