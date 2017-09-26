<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Anexos'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($anexo); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Anexo']) ?></legend>
    <?php
    echo $this->Form->input('nome');
    echo $this->Form->input('caminho');
    echo $this->Form->input('tamanho');
    echo $this->Form->input('created_by');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>