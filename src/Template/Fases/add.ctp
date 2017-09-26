<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Relatorios'), ['controller' => 'Relatorios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relatorio'), ['controller' => 'Relatorios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fases form large-9 medium-8 columns content">
    <?= $this->Form->create($fase) ?>
    <fieldset>
        <legend><?= __('Add Fase') ?></legend>
        <?php
            echo $this->Form->input('data_limite');
            echo $this->Form->input('data_recebimento');
            echo $this->Form->input('aberto');
            echo $this->Form->input('tipo');
            echo $this->Form->input('aprovado');
            echo $this->Form->input('projeto_id', ['options' => $projetos]);
            echo $this->Form->input('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
