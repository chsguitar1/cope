<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $relatorioFinal->id_relatorio],
                ['confirm' => __('Are you sure you want to delete # {0}?', $relatorioFinal->id_relatorio)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Relatorio Final'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="relatorioFinal form large-9 medium-8 columns content">
    <?= $this->Form->create($relatorioFinal) ?>
    <fieldset>
        <legend><?= __('Edit Relatorio Final') ?></legend>
        <?php
            echo $this->Form->input('num_cadastro');
            echo $this->Form->input('data_ini');
            echo $this->Form->input('local_execucao');
            echo $this->Form->input('natureza');
            echo $this->Form->input('resumo');
            echo $this->Form->input('palavras');
            echo $this->Form->input('situacao');
            echo $this->Form->input('perspectiva');
            echo $this->Form->input('participacao_discente');
            echo $this->Form->input('producoes');
            echo $this->Form->input('referencias');
            echo $this->Form->input('id_projeto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
