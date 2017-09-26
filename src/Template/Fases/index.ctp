<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Relatorios'), ['controller' => 'Relatorios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relatorio'), ['controller' => 'Relatorios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fases index large-9 medium-8 columns content">
    <h3><?= __('Fases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data_limite') ?></th>
                <th><?= $this->Paginator->sort('data_recebimento') ?></th>
                <th><?= $this->Paginator->sort('aberto') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('aprovado') ?></th>
                <th><?= $this->Paginator->sort('projeto_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fases as $fase): ?>
            <tr>
                <td><?= $this->Number->format($fase->id) ?></td>
                <td><?= h($fase->data_limite) ?></td>
                <td><?= h($fase->data_recebimento) ?></td>
                <td><?= $this->Number->format($fase->aberto) ?></td>
                <td><?= $this->Number->format($fase->tipo) ?></td>
                <td><?= $this->Number->format($fase->aprovado) ?></td>
                <td><?= $fase->has('projeto') ? $this->Html->link($fase->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $fase->projeto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fase->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
