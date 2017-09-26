<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

?>
   
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Novo Usuário ') ?></legend>
    <?php
    echo $this->Form->input('username',['label' => 'Login']);
    echo $this->Form->input('password',['label' => 'Senha']);
    echo $this->Form->input('default_role', ['options' => $user->escoposUsers(),'label' => 'Escopo']);
    echo $this->Form->input('pessoa_id', ['options' => $pessoas]);
    ?>
</fieldset>
   <nav class="navbar  navbar-default">
   <div class="container-fluid container">
        <?= $this->Form->button(__("Adicionar"),['class' => 'btn-success']); ?>
       <?= $this->Form->end() ?>
        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-danger ']); ?>
   </div>

</nav>
