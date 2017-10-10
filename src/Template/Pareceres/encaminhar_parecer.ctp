<h3></h3>

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<h4>
    <?= 'Projeto/Proposta: ' . $solicitacaoParecer->projeto->tituto_projeto  ?>
</h4>
<div class="pareceristas form large-9 medium-8 columns content horizontal-form">
  <?= $this->Form->create($parecer, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Enviar parecer') ?></legend>
        <?php
           // echo $this->Form->input('id_solicitacao_parecer');
              echo $this->Form->input('tipo_resposta', ['options' => $parecer->tiposRespostasPareceres()]);
            echo $this->Form->input('data_recebimento');
//             echo $this->Form->input('arquivo', ['type' => 'file','label'=>'Deseja anexar um arquivo?']);
          
            echo $this->Form->input('identificacao',['label'=> 'A identificação das áreas do conhecimento (grande área, área e subárea) são condizentes com a proposta do projeto?']);
            echo $this->Form->input('idt_obs',['label'=> '','placeholder'=>'Observações:']);
           
            echo $this->Form->input('comite',['label' => 'O projeto necessita passar por um Comitê de Ética, segundo sua avaliação e de acordo com a legislação vigente?']);
            echo $this->Form->input('comite_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('colegiado',['label'=>'O projeto apresenta o documento que comprove sua apresentação ao colegiado?']);
            echo $this->Form->input('colegiado_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('parceria',['label'=>'O projeto apresenta documentos que comprovem a parceria com instituições externas?']);
            echo $this->Form->input('parceria_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('integrantes',['label'=>'A formação da equipe de trabalho é condizente com a proposta do projeto?']);
            echo $this->Form->input('integrantes_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('caracterizacao',['label'=>'A fundamentação teórica justifica e contextualiza a proposta?']);
            echo $this->Form->input('caracterizacao_obs',['label'=> '','placeholder'=>'Observações: (Observar se é destacada a relevância para a instituição/comunidade). ']);
            
            echo $this->Form->input('relevante',['label'=>'Há base teórica suficiente para a proposta (revisão bibliográfica, presentes no item fundamentação teórica)?']);
            echo $this->Form->input('relevante_obs',['label'=> '','placeholder'=>'Observações: (Neste item é importante destacar os casos em que ocorrerem plágios). ']);
          //
          //    echo $this->Form->input('teorica');
          //  echo $this->Form->input('teorica_obs');
            echo $this->Form->input('objetivos',['label'=>'Os objetivos são alcançáveis?']);
            echo $this->Form->input('objetivos_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('propostos',['label' =>'A metodologia está condizente com os objetivos propostos?']);
            echo $this->Form->input('propostos_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('materiais_finan',['label'=>'Os recursos materiais e financeiros permitem a execução do projeto?']);
            echo $this->Form->input('materiais_fin_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('crono',['label'=>'O cronograma é realista e condizente com a proposta?']);
            echo $this->Form->input('cronograma_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('discentes',['label'=>'A participação do(s) discente(s) no projeto contribuirá para a formação do mesmo? ']);
            echo $this->Form->input('discentes_obs',['label'=> '','placeholder'=>'Observações: (Considerar se as atividades a serem executadas são compatíveis com o nível de escolaridade proposto). ']);
            
            echo $this->Form->input('horaria',['label'=>'A carga horária dos participantes é condizente com a proposta?']);
            echo $this->Form->input('horaria_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('referencias',['label'=>'A proposta apresenta as referências bibliográficas?']);
            echo $this->Form->input('referencias_obs',['label'=> '','placeholder'=>'Observações:']);
            
            echo $this->Form->input('conclusao',['label'=>'Conclusão do parecerista','placeholder'=>'Observações: Comentários adicionais do parecerista:']);
        ?>
    </fieldset>
    <div>
    <?= $this->Form->button(__('Enviar'), ['name' => 'submit', 'value' => 'adicionar', 'type' => 'submit', 'class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
       <?= $this->Html->link('Voltar', ['controller' => 'Projetos', 'action' => 'redirecionar'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
