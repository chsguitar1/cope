  <?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
<nav class="navbar navbar-default">
        <div class="container-fluid container">
           <?= $this->Html->link(__('Novo Cronograma'), ['action' => 'add',$idprojeto], ['class' => 'btn btn-primary']) ?>
        </div>
    </nav>
<div class="cronograma index large-9 medium-8 columns content">
    <h3><?= __('Cronograma') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                             
                <th><?= $this->Paginator->sort('atividade') ?></th>
                <th><?= $this->Paginator->sort('janeiro') ?></th>
                <th><?= $this->Paginator->sort('fevereiro') ?></th>
                <th><?= $this->Paginator->sort('marco',['label'=> 'Março']) ?></th>
                <th><?= $this->Paginator->sort('abril') ?></th>
                <th><?= $this->Paginator->sort('maio') ?></th>
                <th><?= $this->Paginator->sort('junho') ?></th>
                <th><?= $this->Paginator->sort('julho') ?></th>
                <th><?= $this->Paginator->sort('agosto') ?></th>
                <th><?= $this->Paginator->sort('setembro') ?></th>
                <th><?= $this->Paginator->sort('outubro') ?></th>
                <th><?= $this->Paginator->sort('novembro') ?></th>
                <th><?= $this->Paginator->sort('desembro',['label'=> 'Dezembro']) ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cronograma as $cronograma): ?>
            <tr>
                
              
                <td><?= $cronograma->atividade ?></td>
                <td style="align-items: center"><?= $cronograma->janeiro == 1 ? 'X': '' ?></td>
                <td><?= h($cronograma->fevereiro == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->marco == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->abril == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->maio == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->junho == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->julho == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->agosto == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->setembro == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->outubro == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->novembro == 1 ? 'X': '' ) ?></td>
                <td><?= h($cronograma->desembro == 1 ? 'X': '' ) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link('', ['action' => 'edit', $cronograma->idcronograma],['title' => 'Editar', 'class' => 'btn btn-default fa fa-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $cronograma->idcronograma], ['confirm' => __('Deseja excluir o cronograma # {0}?', $cronograma->atividade),
                        'class' => 'btn btn-default fa fa-trash-o', 'title' => 'Deletar']) ?>
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
        <p><?= $this->Html->link('Voltar', ['controller' => 'Projetos','action' => 'redirecionar'], ['class' => 'btn btn-primary']); ?></p>
    </div>
</div>
