<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="cronograma form large-9 medium-8 columns content">
    <?= $this->Form->create($cronograma) ?>
    <fieldset>
        <legend><?= __('Adicionar Cronograma') ?></legend>
        <?php
        echo $this->Form->input('atividade');
        echo $this->Form->input('janeiro');
        echo $this->Form->input('fevereiro');
        echo $this->Form->input('marco',['label'=> 'Março']);
        echo $this->Form->input('abril');
        echo $this->Form->input('maio');
        echo $this->Form->input('junho');
        echo $this->Form->input('julho');
        echo $this->Form->input('agosto');
        echo $this->Form->input('setembro');
        echo $this->Form->input('outubro');
        echo $this->Form->input('novembro');
        echo $this->Form->input('dezembro');
        ?>


    </fieldset>

</div>
<div>
    <?= $this->Form->button(__('Adicionar'), ['name' => 'submit', 'value' => 'adicionar', 'type' => 'submit', 'class' => 'btn btn btn-success']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('Voltar', ['action' => 'indexprojeto',$idprojeto], ['class' => 'btn btn-primary']); ?>
</div>