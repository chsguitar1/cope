<h3></h3>

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<h4>
    <?= 'Projeto/Proposta: ' . $solicitacaoParecer->projeto->tituto_projeto  ?>
</h4>
<div class="pareceristas form large-9 medium-8 columns content horizontal-form">
    <?= $this->Form->create($parecer, ['enctype' => 'multipart/form-data']) ?>

    <div class="well">
        <fieldset>
            <legend><?= __('Enviar Parecer.') ?></legend>
            <?php
            echo $this->Form->input('tipo_resposta', ['options' => $parecer->tiposRespostasPareceres()]);
            echo $this->Form->input('arquivo', ['type' => 'file']);
            ?>
        </fieldset>
    </div>
    <div>
        <?= $this->Form->button(__('Enviar'), ['name' => 'submit', 'value' => 'adicionar', 'type' => 'submit', 'class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
       <?= $this->Html->link('Voltar', ['controller' => 'Projetos', 'action' => 'redirecionar'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
