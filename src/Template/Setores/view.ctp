<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setore'), ['action' => 'edit', $setore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setore'), ['action' => 'delete', $setore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Setores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setore'), ['controller' => 'Setores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="setores view large-9 medium-8 columns content">
    <h3><?= h($setore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($setore->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Setore') ?></th>
            <td><?= $setore->has('setore') ? $this->Html->link($setore->setore->id, ['controller' => 'Setores', 'action' => 'view', $setore->setore->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($setore->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Identificador') ?></th>
            <td><?= $this->Number->format($setore->identificador) ?></td>
        </tr>
    </table>
</div>
