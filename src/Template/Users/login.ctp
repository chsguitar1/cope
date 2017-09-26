  <?php
    $this->extend('../Layout/TwitterBootstrap/signin');
    ?>
    
<div class="container-fluid">
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
               <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <fieldset>
                    <legend><?= __('Digite um usuário e senha para acesso') ?></legend>
                       <?= $this->Form->input('username', ['label' => 'Usuário']) ?>
                       <?= $this->Form->input('password', ['label' => 'Senha']) ?>
                </fieldset>
                <?= $this->Form->button(__('Entrar'),['class' => 'btn btn-primary']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>