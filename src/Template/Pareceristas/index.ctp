<div class="pareceristas index large-9 medium-8 columns content">
    <h3><?= __('Pareceristas') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parecerista_id') ?></th>
                <th><?= $this->Paginator->sort('projeto_id') ?></th>
                <th><?= $this->Paginator->sort('prazo') ?></th>
                <th><?= $this->Paginator->sort('observacao') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pareceristas as $parecerista): ?>
            <tr>
                <td><?= $this->Number->format($parecerista->id) ?></td>
                <td><?= $parecerista->has('pessoa') ? $this->Html->link($parecerista->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $parecerista->pessoa->id]) : '' ?></td>
                <td><?= $this->Number->format($parecerista->projeto_id) ?></td>
                <td><?= h($parecerista->prazo) ?></td>
                <td><?= h($parecerista->observacao) ?></td>
                <td><?= $this->Number->format($parecerista->created_by) ?></td>
                <td><?= h($parecerista->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parecerista->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parecerista->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parecerista->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parecerista->id)]) ?>
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
