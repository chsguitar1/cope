<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Role User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
<div class="roleUsers index large-9 medium-8 columns content">
    <h3><?= __('Role Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roleUsers as $roleUser): ?>
            <tr>
                <td><?= $this->Number->format($roleUser->usuario_id) ?></td>
                <td><?= $this->Number->format($roleUser->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $roleUser->usuario_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roleUser->usuario_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roleUser->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleUser->usuario_id)]) ?>
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
