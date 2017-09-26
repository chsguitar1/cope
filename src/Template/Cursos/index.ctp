<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
    

<nav class="navbar navbar-default">
    <div class="container-fluid container">
            <?= $this->Html->link(__('Novo Curso'), ['action' => 'add'],['class' => 'btn btn-primary']); ?>
    </div>
</nav>    
<div class="cursos index large-9 medium-8 columns content">
    <h3><?= __('Cursos') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('coordenador_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso): ?>
            <tr>
                <td><?= $this->Number->format($curso->id) ?></td>
                <td><?= h($curso->nome) ?></td>
                <td><?= $curso->pessoa->nome ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $curso->id],['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $curso->id],['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $curso->id], ['confirm' => __('Deseja excluir o curso  {0}?', $curso->nome), 'title' => __('Delete')
                        , 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
