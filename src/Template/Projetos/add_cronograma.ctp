<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<div class="projetos form large-9 medium-8 columns content">
    <div class="panel-body">
        <fieldset>
            <legend><?= __('Detalhes do Projeto.') ?></legend>

            <span style="font-weight: bold;"> Título do Projeto: </span><?= $projeto->tituto_projeto; ?>

            <legend><?= __('Participantes:') ?></legend>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>

                    </tr>
                </thead>

                <?php foreach ($projeto->cronograma as $an): ?>
                    <tr>
                        <td><?= h($an->id) ?></td>
                        <td><?= h($an->atividade) ?></td>

                    </tr>

                <?php endforeach; ?>
            </table>
        </fieldset>
    </div>
</div>
<div class="cronograma form large-9 medium-8 columns content">
    <?= $this->Form->create($cronograma) ?>
    <fieldset>
        <legend><?= __('Add Cronograma') ?></legend>
        <?php
       
        echo $this->Form->input('atividade');
        echo $this->Form->input('janeiro');
        echo $this->Form->input('fevereiro');
        echo $this->Form->input('marco');
        echo $this->Form->input('abril');
        echo $this->Form->input('maio');
        echo $this->Form->input('junho');
        echo $this->Form->input('julho');
        echo $this->Form->input('agosto');
        echo $this->Form->input('setembro');
        echo $this->Form->input('outubro');
        echo $this->Form->input('novembro');
        echo $this->Form->input('dezembro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
