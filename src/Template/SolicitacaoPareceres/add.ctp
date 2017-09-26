<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Solicitacao Pareceres'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($solicitacaoParecere); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Solicitacao Parecere']) ?></legend>
    <?php
    echo $this->Form->input('id_projeto', ['options' => $projetos]);
    echo $this->Form->input('id_pessoa', ['options' => $pessoas]);
    echo $this->Form->input('data_solicitacao');
    echo $this->Form->input('data_aceitacao_rejeicao');
    echo $this->Form->input('observacao_solicitacao');
    echo $this->Form->input('observacao_aceitacao_rejeicao');
    echo $this->Form->input('sitacao');
    echo $this->Form->input('externo');
    echo $this->Form->input('data_limite_aceite');
    echo $this->Form->input('data_limite_envio');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>