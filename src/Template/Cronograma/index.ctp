<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cronograma'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cronograma index large-9 medium-8 columns content">
    <h3><?= __('Cronograma') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('idcronograma') ?></th>
                <th><?= $this->Paginator->sort('idprojeto') ?></th>
                <th><?= $this->Paginator->sort('atividade') ?></th>
                <th><?= $this->Paginator->sort('janeiro') ?></th>
                <th><?= $this->Paginator->sort('fevereiro') ?></th>
                <th><?= $this->Paginator->sort('marco') ?></th>
                <th><?= $this->Paginator->sort('abril') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cronograma as $cronograma): ?>
            <tr>
                <td><?= $this->Number->format($cronograma->idcronograma) ?></td>
                <td><?= $this->Number->format($cronograma->idprojeto) ?></td>
                <td><?= $this->Number->format($cronograma->atividade) ?></td>
                <td><?= h($cronograma->janeiro) ?></td>
                <td><?= h($cronograma->fevereiro) ?></td>
                <td><?= h($cronograma->marco) ?></td>
                <td><?= h($cronograma->abril) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cronograma->idcronograma]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cronograma->idcronograma]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cronograma->idcronograma], ['confirm' => __('Are you sure you want to delete # {0}?', $cronograma->idcronograma)]) ?>
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
