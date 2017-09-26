<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Relatorio'), ['action' => 'edit', $relatorio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Relatorio'), ['action' => 'delete', $relatorio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Relatorios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relatorio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fases'), ['controller' => 'Fases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fase'), ['controller' => 'Fases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="relatorios view large-9 medium-8 columns content">
    <h3><?= h($relatorio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Fase') ?></th>
            <td><?= $relatorio->has('fase') ? $this->Html->link($relatorio->fase->id, ['controller' => 'Fases', 'action' => 'view', $relatorio->fase->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nome Arquivo') ?></th>
            <td><?= h($relatorio->nome_arquivo) ?></td>
        </tr>
        <tr>
            <th><?= __('Caminho Arquivo') ?></th>
            <td><?= h($relatorio->caminho_arquivo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($relatorio->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Relatorio') ?></th>
            <td><?= h($relatorio->data_relatorio) ?></tr>
        </tr>
        <tr>
            <th><?= __('Data Protocolo') ?></th>
            <td><?= h($relatorio->data_protocolo) ?></tr>
        </tr>
    </table>
</div>
