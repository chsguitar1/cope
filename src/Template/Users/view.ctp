<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>


<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Usuário') ?></h6>
        <p><?= h($user->username) ?></p>
        <h6><?= __('Pessoa') ?></h6>
        <p><?= $user->has('pessoa') ? $this->Html->link($user->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $user->pessoa->id]) : '' ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($user->id) ?></p>
        <h6><?= __('Escopo') ?></h6>
        <p><?= $this->Number->format($user->escopo) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Criado em:') ?></h6>
        <p><?= h($user->created) ?></p>
        <h6><?= __('Modificado em:') ?></h6>
        <p><?= h($user->modified) ?></p>
    </div>
     <div class="col-lg-2">
       <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>

