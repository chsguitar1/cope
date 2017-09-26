<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $linhasExtensao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $linhasExtensao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Linhas Extensao'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($linhasExtensao); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Linhas Extensao']) ?></legend>
    <?php
    echo $this->Form->input('nome');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>