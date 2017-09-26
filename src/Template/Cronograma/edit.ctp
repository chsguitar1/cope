<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<div class="cronograma form large-9 medium-8 columns content">
    <?= $this->Form->create($cronograma) ?>
    <fieldset>
        <legend><?= __('Editar Cronograma') ?></legend>
        <?php
           
         
            echo $this->Form->input('atividade');
            echo $this->Form->input('janeiro');
            echo $this->Form->input('fevereiro');
            echo $this->Form->input('marco');
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
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
