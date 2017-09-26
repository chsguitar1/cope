<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $anexo->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $anexo->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Anexos'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($anexo); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Anexo']) ?></legend>
    <?php
    echo $this->Form->input('nome');
    echo $this->Form->input('caminho');
    echo $this->Form->input('tamanho');
    echo $this->Form->input('created_by');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>