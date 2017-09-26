<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pareceres'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pareceres form large-9 medium-8 columns content">
    <?= $this->Form->create($parecere) ?>
    <fieldset>
        <legend><?= __('Add Parecere') ?></legend>
        <?php
            echo $this->Form->input('data_recebimento');
            echo $this->Form->input('tipo_parecer');
            echo $this->Form->input('parecerista_id', ['options' => $pessoas]);
            echo $this->Form->input('projeto_id', ['options' => $projetos]);
            echo $this->Form->input('arquivo');
            echo $this->Form->input('nome_arquivo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
