<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $areasConhecimento->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $areasConhecimento->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Areas Conhecimentos'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($areasConhecimento); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Areas Conhecimento']) ?></legend>
    <?php
    echo $this->Form->input('descricao');
    echo $this->Form->input('cod_pai');
    echo $this->Form->input('nivel');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>