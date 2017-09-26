<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="projetos view large-9 medium-8 columns content">
    <h3><?= h($projeto->id . ' - ' . $projeto->tituto_projeto) ?></h3>
    <table class="table table-striped">

        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($projeto->id) ?></td>
        </tr>

        <tr>
            <th><?= __('Tituto Projeto') ?></th>
            <td><?= h($projeto->tituto_projeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Curso') ?></th>
            <td><?= $projeto->has('curso') ? $this->Html->link($projeto->curso->nome, ['controller' => 'Cursos', 'action' => 'view', $projeto->curso->id]) : '' ?></td>
        </tr>
        <th><?= __('Ano') ?></th>
        <td><?= $projeto->ano ?></td>

        <tr>
            <th><?= __('Grande Area Conhecimento') ?></th>
            <td><?= $projeto->areasConhecimentoToStr($projeto->grande_area_conhecimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Situacao Projeto') ?></th>
            <td><?= $projeto->tiposSituacaoToStr($projeto->situacao_projeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Projeto') ?></th>
            <td><?= ($projeto->tipo_projeto == 0) ? 'Pesquisa' : 'Extensão' ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio') ?></th>
            <td><?= h($projeto->data_inicio) ?></td>
        </tr>

        <tr>
            <th><?= __('Data Fim') ?></th>
            <td><?= h($projeto->data_fim) ?></td>
        </tr>

        <tr>
            <th><?= __('Vai para comitê de ética?') ?></th>
            <td><?= ($projeto->comite_etica) ? 'SIM' : 'NÃO' ?></td>
        </tr>


        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= h($projeto->created) ?></td></tr>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= h($projeto->modified) ?></td>
        </tr>

    </table>

    <div class="row">
        <h4><?= __('Descricao Projeto') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->descricao_projeto)); ?>
    </div>


    <div class="related">
        <h4><?= __('Participantes do Projeto') ?></h4>
        <?php if (!empty($projeto->participantes_projetos)): ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Nome') ?></th>
                    <th><?= __('Vínculo') ?></th>
                    <th><?= __('Carga Horária') ?></th>
                    <th><?= __('Data Entrada') ?></th>

                </tr>

                <?php foreach ($projeto->participantes_projetos as $an): ?>
                    <tr>
                        <td><?= h($an->id) ?></td>
                        <td><?= h($an->pessoa->nome) ?></td>
                        <td><?= h($an->tipoParticipanteToStr($an->tipo_participante)) ?></td>
                        <td><?= h($an->carga_horaria) . 'h' ?></td>
                        <td><?= h($an->data_entrada->i18nFormat('dd/MM/YYYY')) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <div class="form-horizontal well">

        
            <?php if (!empty($inconsistencias)): ?>

                <h4><span style="color:red; font-weight: bold;">Inconsistências</span></h4>
                <hr>
                <?php foreach ($inconsistencias as $in): ?>
                    <ul>
                        <li>
                            <span><?= $in ?></span>
                        </li>
                    </ul>
                <?php endforeach; ?>

            <?php else: ?>
                <span> Não há inconsistências :)</span>
            <?php endif; ?>

        </div>

        <span style="font-family: sans-serif; font-size: 16px; font-weight: bold;">Atenção: Por favor, confira se os dados estão corretos antes de protocolar.</span> <br/><br/><br/>
        <?= $this->Form->create(); ?>
        <?php if (empty($inconsistencias)): ?>
            <?= $this->Form->button('Protocolar', ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id), 'style' => 'font-weight: bold', 'class' => 'btn btn-success']); ?>
        <?php endif; ?>
        <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>

        <?= $this->Form->end(); ?>

    </div>
</div>
