<div class="projetos index large-9 medium-8 columns content" style="margin-right: 75px;">
    <h3><?= __('Projetos designados ao usuários para parecer.') ?></h3>

    <?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>


    <?= $this->Html->link(__('Novo Projeto.'), ['action' => 'addRequerente'], ['class' => 'btn btn-default']) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-hover" >
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ano') ?></th>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('data_inicio') ?></th>
                <th><?= $this->Paginator->sort('data_fim') ?></th>
                <th><?= $this->Paginator->sort('grande_area_conhecimento') ?></th>
                <th><?= $this->Paginator->sort('num_protocolo') ?></th>
                <th><?= $this->Paginator->sort('num_sipac') ?></th>
                <th><?= $this->Paginator->sort('rascunho', ['label' => 'Status']) ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetos as $projeto): ?>
                <tr>
                    <td><?= $projeto->id ?></td>
                    <td><?= $projeto->ano ?></td>
                    <td><?= $projeto->tituto_projeto ?></td>
                    <td><?= $projeto->data_inicio->i18nFormat('dd/MM/YYYY') ?></td>
                    <td><?= $projeto->data_fim ?></td>
                    <td><?= $projeto->areasConhecimentoToStr($projeto->grande_area_conhecimento) ?></td>
                    <td><?= h($projeto->num_protocolo) ?></td>
                    <td><?= h($projeto->num_sipac) ?></td>
                    <td><b><?= ($projeto->rascunho) ? '<span style="color: red;"> Rascunho</span>' : 'Protocolado' ?></b></td>
                    <td class="actions">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><?= $this->Html->link(__('Ver'), ['action' => 'view', $projeto->id]) ?></li>
                                <li><?= $this->Html->link(__('Encaminhar Parecer.'), ['controller' => 'pareceres','action' => 'encaminharParecer', $projeto->id]) ?></li>
                                
                            </ul>
                        </div>

                    </td>
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
