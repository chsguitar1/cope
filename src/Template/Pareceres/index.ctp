<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parecere'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pareceres index large-9 medium-8 columns content">
    <h3><?= __('Pareceres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data_recebimento') ?></th>
                <th><?= $this->Paginator->sort('tipo_parecer') ?></th>
                <th><?= $this->Paginator->sort('parecerista_id') ?></th>
                <th><?= $this->Paginator->sort('projeto_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pareceres as $parecere): ?>
            <tr>
                <td><?= $this->Number->format($parecere->id) ?></td>
                <td><?= h($parecere->data_recebimento) ?></td>
                <td><?= $this->Number->format($parecere->tipo_parecer) ?></td>
                <td><?= $parecere->has('pessoa') ? $this->Html->link($parecere->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $parecere->pessoa->id]) : '' ?></td>
                <td><?= $parecere->has('projeto') ? $this->Html->link($parecere->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $parecere->projeto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parecere->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parecere->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parecere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parecere->id)]) ?>
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
