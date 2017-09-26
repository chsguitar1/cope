<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fase'), ['action' => 'edit', $fase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fase'), ['action' => 'delete', $fase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Relatorios'), ['controller' => 'Relatorios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relatorio'), ['controller' => 'Relatorios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fases view large-9 medium-8 columns content">
    <h3><?= h($fase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $fase->has('projeto') ? $this->Html->link($fase->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $fase->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fase->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Aberto') ?></th>
            <td><?= $this->Number->format($fase->aberto) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($fase->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Aprovado') ?></th>
            <td><?= $this->Number->format($fase->aprovado) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($fase->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Limite') ?></th>
            <td><?= h($fase->data_limite) ?></tr>
        </tr>
        <tr>
            <th><?= __('Data Recebimento') ?></th>
            <td><?= h($fase->data_recebimento) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($fase->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($fase->modified) ?></tr>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Relatorios') ?></h4>
        <?php if (!empty($fase->relatorios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data Relatorio') ?></th>
                <th><?= __('Data Protocolo') ?></th>
                <th><?= __('Fase Id') ?></th>
                <th><?= __('Nome Arquivo') ?></th>
                <th><?= __('Caminho Arquivo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fase->relatorios as $relatorios): ?>
            <tr>
                <td><?= h($relatorios->id) ?></td>
                <td><?= h($relatorios->data_relatorio) ?></td>
                <td><?= h($relatorios->data_protocolo) ?></td>
                <td><?= h($relatorios->fase_id) ?></td>
                <td><?= h($relatorios->nome_arquivo) ?></td>
                <td><?= h($relatorios->caminho_arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Relatorios', 'action' => 'view', $relatorios->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Relatorios', 'action' => 'edit', $relatorios->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Relatorios', 'action' => 'delete', $relatorios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
