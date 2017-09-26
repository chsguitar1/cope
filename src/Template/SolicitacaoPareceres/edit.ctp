<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $solicitacaoParecere->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $solicitacaoParecere->id)]
    )
    ?>
    </li>
   
   
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($solicitacaoParecere); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Solicitacao Parecere']) ?></legend>
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
  <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn btn-success']) ?>
<?= $this->Form->end() ?>