<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Solicitacao Pareceres'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($solicitacaoParecer); ?>
<fieldset>
    <legend><?= __('Adicionar Solicitação de Parecer - Projeto: ' . $nome_projeto) ?></legend>
    <?php
    echo $this->Form->input('id_pessoa', ['options' => $pessoas]);
    //echo $this->Form->input('data_solicitacao');
//    echo $this->Form->input('data_aceitacao_rejeicao');
    echo $this->Form->input('tipo_parecer', ['options' => $tipos_pareceres]);
    echo $this->Form->input('observacao_solicitacao',['label'=> 'Observação ou solicitação']);
//    echo $this->Form->input('observacao_aceitacao_rejeicao');
//    echo $this->Form->input('sitacao');
    echo $this->Form->input('externo');
    echo $this->Form->input('data_limite_aceite');
    echo $this->Form->input('data_limite_envio');
    ?>
</fieldset>
<div class="col-lg-2">
    <?= $this->Form->button(__("Salvar"), ['class' => 'btn btn-success']); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('Voltar', ['controller' => 'Projetos', 'action' => 'redirecionar'], ['class' => 'btn btn-primary']); ?>
   
</div>

