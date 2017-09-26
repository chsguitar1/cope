<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="pareceres view large-9 medium-8 columns content">
    <h3><?= h($parecere->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parecere->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Solicitacao Parecer') ?></th>
            <td><?= $this->Number->format($parecere->id_solicitacao_parecer) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Resposta') ?></th>
            <td><?= $this->Number->format($parecere->tipo_resposta) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Recebimento') ?></th>
            <td><?= h($parecere->data_recebimento) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($parecere->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($parecere->modified) ?></tr>
        </tr>
        <tr>
            <th><?= __('Identificacao') ?></th>
            <td><?= $parecere->identificacao ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Comite') ?></th>
            <td><?= $parecere->comite ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Colegiado') ?></th>
            <td><?= $parecere->colegiado ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Parceria') ?></th>
            <td><?= $parecere->parceria ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Integrantes') ?></th>
            <td><?= $parecere->integrantes ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Caracterizacao') ?></th>
            <td><?= $parecere->caracterizacao ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Relevante') ?></th>
            <td><?= $parecere->relevante ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Teorica') ?></th>
            <td><?= $parecere->teorica ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Objetivos') ?></th>
            <td><?= $parecere->objetivos ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Propostos') ?></th>
            <td><?= $parecere->propostos ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Materiais Finan') ?></th>
            <td><?= $parecere->materiais_finan ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Crono') ?></th>
            <td><?= $parecere->crono ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Discentes') ?></th>
            <td><?= $parecere->discentes ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Horaria') ?></th>
            <td><?= $parecere->horaria ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Referencias') ?></th>
            <td><?= $parecere->referencias ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Arquivo') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->arquivo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Nome Arquivo') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->nome_arquivo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Idt Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->idt_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comite Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->comite_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Colegiado Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->colegiado_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Parceria Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->parceria_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Integrantes Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->integrantes_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Caracterizacao Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->caracterizacao_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Relevante Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->relevante_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Teorica Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->teorica_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Objetivos Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->objetivos_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Propostos Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->propostos_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Materiais Fin Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->materiais_fin_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Cronograma Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->cronograma_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Discentes Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->discentes_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Horaria Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->horaria_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Referencias Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->referencias_obs)); ?>
    </div>
    <div class="row">
        <h4><?= __('Conclusao') ?></h4>
        <?= $this->Text->autoParagraph(h($parecere->conclusao)); ?>
    </div>
</div>
