<div class="projetos index large-9 medium-8 columns content">
    <h3><?= __('Projetos') ?></h3>
    
    
     <?= $this->Html->link(__('Novo Projeto.'), ['action' => 'addRequerente']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ano') ?></th>
                <th><?= $this->Paginator->sort('data_inicio') ?></th>
                <th><?= $this->Paginator->sort('data_fim') ?></th>
                <th><?= $this->Paginator->sort('grande_area_conhecimento') ?></th>
                <th><?= $this->Paginator->sort('num_protocolo') ?></th>
                <th><?= $this->Paginator->sort('num_sipac') ?></th>
                <th><?= $this->Paginator->sort('Status') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetos as $projeto): ?>
                <tr>
                    <td><?= $projeto->id ?></td>
                    <td><?= $projeto->ano ?></td>
                    <td><?= $projeto->data_inicio->i18nFormat('dd/MM/YYYY') ?></td>
                    <td><?= $projeto->data_fim ?></td>
                    <td><?= $projeto->areasConhecimentoToStr($projeto->grande_area_conhecimento) ?></td>
                    <td><?= h($projeto->num_protocolo) ?></td>
                    <td><?= h($projeto->num_sipac) ?></td>
                    <td><b><?= ($projeto->rascunho) ? '<span style="color: red;"> Rascunho</span>' : 'Protocolado' ?></b></td>
                    <td class="actions">
                        <?= ($projeto->rascunho) ? $this->Html->link(__('Participantes'), ['action' => 'add_participantes', $projeto->id]) : '' ?>
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $projeto->id]) ?>
                        <?= ($projeto->rascunho) ? $this->Html->link(__('Editar'), ['action' => 'edit', $projeto->id]) : '' ?>
                        <?= ($projeto->rascunho) ? $this->Form->postLink(__('Deletar'), ['action' => 'delete', $projeto->id], ['confirm' => __('Tem certeza que deseja remover # {0}?', $projeto->id)]) : '' ?>
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
