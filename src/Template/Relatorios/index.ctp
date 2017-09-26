<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Relatorio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fases'), ['controller' => 'Fases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fase'), ['controller' => 'Fases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="relatorios index large-9 medium-8 columns content">
    <h3><?= __('Relatorios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data_relatorio') ?></th>
                <th><?= $this->Paginator->sort('data_protocolo') ?></th>
                <th><?= $this->Paginator->sort('fase_id') ?></th>
                <th><?= $this->Paginator->sort('nome_arquivo') ?></th>
                <th><?= $this->Paginator->sort('caminho_arquivo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relatorios as $relatorio): ?>
            <tr>
                <td><?= $this->Number->format($relatorio->id) ?></td>
                <td><?= h($relatorio->data_relatorio) ?></td>
                <td><?= h($relatorio->data_protocolo) ?></td>
                <td><?= $relatorio->has('fase') ? $this->Html->link($relatorio->fase->id, ['controller' => 'Fases', 'action' => 'view', $relatorio->fase->id]) : '' ?></td>
                <td><?= h($relatorio->nome_arquivo) ?></td>
                <td><?= h($relatorio->caminho_arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $relatorio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relatorio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relatorio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorio->id)]) ?>
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
