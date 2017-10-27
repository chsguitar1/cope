<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Relatorio Final'), ['action' => 'edit', $relatorioFinal->id_relatorio]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Relatorio Final'), ['action' => 'delete', $relatorioFinal->id_relatorio], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorioFinal->id_relatorio)]) ?> </li>
        <li><?= $this->Html->link(__('List Relatorio Final'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relatorio Final'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="relatorioFinal view large-9 medium-8 columns content">
    <h3><?= h($relatorioFinal->id_relatorio) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Num Cadastro') ?></th>
            <td><?= h($relatorioFinal->num_cadastro) ?></td>
        </tr>
        <tr>
            <th><?= __('Local Execucao') ?></th>
            <td><?= h($relatorioFinal->local_execucao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Relatorio') ?></th>
            <td><?= $this->Number->format($relatorioFinal->id_relatorio) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Projeto') ?></th>
            <td><?= $this->Number->format($relatorioFinal->id_projeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Ini') ?></th>
            <td><?= h($relatorioFinal->data_ini) ?></tr>
        </tr>
        <tr>
            <th><?= __('Natureza') ?></th>
            <td><?= $relatorioFinal->natureza ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Resumo') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->resumo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Palavras') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->palavras)); ?>
    </div>
    <div class="row">
        <h4><?= __('Situacao') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->situacao)); ?>
    </div>
    <div class="row">
        <h4><?= __('Perspectiva') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->perspectiva)); ?>
    </div>
    <div class="row">
        <h4><?= __('Participacao Discente') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->participacao_discente)); ?>
    </div>
    <div class="row">
        <h4><?= __('Producoes') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->producoes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Referencias') ?></h4>
        <?= $this->Text->autoParagraph(h($relatorioFinal->referencias)); ?>
    </div>
</div>
