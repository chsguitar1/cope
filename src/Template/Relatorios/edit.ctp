<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $relatorio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $relatorio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Relatorios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fases'), ['controller' => 'Fases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fase'), ['controller' => 'Fases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="relatorios form large-9 medium-8 columns content">
    <?= $this->Form->create($relatorio) ?>
    <fieldset>
        <legend><?= __('Edit Relatorio') ?></legend>
        <?php
            echo $this->Form->input('data_relatorio');
            echo $this->Form->input('data_protocolo');
            echo $this->Form->input('fase_id', ['options' => $fases]);
            echo $this->Form->input('nome_arquivo');
            echo $this->Form->input('caminho_arquivo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
