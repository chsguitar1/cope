<?php

$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>

<?= $this->Form->create($pessoa); ?>
<fieldset>
    <legend><?= __('Editar Participante') ?></legend>
    <?php
    echo $this->Form->input('nome');
    echo $this->Form->input('vinculo',['options' => array(0 => 'Professor', 1 => 'Técnico', 2 => 'Aluno', 3 => 'Outros'), 
        'label' => 'Tipo de Vinculo.', 'style' => 'width: 150px;', 'id' => 'cb_tipo']);
    echo $this->Form->input('siape');
    echo $this->Form->input('matricula');
    echo $this->Form->input('email');
    echo $this->Form->input('rg');
    echo $this->Form->input('cpf');
    ?>
</fieldset>
<nav class="navbar  navbar-default">
   <div class="container-fluid container">
        <?= $this->Form->button(__("Salvar"),['class' => 'btn-success']); ?>
       <?= $this->Form->end() ?>
        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-danger ']); ?>
   </div>

</nav>