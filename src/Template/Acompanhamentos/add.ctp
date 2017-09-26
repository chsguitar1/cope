<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Acompanhamentos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($acompanhamento); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Acompanhamento']) ?></legend>
    <?php
    echo $this->Form->input('data');
    echo $this->Form->input('tipo');
    echo $this->Form->input('descricao');
    echo $this->Form->input('projeto_id', ['options' => $projetos]);
    echo $this->Form->input('created_by');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>