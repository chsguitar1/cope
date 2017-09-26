<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>


<h3>Projeto: <?=  $projeto->tituto_projeto ?></h3>

<hr>
<div class="well">
    <fieldset>
        <legend><?= __('Adicionar Acompanhamentos') ?></legend>
        <?php
        echo $this->Form->create($acompanhamento);
        echo $this->Form->input('tipo', [ 'type' => 'select', 'options' => $tipos]);
        echo $this->Form->input('descricao', ['type' => 'textarea', 'label' => 'Descrição']);
        ?>
    </fieldset>
    <?= $this->Form->button(__("Adicionar"), ['class' => 'btn btn-success']); ?>
    <?= $this->Form->end() ?>
     <?= $this->Html->link('Voltar', ['controller' => 'Projetos', 'action' => 'redirecionar'], ['class' => 'btn btn-primary']); ?>
</div>

<legend><?= __('Acompanhamentos') ?></legend>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id', ['label' => 'Id']); ?></th>
            <th><?= $this->Paginator->sort('created_by', ['label' => 'Usuário']); ?></th>
            <th><?= $this->Paginator->sort('created', ['label' => 'Data']); ?></th>
            <th><?= $this->Paginator->sort('tipo', ['label' => 'Tipo']); ?></th>
            <th class="actions"><?= __('Ações'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projeto->acompanhamentos as $acompanhamento): ?>
            <tr>
                <td><?= $this->Number->format($acompanhamento->id) ?></td>
                <td><?= $acompanhamento->criado_por->pessoa->nome ?></td>
                <td><?= h($acompanhamento->created) ?></td>
                <td><?= h($acompanhamento->tipoAcompanhamentoToStr($acompanhamento->tipo)) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $acompanhamento->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('próximo') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>