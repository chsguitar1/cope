<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
   
</nav>
<div class="cursos form large-9 medium-8 columns content">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Alterar Curso') ?></legend>
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('coordenador_id', ['options' => $pessoas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__("Enviar"),['class' => 'btn-success']); ?>
    <?= $this->Form->end() ?>
</div>
