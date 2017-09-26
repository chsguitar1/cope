<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
//$this->start('tb_actions');
?>

<h2>Pareceres:</h2>
<div class="response">
    <table class="table table-bordered" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id'); ?></th>
                <th><?= $this->Paginator->sort('tituto_projeto'); ?></th>
                <th><?= $this->Paginator->sort('id_pessoa'); ?></th>
                <th><?= $this->Paginator->sort('data_solicitacao',['label' =>'Solicitação']); ?></th>
                <th><?= $this->Paginator->sort('data_aceitacao_rejeicao',['label' =>'Data Sitação/Rejeição']); ?></th>
                <th><?= $this->Paginator->sort('sitacao',['label' =>'Sitação']); ?></th>
                <th><?= $this->Paginator->sort('externo'); ?></th>
                <th class="actions"><?= __('Ações'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitacaoPareceres as $solicitacaoParecere): ?>
                <tr>
                    <td><?= $this->Number->format($solicitacaoParecere->id) ?></td>
                    <td>
                        <?= $solicitacaoParecere->projeto->tituto_projeto ?>
                    </td>
                    <td>
                        <?= $solicitacaoParecere->pessoa->nome ?>
                    </td>
                    <td><?= h($solicitacaoParecere->data_solicitacao->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) ?></td>
                    <td><?= $solicitacaoParecere->data_aceitacao_rejeicao != null ? h($solicitacaoParecere->data_aceitacao_rejeicao->i18nFormat('dd/MM/YYYY hh:mm', 'America/Sao_Paulo')) : '' ?></td>
                    <td><?= \App\Model\Entity\SolicitacaoParecer::tpSitSolicitacao($solicitacaoParecere->situacao) ?></td>
                    <td><?= ($solicitacaoParecere->externo == 0) ? 'Não' : 'Sim' ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $solicitacaoParecere->id], ['title' => __('Ver'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $solicitacaoParecere->id], ['title' => __('Editar Solicitação'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $solicitacaoParecere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitacaoParecere->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('próximo') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>