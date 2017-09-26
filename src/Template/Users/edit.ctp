<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
     <li><?= $this->Html->link(__('List Role Users'), ['controller' => 'RoleUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role User'), ['controller' => 'RoleUsers', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Editar usuário') ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('default_role', ['options' => $user->escoposUsers(),'label' => 'Escopo']);
    echo $this->Form->input('pessoa_id', ['options' => $pessoas]);
    ?>
</fieldset>
  <nav class="navbar  navbar-default">
   <div class="container-fluid container">
        <?= $this->Form->button(__("Salvar"),['class' => 'btn-success']); ?>
       <?= $this->Form->end() ?>
        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-danger ']); ?>
   </div>

</nav>