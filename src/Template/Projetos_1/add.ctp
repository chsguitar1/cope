<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Projetos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Pareceres'), ['controller' => 'Pareceres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Parecere'), ['controller' => 'Pareceres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Relatorios'), ['controller' => 'Relatorios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Relatorio'), ['controller' => 'Relatorios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Solicitacoes Certificados'), ['controller' => 'SolicitacoesCertificados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Solicitacoes Certificado'), ['controller' => 'SolicitacoesCertificados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projetos form large-9 medium-8 columns content">
    <?= $this->Form->create($projeto) ?>
    <fieldset>
	
	
	
	
 <!-- <legend><?= __('Add Projeto') ?></legend> -->
	<legend><?= __('Adicionar Projeto') ?></legend>
        <?php
            echo $this->Form->input('ano');
            echo $this->Form->input('data_inicio');
            echo $this->Form->input('data_fim', ['empty' => true, 'default' => '']);
            echo $this->Form->input('encerrado', ['type' => 'checkbox']);
            echo $this->Form->input('grande_area_conhecimento');
            echo $this->Form->input('comite_etica');
            echo $this->Form->input('num_protocolo');
            echo $this->Form->input('num_sipac');
            echo $this->Form->input('situacao_projeto');
            echo $this->Form->input('tipo_projeto');
            echo $this->Form->input('tituto_projeto');
            echo $this->Form->input('descricao_projeto');
            echo $this->Form->input('curso_id', ['options' => $cursos, 'empty' => true]);
            echo $this->Form->input('parecerista_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('rascunho');
            echo $this->Form->input('data_protocolo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
