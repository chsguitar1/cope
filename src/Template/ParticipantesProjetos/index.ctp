<nav class="navbar navbar-default">
    <div class="container-fluid container">
        <ul class="nav navbar-nav">
            <li class="heading"><?= __('Ações') ?></li>
            <li><?= $this->Html->link(__('Novo Participantes Projeto'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Listar Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Novo Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Listar Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Novo Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        </ul>
    </div>
</nav>

<div class="participantesProjetos index large-9 medium-8 columns content">
    <h3><?= __('Participantes Projetos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('carga_horaria') ?></th>
                <th><?= $this->Paginator->sort('tipo_participante') ?></th>
                <th><?= $this->Paginator->sort('bolsista') ?></th>
                <th><?= $this->Paginator->sort('bolsa') ?></th>
                <th><?= $this->Paginator->sort('data_entrada') ?></th>
                <th><?= $this->Paginator->sort('data_saida') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participantesProjetos as $participantesProjeto): ?>
            <tr>
                <td><?= $this->Number->format($participantesProjeto->id) ?></td>
                <td><?= $this->Number->format($participantesProjeto->carga_horaria) ?></td>
                <td><?= $this->Number->format($participantesProjeto->tipo_participante) ?></td>
                <td><?= $this->Number->format($participantesProjeto->bolsista) ?></td>
                <td><?= h($participantesProjeto->bolsa) ?></td>
                <td><?= h($participantesProjeto->data_entrada) ?></td>
                <td><?= h($participantesProjeto->data_saida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $participantesProjeto->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $participantesProjeto->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $participantesProjeto->id], ['confirm' => __('Tem certeza que deseja remover # {0}?', $participantesProjeto->id)]) ?>
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
