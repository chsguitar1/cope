<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>


<div class="cursos form large-9 medium-8 columns content">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Add Curso') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('coordenador_id', ['options' => $pessoas]);
        ?>
    </fieldset>
     <?= $this->Form->button(__("Adicionar"),['class' => 'btn-success']); ?>
    <?= $this->Form->end() ?>
</div>
