<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $participantesProjeto->id],
                ['confirm' => __('Tem certeza que deseja remover # {0}?', $participantesProjeto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Participantes Projetos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participantesProjetos form large-9 medium-8 columns content">
    <?= $this->Form->create($participantesProjeto) ?>
    <fieldset>
	
	
	
	
 <!-- <legend><?= __('Edit Participantes Projeto') ?></legend> -->
	<legend><?= __('Editar Participantes Projeto') ?></legend>
        <?php
            echo $this->Form->input('carga_horaria');
            echo $this->Form->input('tipo_participante');
            echo $this->Form->input('bolsista');
            echo $this->Form->input('bolsa');
            echo $this->Form->input('data_entrada');
            echo $this->Form->input('data_saida', ['empty' => true, 'default' => '']);
            echo $this->Form->input('vinculo_projeto');
            echo $this->Form->input('recebe_certificado');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->input('projeto_id', ['options' => $projetos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
