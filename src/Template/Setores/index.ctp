<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Setore'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="setores index large-9 medium-8 columns content">
    <h3><?= __('Setores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th><?= $this->Paginator->sort('responsavel_id') ?></th>
                <th><?= $this->Paginator->sort('identificador') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($setores as $setore): ?>
            <tr>
                <td><?= $this->Number->format($setore->id) ?></td>
                <td><?= h($setore->descricao) ?></td>
                <td><?= $setore->has('setore') ? $this->Html->link($setore->setore->id, ['controller' => 'Setores', 'action' => 'view', $setore->setore->id]) : '' ?></td>
                <td><?= $this->Number->format($setore->identificador) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $setore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setore->id)]) ?>
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
