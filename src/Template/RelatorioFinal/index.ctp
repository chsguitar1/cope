<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Relatorio Final'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="relatorioFinal index large-9 medium-8 columns content">
    <h3><?= __('Relatorio Final') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id_relatorio') ?></th>
                <th><?= $this->Paginator->sort('num_cadastro') ?></th>
                <th><?= $this->Paginator->sort('data_ini') ?></th>
                <th><?= $this->Paginator->sort('local_execucao') ?></th>
                <th><?= $this->Paginator->sort('natureza') ?></th>
                <th><?= $this->Paginator->sort('id_projeto') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relatorioFinal as $relatorioFinal): ?>
            <tr>
                <td><?= $this->Number->format($relatorioFinal->id_relatorio) ?></td>
                <td><?= h($relatorioFinal->num_cadastro) ?></td>
                <td><?= h($relatorioFinal->data_ini) ?></td>
                <td><?= h($relatorioFinal->local_execucao) ?></td>
                <td><?= h($relatorioFinal->natureza) ?></td>
                <td><?= $this->Number->format($relatorioFinal->id_projeto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $relatorioFinal->id_relatorio]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relatorioFinal->id_relatorio]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relatorioFinal->id_relatorio], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorioFinal->id_relatorio)]) ?>
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
