<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>
<!--    <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Participantes Projetos'), ['controller' => 'ParticipantesProjetos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Participantes Projeto'), ['controller' => 'ParticipantesProjetos', 'action' => 'add']) ?> </li>-->

<?= $this->Form->create($pessoa); ?>
<fieldset>
    <legend><?= __('Nova Pessoa') ?></legend>
    <?php
    echo $this->Form->input('nome');
    echo $this->Form->input('vinculo',['options' => array(0 => 'Professor', 1 => 'Técnico', 2 => 'Aluno', 3 => 'Outros'), 
        'label' => 'Tipo de Vinculo', 'style' => 'width: 150px;', 'id' => 'cb_tipo']);
    echo $this->Form->input('siape');
    echo $this->Form->input('matricula');
    echo $this->Form->input('email',['label'=> 'E-mail']);
    echo $this->Form->input('rg');
    echo $this->Form->input('cpf');
    ?>
</fieldset>
<nav class="navbar  navbar-default">
   <div class="container-fluid container">
        <?= $this->Form->button(__("Adicionar"),['class' => 'btn-success']); ?>
       <?= $this->Form->end() ?>
        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class' => 'btn btn-danger ']); ?>
   </div>

</nav>