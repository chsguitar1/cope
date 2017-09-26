<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Projeto'), ['action' => 'edit', $projeto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Projeto'), ['action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Projetos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Projeto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Pareceres'), ['controller' => 'Pareceres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Parecer'), ['controller' => 'Pareceres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Relatorios'), ['controller' => 'Relatorios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Relatorio'), ['controller' => 'Relatorios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Solicitacoes Certificados'), ['controller' => 'SolicitacoesCertificados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Solicitacoes Certificado'), ['controller' => 'SolicitacoesCertificados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projetos view large-9 medium-8 columns content">
    <h3><?= h($projeto->id) ?></h3>
    <table class="vertical-table">
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
            <td><?= $projeto->has('curso') ? $this->Html->link($projeto->curso->id, ['controller' => 'Cursos', 'action' => 'view', $projeto->curso->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $projeto->has('pessoa') ? $this->Html->link($projeto->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $projeto->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($projeto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ano') ?></th>
            <td><?= $this->Number->format($projeto->ano) ?></td>
        </tr>
        <tr>
            <th><?= __('Grande Area Conhecimento') ?></th>
            <td><?= $this->Number->format($projeto->grande_area_conhecimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Situacao Projeto') ?></th>
            <td><?= $this->Number->format($projeto->situacao_projeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Projeto') ?></th>
            <td><?= $this->Number->format($projeto->tipo_projeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Inicio') ?></th>
            <td><?= h($projeto->data_inicio) ?></tr>
        </tr>
        <tr>
            <th><?= __('Data Fim') ?></th>
            <td><?= h($projeto->data_fim) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($projeto->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($projeto->modified) ?></tr>
        </tr>
        <tr>
            <th><?= __('Data Protocolo') ?></th>
            <td><?= h($projeto->data_protocolo) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Encerrado') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->encerrado)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comite Etica') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->comite_etica)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descricao Projeto') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->descricao_projeto)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rascunho') ?></h4>
        <?= $this->Text->autoParagraph(h($projeto->rascunho)); ?>
    </div>
    <div class="related">
        <h4><?= __('Pareceres Relacionados(as)') ?></h4>
        <?php if (!empty($projeto->pareceres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data Recebimento') ?></th>
                <th><?= __('Tipo Parecer') ?></th>
                <th><?= __('Parecerista Id') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($projeto->pareceres as $pareceres): ?>
            <tr>
                <td><?= h($pareceres->id) ?></td>
                <td><?= h($pareceres->data_recebimento) ?></td>
                <td><?= h($pareceres->tipo_parecer) ?></td>
                <td><?= h($pareceres->parecerista_id) ?></td>
                <td><?= h($pareceres->projeto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Pareceres', 'action' => 'view', $pareceres->id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'Pareceres', 'action' => 'edit', $pareceres->id]) ?>

                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Pareceres', 'action' => 'delete', $pareceres->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $pareceres->id)]) ?>

                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Relatorios Relacionados(as)') ?></h4>
        <?php if (!empty($projeto->relatorios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data Relatorio') ?></th>
                <th><?= __('Data Protocolo') ?></th>
                <th><?= __('Tipo Relatorio') ?></th>
                <th><?= __('Atividades Realizadas') ?></th>
                <th><?= __('Bibliografia') ?></th>
                <th><?= __('Consideracoes Finais') ?></th>
                <th><?= __('Discussao') ?></th>
                <th><?= __('Metodologia Utilizada') ?></th>
                <th><?= __('Producoes Ligadas') ?></th>
                <th><?= __('Resultados Obtidos') ?></th>
                <th><?= __('Resumo Projeto') ?></th>
                <th><?= __('Situacao Atual') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($projeto->relatorios as $relatorios): ?>
            <tr>
                <td><?= h($relatorios->id) ?></td>
                <td><?= h($relatorios->data_relatorio) ?></td>
                <td><?= h($relatorios->data_protocolo) ?></td>
                <td><?= h($relatorios->tipo_relatorio) ?></td>
                <td><?= h($relatorios->atividades_realizadas) ?></td>
                <td><?= h($relatorios->bibliografia) ?></td>
                <td><?= h($relatorios->consideracoes_finais) ?></td>
                <td><?= h($relatorios->discussao) ?></td>
                <td><?= h($relatorios->metodologia_utilizada) ?></td>
                <td><?= h($relatorios->producoes_ligadas) ?></td>
                <td><?= h($relatorios->resultados_obtidos) ?></td>
                <td><?= h($relatorios->resumo_projeto) ?></td>
                <td><?= h($relatorios->situacao_atual) ?></td>
                <td><?= h($relatorios->projeto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Relatorios', 'action' => 'view', $relatorios->id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'Relatorios', 'action' => 'edit', $relatorios->id]) ?>

                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Relatorios', 'action' => 'delete', $relatorios->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $relatorios->id)]) ?>

                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Solicitacoes Certificados Relacionados(as)') ?></h4>
        <?php if (!empty($projeto->solicitacoes_certificados)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data Solicitacao') ?></th>
                <th><?= __('Data Inicial') ?></th>
                <th><?= __('Data Final') ?></th>
                <th><?= __('Hora Aut Cope') ?></th>
                <th><?= __('Hora Aut Ce') ?></th>
                <th><?= __('Hora Aut Secretaria') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Autenticador Cope') ?></th>
                <th><?= __('Autenticador Ce') ?></th>
                <th><?= __('Autenticador Sec') ?></th>
                <th><?= __('Solicitante Id') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($projeto->solicitacoes_certificados as $solicitacoesCertificados): ?>
            <tr>
                <td><?= h($solicitacoesCertificados->id) ?></td>
                <td><?= h($solicitacoesCertificados->data_solicitacao) ?></td>
                <td><?= h($solicitacoesCertificados->data_inicial) ?></td>
                <td><?= h($solicitacoesCertificados->data_final) ?></td>
                <td><?= h($solicitacoesCertificados->hora_aut_cope) ?></td>
                <td><?= h($solicitacoesCertificados->hora_aut_ce) ?></td>
                <td><?= h($solicitacoesCertificados->hora_aut_secretaria) ?></td>
                <td><?= h($solicitacoesCertificados->projeto_id) ?></td>
                <td><?= h($solicitacoesCertificados->autenticador_cope) ?></td>
                <td><?= h($solicitacoesCertificados->autenticador_ce) ?></td>
                <td><?= h($solicitacoesCertificados->autenticador_sec) ?></td>
                <td><?= h($solicitacoesCertificados->solicitante_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'SolicitacoesCertificados', 'action' => 'view', $solicitacoesCertificados->id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'SolicitacoesCertificados', 'action' => 'edit', $solicitacoesCertificados->id]) ?>

                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'SolicitacoesCertificados', 'action' => 'delete', $solicitacoesCertificados->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $solicitacoesCertificados->id)]) ?>

                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
