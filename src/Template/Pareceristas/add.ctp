<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pareceristas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pareceres'), ['controller' => 'Pareceres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parecere'), ['controller' => 'Pareceres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pareceristas'), ['controller' => 'Pareceristas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parecerista'), ['controller' => 'Pareceristas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pareceristas form large-9 medium-8 columns content">
    <?= $this->Form->create($parecerista) ?>
    <fieldset>
        <legend><?= __('Add Parecerista') ?></legend>
        <?php
            echo $this->Form->input('parecerista_id', ['options' => $pessoas]);
            echo $this->Form->input('projeto_id');
            echo $this->Form->input('prazo', ['empty' => true, 'default' => '']);
            echo $this->Form->input('observacao');
            echo $this->Form->input('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
