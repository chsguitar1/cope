<div class="projetos index large-9 medium-8 columns content" style="margin-right: 75px;">
    <div>
      
        <h1 class="text-center">Painel do Parecerista </h1>
    </div>


    <h3><?= __('Projetos designados ao usuário para parecer pendentes de aceitação.') ?></h3>

    <?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>


    <table cellpadding="0" cellspacing="0" class="table table-striped table-hover" >
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('id Proj.') ?></th>
                <th><?= $this->Paginator->sort('Data Sol.') ?></th>
                <th><?= $this->Paginator->sort('Data Limite Aceite.') ?></th>
                <th><?= $this->Paginator->sort('ano') ?></th>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitacoes as $s): ?>

            <?php //  die(print_r($s));  ?>
            <tr>
                <td><?= $s->id ?></td>
                <td><?= $s->projeto->id ?></td>
                <td><?= $s->data_solicitacao->i18nFormat('dd/MM/YYYY HH:mm','America/Sao_Paulo') ?></td>
                <td><?=  $s->data_limite_aceite == null ? '' :  $s->data_limite_aceite->i18nFormat('dd/MM/YYYY') ?></td>
                <td><?= $s->projeto->ano ?></td>
                <td><?= $s->projeto->tituto_projeto ?></td>
                <td class="actions">


                <td class="actions">
                            <?= $this->Html->link('', ['action' => 'view', $s->id], ['title' => __('Ver'), 'class' => 'btn btn-default fa fa-eye']) ?>
                            <?= $this->Html->link('', ['action' => 'aceitar', $s->id], ['title' => __('Emitir parecer'), 'class' => 'btn glyphicon glyphicon-download']) ?>
                          
                </td>


                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h3><?= __('Projeto para emissão de parecer.') ?></h3>
     <?php if (!empty($solicitacoes_pendentes)): ?>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-hover" >
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('id Proj.') ?></th>
                <th><?= $this->Paginator->sort('Data Sol.') ?></th>
                <th><?= $this->Paginator->sort('Data Aceite.') ?></th>
                <th><?= $this->Paginator->sort('Data Limite.') ?></th>
                <th><?= $this->Paginator->sort('ano') ?></th>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitacoes_pendentes as $s): ?>

            <?php //  die(print_r($s));  ?>
            <tr>
                <td><?= $s->id ?></td>
                <td><?= $s->projeto->id ?></td>
                <td><?= $s->data_solicitacao->i18nFormat('dd/MM/YYYY') ?></td>
                <td><?=  $s->data_aceitacao_rejeicao == null ? '' :  $s->data_aceitacao_rejeicao->i18nFormat('dd/MM/YYYY') ?></td>
                <td><?=  $s->data_limite_envio == null ? '' :  $s->data_limite_envio->i18nFormat('dd/MM/YYYY') ?></td>
                <td><?= $s->projeto->ano ?></td>
                <td><?= $s->projeto->tituto_projeto ?></td>
                <td class="actions">


                <td class="actions">
                            <?= $this->Html->link('', ['action' => 'view', $s->id], ['title' => __('Ver'), 'class' => 'btn btn-default fa fa-eye']) ?>
                            <?= $this->Html->link('', ['controller' => 'pareceres' , 'action' => 'encaminharParecer', $s->id], ['title' => __('Enviar Parecer'), 'class' => 'btn btn-default fa  fa-arrow-right']) ?>
                </td>


                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
      <?php endif; ?>
</div>
