<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>


<div class="projetos view large-9 medium-8 columns content">
    
    <div class="well">
       
        <h2>Projeto : <?= $projeto->tituto_projeto ?></h2>
        
        <div class="container" style="margin: 0px;" >
            <div class="row">
                <div class="col-sm-5" >
                    <table class="table table-striped table-bordered">

                        <tr>
                            <th><?= __('Num Protocolo') ?></th>
                            <td><?= h($projeto->num_protocolo) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Num Sipac') ?></th>
                            <td><?= h($projeto->num_sipac) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Tituto Projeto') ?></th>
                            <td><?= h($projeto->tituto_projeto) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Curso') ?></th>
                            <td><?= $projeto->has('curso') ? $this->Html->link($projeto->curso->nome, ['controller' => 'Cursos', 'action' => 'view', $projeto->curso->id]) : '' ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($projeto->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Ano') ?></th>
                            <td><?= h($projeto->ano) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Area Conhecimento') ?></th>
                            <td><?= $projeto->areas_conhecimento->descricao ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Situacao Projeto') ?></th>
                            <td><?= h($projeto->tiposSituacaoToStr($projeto->situacao_projeto)) ?></td>
                        </tr>
                    </table>

                </div>
                <div class="col-sm-5">
                    <table class="table table-striped table-responsive">
                        <tr>
                            <th><?= __('Tipo Projeto') ?></th>
                            <td><?= h($projeto->tiposProjetosToStr($projeto->tipo_projeto)) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Data Inicio') ?></th>
                            <td><?= h($projeto->data_inicio->i18nFormat('dd/MM/YYYY')) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Data Fim') ?></th>
                            <td><?= h(($projeto->data_fim != null) ? $projeto->data_fim->i18nFormat('dd/MM/YYYY') : '') ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Registrado no sistema') ?></th>
                            <td><?= h($projeto->created->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Modificado no sistema') ?></th>
                            <td><?= h($projeto->modified->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Data Protocolo') ?></th>
                            <td><?= h(($projeto->data_protocolo != null) ? $projeto->data_protocolo->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo') : '') ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Cadastrado por:') ?></th>
                            <td><?= h($projeto->created_user->pessoa->nome) ?></tr>
                        </tr>
                    </table>
                </div>
                 <div class="row" style="align-items: flex-end" >

            <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
        </div>
            </div>
        </div>
    </div>

    <div class="related well">
        <h4><?= __('Participantes do Projeto') ?></h4>
        <?php if (!empty($projeto->participantes_projetos)): ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
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
    </div>


    <div class="related well">
        <h4><?= __('Movimentações') ?></h4>
        <?php
        $col_evento = new Cake\Collection\Collection($projeto->eventos);
        $col_evento = $col_evento->sortBy('id', SORT_DESC);
        $arr = $col_evento->toArray();
        ?>


        <?php // if (!empty($projeto->eventos('id'))):   ?>
        <?php if (!empty($arr)): ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tr>
                    <th><?= __('Data') ?></th>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Tipo') ?></th>
                    <th><?= __('Destino') ?></th>
                    <th><?= __('Responsável') ?></th>
                    <th><?= __('Descrição') ?></th>
                </tr>

                <?php foreach ($arr as $an): ?>
                    <tr>
                        <td><?= h($an->data_evento->i18nFormat('dd/MM/YYYY - HH:mm:ss', 'America/Sao_Paulo')) ?></td>
                        <td><?= h($an->id) ?></td>
                        <td><?= h($an->tpMovimentoToStr($an->tipo)) ?></td>
                        <td><?= h($an->setore != null ? $an->setore->descricao : '') ?></td>
                        <td><?php
                    if ($user_role == \App\Model\Entity\User::ROLE_PROPONENTE && \App\Model\Entity\Evento::TP_MOV_PARECERISTA == $an->tipo) {
                        echo '*sigiloso*';
                    } else {
                        echo h($an->pessoa != null ? $an->pessoa->nome : '');
                    }
                    ?></td>
                        <td><b><?= h($an->descricao) ?></b></td>
                    </tr>
                        <?php endforeach; ?>
            </table>
<?php endif; ?>
    </div>

    <div class="well">
        <h4><?= __('Acompanhamentos') ?></h4>
<?php if (!empty($projeto->acompanhamentos)): ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive" style='background-color: white;'>
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Usuário') ?></th>
                    <th><?= __('Tipo') ?></th>
                    <th><?= __('Data') ?></th>
                </tr>

    <?php foreach ($projeto->acompanhamentos as $an): ?>
                    <tr>
                        <td><?= h($an->id) ?></td>
                        <td><?= h($an->criado_por->pessoa->nome) ?></td>
                        <td><?= h($an->tipoAcompanhamentoToStr($an->tipo)) ?></td>
                        <td><?= h($an->created->i18nFormat('dd/MM/YYYY - hh:mm')) ?></td>
                    </tr>
    <?php endforeach; ?>
            </table>
<?php endif; ?>
    </div>

    <div class="well">
        <h4><?= __('Solicitações de pareceres') ?></h4>
<?php if (!empty($projeto->solicitacao_pareceres)): ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive" style='background-color: white;'>
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Parecerista') ?></th>
                    <th><?= __('Data Solicitação') ?></th>
                    <th><?= __('Data Aceite/Rejeição') ?></th>
                    <th><?= __('Situação') ?></th>
                    <th><?= __('Download') ?></th>
                </tr>

    <?php foreach ($projeto->solicitacao_pareceres as $an): ?>
                    <tr>

                        <td><?= h($an->id) ?></td>
                        <td>
        <?php
        if ($user_role == \App\Model\Entity\User::ROLE_PROPONENTE) {
            echo '*sigiloso*';
        } else {
            echo $an->has('pessoa') ? $this->Html->link($an->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $an->pessoa->id]) : '';
        }
        ?>

                        </td>
                        <td><?= h($an->data_solicitacao->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></td>
                        <td><?= h($an->data_aceitacao_rejeicao == null ? '' : $an->data_aceitacao_rejeicao->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></td>
                        <td><?= \App\Model\Entity\SolicitacaoParecer::tpSitSolicitacao($an->situacao) ?></td>
                        <td>
        <?= $an->situacao == 4 ? $this->Html->link('Download', ['controller' => 'pareceres',
                    'action' => 'download', $an->id]) : ''
        ?></td>                        
                    </tr>
                        <?php endforeach; ?>
            </table>
                    <?php endif; ?>
    </div>



</div>
