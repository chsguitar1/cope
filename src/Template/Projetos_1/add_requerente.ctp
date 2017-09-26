<div class="projetos form large-9 medium-8 columns content">
    <?= $this->Form->create($projeto) ?>
    <fieldset>
	
	
	
	
 <!-- <legend><?= __('Add Projeto') ?></legend> -->
	<legend><?= __('Adicionar Projeto') ?></legend>
        <?php
            echo $this->Form->input('ano',['style' => 'width: 130px;']);
            echo $this->Form->input('tipo_projeto', ['options' => array(0 => 'Pesquisa', 1 => 'Extensão'), 'label' => 'Tipo Projeto.' ]);
            echo $this->Form->input('tituto_projeto');
           
            echo $this->Form->input('data_inicio');
		   echo $this->Form->input('data_fim', ['empty' => true, 'default' => '']);
            
            echo $this->Form->input('grande_area_conhecimento', ['options' => array( 0 => 'Exatas e da Terra', 1 => 'Engenharias', 2 => 'Saúde', 3 => 'Agrárias', 4 => 'Sociais Aplicadas', 5 => 'Humanas', 6 => 'Linguística, Letras e Artes', 7 => 'Outros')] );
            echo $this->Form->input('comite_etica',['label' => 'Necessita Comitê de Ética?','type' => 'checkbox', 'empty' => true]);
            echo $this->Form->input('descricao_projeto');
            echo $this->Form->input('curso_id', ['options' => $cursos, 'empty' => true]);
            
	    
        ?>
    </fieldset>
    <?= $this->Form->button(__('Avançar')) ?>
    <?= $this->Form->end() ?>
</div>
