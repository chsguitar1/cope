<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="projetos form large-9 medium-8 columns content">

    <div class="panel panel-default">
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
                            <th>Tipo</th>
                            <th>CH</th>
                            <th>Dt. Entrada</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <?php foreach ($projeto->participantes_projetos as $an): ?>
                        <tr>
                            <td><?= h($an->id) ?></td>
                            <td><?= h($an->pessoa->nome) ?></td>
                            <td><?= h($an->tipoParticipanteToStr($an->tipo_participante)) ?></td>
                            <td><?= h($an->carga_horaria) . 'h' ?></td>
                            <td><?= h($an->data_entrada->i18nFormat('dd/MM/YYYY')) ?></td>
                            <td><?= ($projeto->rascunho) ? $this->Form->postLink(__(''), ['action' => 'del_participante', $an->id], ['confirm' => __('Tem certeza que deseja remover # {0}?', $an->id), 'class' => 'btn btn-default fa fa-trash-o', 'title' => 'Deletar']) : '' ?><td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </fieldset>
        </div>
    </div>
</div>
<?= $this->Form->create($participante) ?>
<fieldset>

    <div class="panel panel-default">
        <div class="panel-body">

<!-- <legend><?= __('Add Participantes Projeto') ?></legend> -->
            <legend><?= __('Adicionar Participantes Projeto') ?></legend>
            <?php
            $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']);
            echo $this->Form->input('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->input('carga_horaria');
            echo $this->Form->input('tipo_participante', ['options' => array(0 => 'Coordenador', 1 => 'Vice-Coordenador', 2 => 'Colaborador', 3 => 'Discente')]);
            echo $this->Form->input('bolsista', ['type' => 'checkbox']);
            echo $this->Form->input('bolsa', ['label' => 'Modalidade/Financiamento']);
            echo $this->Form->input('data_entrada', ['dateWidget' => 'DD/MM/YYYY', 'type' => 'date']);
            echo $this->Form->input('data_saida', ['empty' => true, 'default' => '']);
            echo $this->Form->input('vinculo_projeto', ['options' => $participante->vinculosParticipante()]);
            echo $this->Form->input('recebe_certificado', ['type' => 'checkbox', 'checked' => true]);
            ?>
            <?= $this->Form->button(__('Adicionar'), ['name' => 'submit', 'value' => 'adicionar', 'type' => 'submit', 'class' => 'btn btn btn-success']) ?>
             <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
            </fieldset>
        </div>

        <?= $this->Form->end() ?>
       
    </div>
