<h3><?= __('Definir parecerista atual.') ?></h3>

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<h4>
    <?= 'Projeto: ' . $projeto->tituto_projeto . '[' . $projeto->id . ']' ?>
</h4>
<div class="pareceristas form large-9 medium-8 columns content horizontal-form">
    <?= $this->Form->create($parecerista) ?>

    <div class="well">
        <fieldset>
            <legend><?= __('Adicionar Solicitação de  Parecer') ?></legend>
            <?php
            echo $this->Form->input('id_pessoa', ['options' => $pessoas]);
            echo $this->Form->input('tipo_parecer', ['options' => $tipos_pareceres]);
            echo $this->Form->input('data_limite_envio', ['empty' => true, 'default' => '', 'label' => 'Prazo para entrega']);
            echo $this->Form->input('data_limite_aceite', ['empty' => true, 'default' => '', 'label' => 'Prazo para entrega']);
            echo $this->Form->input('observacao_solicitacao', ['type' => 'textarea']);
            ?>
        </fieldset>
    </div>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
