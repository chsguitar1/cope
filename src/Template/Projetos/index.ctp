<div >
    <h3><?= __('Meus Projetos') ?></h3>

    <?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
    
    <nav >
        <div class="container-fluid container">
           <?= $this->Html->link(__('Novo Projeto'), ['action' => 'addRequerente'], ['class' => 'btn btn-primary']) ?>
        </div>
    </nav>
    <div class="table-responsive">

        <table cellpadding="0" cellspacing="0" class="table table-bordered">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ano') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('data_inicio') ?></th>
                    <th><?= $this->Paginator->sort('data_fim',['label'=> 'Data final']) ?></th>
                    <th><?= $this->Paginator->sort('cod_areas_conhecimentos',['label'=>'Áreas do Conhecimento']) ?></th>
                    <th><?= $this->Paginator->sort('setor_atual') ?></th>
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
                    <td><?= $projeto->data_inicio != null ? $projeto->data_inicio->i18nFormat('dd/MM/YYYY') : '' ?></td>
                    <td><?= $projeto->data_fim == null ? '' : $projeto->data_fim->i18nFormat('dd/MM/YYYY') ?></td>
                    <td><?= $projeto->areas_conhecimento->descricao ?></td>
                    <td><?= $projeto->setore->descricao ?></td>
                    <td><?= h($projeto->num_protocolo) ?></td>
                    <td><?= h($projeto->num_sipac) ?></td>
                    <td><b><?= ($projeto->rascunho) ? '<span style="color: red;"> Rascunho</span>' : 'Protocolado' ?></b></td>
                    <td class="actions">
                        <?= ($projeto->rascunho) ? $this->Html->link(__(''), ['action' => 'add_participantes',
                            $projeto->id], ['title' => 'Participantes', 'class' => 'btn btn-default fa fa-users']) : '' ?>
                        <?= ($projeto->rascunho) ? $this->Html->link(__(''), ['controller'=> 'Cronograma','action' => 'indexprojeto',
                            $projeto->id], ['title' => 'Cronograma', 'class' => 'btn btn-default glyphicon glyphicon-calendar']) : '' ?>
                        <?= ($projeto->rascunho) ? $this->Html->link(__(''), ['action' => 'edit', $projeto->id], 
                                ['title' => 'Editar', 'class' => 'btn btn-default fa fa-pencil']) : '' ?>
                        <?= ($projeto->rascunho) ? $this->Form->postLink(__(''), ['action' => 'delete', $projeto->id], 
                                ['confirm' => __('Tem certeza que deseja remover o projeto?',
                                $projeto->id), 'class' => 'btn btn-default fa fa-trash-o', 'title' => 'Deletar']) : '' ?>
                        
                        <?= (!$projeto->rascunho) ? $this->Html->link(__(''), ['action' => 'view', $projeto->id], 
                                ['title' => 'Ver', 'class' => 'btn btn-default fa fa-eye']) : '' ?>
                       
                        <?= 
 
                (!$projeto->rascunho && !$projeto->tem_rel_final  ) ? $this->Html->link(__(''), ['controller' => 'RelatorioFinal', 'action' => 'add', $projeto->id],
                                ['title' => 'Relatório', 'class' => 'btn btn-default glyphicon glyphicon-list-alt']) : '' ?>
                         <?= (!$projeto->rascunho) ? $this->Html->link(__(''), ['controller' => 'Certificado', 'action' => 'index', $projeto->id], 
                                ['title' => 'Certificados', 'class' => 'btn btn-default glyphicon glyphicon-education']) : '' ?>
                       
                        <?= (!$projeto->rascunho) ?  $this->Html->link(' ', ['controller' => 'Acompanhamentos', 'action' => 'index', $projeto->id],
                                ['title' => 'Declaração', 'class' => 'btn btn-default glyphicon glyphicon-edit']) : ' ' ?>
                         <?= (!$projeto->rascunho) ?  $this->Html->link(' ', ['controller' => 'Acompanhamentos', 'action' => 'index', $projeto->id],
                                ['title' => 'Acompanhamentos', 'class' => 'btn btn-default fa fa-comment']) : ' ' ?>
                        <?= ($projeto->rascunho) ? $this->Html->link(__(''), ['action' => 'pre_protocolo', $projeto->id],
                                [ 'title' => 'Protocolar', 'class' => 'btn btn-default fa  fa-check']) : '' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
