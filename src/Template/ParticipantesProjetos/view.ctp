<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Participantes Projeto'), ['action' => 'edit', $participantesProjeto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Participantes Projeto'), ['action' => 'delete', $participantesProjeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participantesProjeto->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Participantes Projetos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Participantes Projeto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="participantesProjetos view large-9 medium-8 columns content">
    <h3><?= h($participantesProjeto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Bolsa') ?></th>
            <td><?= h($participantesProjeto->bolsa) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $participantesProjeto->has('pessoa') ? $this->Html->link($participantesProjeto->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $participantesProjeto->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Projeto') ?></th>
            <td><?= $participantesProjeto->has('projeto') ? $this->Html->link($participantesProjeto->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $participantesProjeto->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($participantesProjeto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Carga Horaria') ?></th>
            <td><?= $this->Number->format($participantesProjeto->carga_horaria) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Participante') ?></th>
            <td><?= $this->Number->format($participantesProjeto->tipo_participante) ?></td>
        </tr>
        <tr>
            <th><?= __('Bolsista') ?></th>
            <td><?= $this->Number->format($participantesProjeto->bolsista) ?></td>
        </tr>
        <tr>
            <th><?= __('Vinculo Projeto') ?></th>
            <td><?= $this->Number->format($participantesProjeto->vinculo_projeto) ?></td>
        </tr>
        <tr>
            <th><?= __('Recebe Certificado') ?></th>
            <td><?= $this->Number->format($participantesProjeto->recebe_certificado) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Entrada') ?></th>
            <td><?= h($participantesProjeto->data_entrada) ?></tr>
        </tr>
        <tr>
            <th><?= __('Data Saida') ?></th>
            <td><?= h($participantesProjeto->data_saida) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($participantesProjeto->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($participantesProjeto->modified) ?></tr>
        </tr>
    </table>
</div>
