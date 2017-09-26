<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parecere'), ['action' => 'edit', $parecere->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parecere'), ['action' => 'delete', $parecere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parecere->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pareceres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parecere'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pareceres view large-9 medium-8 columns content">
    <h3><?= h($parecere->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $parecere->has('pessoa') ? $this->Html->link($parecere->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $parecere->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $parecere->has('projeto') ? $this->Html->link($parecere->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $parecere->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parecere->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Parecer') ?></th>
            <td><?= $this->Number->format($parecere->tipo_parecer) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Recebimento') ?></th>
            <td><?= h($parecere->data_recebimento) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Arquivo') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->arquivo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nome Arquivo') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->nome_arquivo)); ?>
    </div>
</div>
