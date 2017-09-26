<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parecerista'), ['action' => 'edit', $parecerista->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parecerista'), ['action' => 'delete', $parecerista->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parecerista->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pareceristas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parecerista'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pareceres'), ['controller' => 'Pareceres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parecer'), ['controller' => 'Pareceres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pareceristas'), ['controller' => 'Pareceristas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parecerista'), ['controller' => 'Pareceristas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pareceristas view large-9 medium-8 columns content">
    <h3><?= h($parecerista->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $parecerista->has('pessoa') ? $this->Html->link($parecerista->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $parecerista->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Observacao') ?></th>
            <td><?= h($parecerista->observacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parecerista->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto Id') ?></th>
            <td><?= $this->Number->format($parecerista->projeto_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($parecerista->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Prazo') ?></th>
            <td><?= h($parecerista->prazo) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($parecerista->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($parecerista->modified) ?></tr>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($parecerista->projetos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ano') ?></th>
                <th><?= __('Data Inicio') ?></th>
                <th><?= __('Data Fim') ?></th>
                <th><?= __('Encerrado') ?></th>
                <th><?= __('Grande Area Conhecimento') ?></th>
                <th><?= __('Comite Etica') ?></th>
                <th><?= __('Num Protocolo') ?></th>
                <th><?= __('Num Sipac') ?></th>
                <th><?= __('Situacao Projeto') ?></th>
                <th><?= __('Tipo Projeto') ?></th>
                <th><?= __('Tituto Projeto') ?></th>
                <th><?= __('Descricao Projeto') ?></th>
                <th><?= __('Curso Id') ?></th>
                <th><?= __('Parecerista Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Rascunho') ?></th>
                <th><?= __('Data Protocolo') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Modified By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($parecerista->projetos as $projetos): ?>
            <tr>
                <td><?= h($projetos->id) ?></td>
                <td><?= h($projetos->ano) ?></td>
                <td><?= h($projetos->data_inicio) ?></td>
                <td><?= h($projetos->data_fim) ?></td>
                <td><?= h($projetos->encerrado) ?></td>
                <td><?= h($projetos->grande_area_conhecimento) ?></td>
                <td><?= h($projetos->comite_etica) ?></td>
                <td><?= h($projetos->num_protocolo) ?></td>
                <td><?= h($projetos->num_sipac) ?></td>
                <td><?= h($projetos->situacao_projeto) ?></td>
                <td><?= h($projetos->tipo_projeto) ?></td>
                <td><?= h($projetos->tituto_projeto) ?></td>
                <td><?= h($projetos->descricao_projeto) ?></td>
                <td><?= h($projetos->curso_id) ?></td>
                <td><?= h($projetos->parecerista_id) ?></td>
                <td><?= h($projetos->created) ?></td>
                <td><?= h($projetos->modified) ?></td>
                <td><?= h($projetos->rascunho) ?></td>
                <td><?= h($projetos->data_protocolo) ?></td>
                <td><?= h($projetos->created_by) ?></td>
                <td><?= h($projetos->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projetos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projetos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pareceres') ?></h4>
        <?php if (!empty($parecerista->pareceres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data Recebimento') ?></th>
                <th><?= __('Tipo Parecer') ?></th>
                <th><?= __('Parecerista Id') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($parecerista->pareceres as $pareceres): ?>
            <tr>
                <td><?= h($pareceres->id) ?></td>
                <td><?= h($pareceres->data_recebimento) ?></td>
                <td><?= h($pareceres->tipo_parecer) ?></td>
                <td><?= h($pareceres->parecerista_id) ?></td>
                <td><?= h($pareceres->projeto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pareceres', 'action' => 'view', $pareceres->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pareceres', 'action' => 'edit', $pareceres->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pareceres', 'action' => 'delete', $pareceres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pareceres->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pareceristas') ?></h4>
        <?php if (!empty($parecerista->pareceristas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parecerista Id') ?></th>
                <th><?= __('Projeto Id') ?></th>
                <th><?= __('Prazo') ?></th>
                <th><?= __('Observacao') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($parecerista->pareceristas as $pareceristas): ?>
            <tr>
                <td><?= h($pareceristas->id) ?></td>
                <td><?= h($pareceristas->parecerista_id) ?></td>
                <td><?= h($pareceristas->projeto_id) ?></td>
                <td><?= h($pareceristas->prazo) ?></td>
                <td><?= h($pareceristas->observacao) ?></td>
                <td><?= h($pareceristas->created_by) ?></td>
                <td><?= h($pareceristas->created) ?></td>
                <td><?= h($pareceristas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pareceristas', 'action' => 'view', $pareceristas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pareceristas', 'action' => 'edit', $pareceristas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pareceristas', 'action' => 'delete', $pareceristas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pareceristas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
