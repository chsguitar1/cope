<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

?>
 
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Editar usuário') ?></legend>
    <?php
    echo $this->Form->input('username',['label'=> 'Usuário']);
    echo $this->Form->input('password',['label'=> 'Senha']);
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