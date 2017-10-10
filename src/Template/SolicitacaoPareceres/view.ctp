<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>


<h2></h2>
<div class="panel with-nav-tabs panel-info">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1info" data-toggle="tab">Dados Básicos</a></li>
            <li><a href="#tab2info" data-toggle="tab">Formulário</a></li>
            <li><a href="#tab3info" data-toggle="tab">Pareceres</a></li>


        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1info">
                <div class="row">
                    <div class="col-lg-5">
                        <h4><b><?= __('Projeto') ?></b></h4>
                        <p><?= $solicitacaoParecere->has('projeto') ? $this->Html->link($solicitacaoParecere->projeto->tituto_projeto, ['controller' => 'Projetos', 'action' => 'view', $solicitacaoParecere->projeto->id]) : '' ?></p>
                        <h4><b><?= __('Pessoa') ?></b></h4>
                        <p><?= $solicitacaoParecere->has('pessoa') ? $this->Html->link($solicitacaoParecere->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $solicitacaoParecere->pessoa->id]) : '' ?></p>
                    </div>
                    <div class="col-lg-2">
                        <h4><b><?= __('Id') ?></b></h4>
                        <p><?= $this->Number->format($solicitacaoParecere->id) ?></p>

                    </div>
                    <div class="col-lg-2">
                        <h4><b><?= __('Data Solicitacao') ?></b></h4>
                        <p><?= h($solicitacaoParecere->data_solicitacao->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></p>
                        <h4><b><?= __('Data Aceitacao Rejeicao') ?></b></h4>
                        <p><?= $solicitacaoParecere->data_aceitacao_rejeicao == null ? '' : h($solicitacaoParecere->data_aceitacao_rejeicao->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></p>
                        <h4><b><?= __('Data Limite Aceite') ?></b></h4>
                        <p><?= $solicitacaoParecere->data_limite_aceite == null ? '' : h($solicitacaoParecere->data_limite_aceite->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></p>
                        <h4><b><?= __('Data Limite Envio') ?></b></h4>
                        <p><?= $solicitacaoParecere->data_limite_envio == null ? '' : h($solicitacaoParecere->data_limite_envio->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></p>
                    </div>
                    <div class="col-lg-2">
                        <h4><b><?= __('Externo') ?></b></h4>
                        <p><?= $solicitacaoParecere->externo ? __('Sim') : __('Não'); ?></p>
                    </div>
                </div>
                <div class="row texts">
                    <div class="col-lg-9">
                        <h4><b><?= __('Observação da solicitação') ?></b></h4>
                        <?= $this->Text->autoParagraph(h($solicitacaoParecere->observacao_solicitacao)); ?>
                    </div>
                </div>
                <div class="row texts">
                    <div class="col-lg-9">
                        <h4><b><?= __('Observacão,  Aceitacao,  Rejeição') ?></b></h4>
                        <?= $this->Text->autoParagraph(h($solicitacaoParecere->observacao_aceitacao_rejeicao)); ?>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab2info">
                <h4> <b>Colegiado:</b></h4>
                <span></span>
                <p> <?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->colegiado)); ?></p>

                <h4> <b>Resumo:</b></h4>
                <span></span>
                <p><?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->resumo)); ?></p>
                <h4> <b>Referências:</b></h4>
                <span></span>
                <p><?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->referencias)); ?></p>
                <h4> <b>Fundamentação teórica:</b></h4>
                <span></span>
                <p><?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->fundamentacao)); ?></p>
                <h4> <b>Objetivos:</b></h4>
                <span></span>
                <p><?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->objetivos)); ?></p>
                <h4> <b>Metodologia:</b></h4>
                <span></span>
                <p><?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->metodologia)); ?></p>
                <h4> <b>Recursos:</b></h4>
                <span></span>
                <p><?= $this->Text->autoParagraph(h($solicitacaoParecere->projeto->recursos)); ?></p>
            </div>
            <div class="tab-pane fade" id="tab3info">
                <div class="pareceres index large-9 medium-8 columns content">
                    <h3><?= __('Pareceres') ?></h3>
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th>Resposta</th>
                                <th>Data do recebimento</th>
                                <th>Conclusão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pareceres as $parecere): ?>
                                <tr>
                                    <td><?= \App\Model\Entity\Parecere::tpTipoParecer($parecere->tipo_resposta) ?></td>
                                    <td><?= $parecere->data_recebimento ?></td>
                                    <td><?= $parecere->conclusao ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('próximo') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<div>
    <?= $this->Html->link('Voltar', ['action' => 'index-parecerista'], ['class' => 'btn btn-primary']); ?>

</div>
