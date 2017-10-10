<div class="projetos form large-9 medium-8 columns content">

    <?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
    <?= $this->Form->create($projeto) ?>
    <?= $this->Html->script("jquery/jquery") ?>
    <?= $this->Html->script("bootstrap-datepicker.min") ?>
    <?= $this->Html->css("bootstrap-datepicker3.standalone.min") ?>
    <fieldset>

        <script>
            $(document).ready(function () {
                $('.data_bp').datepicker({
                    format: "dd/mm/yyyy",
                    language: "pt-BR",
                    autoclose: true
                });


                $('#div_extensao').hide();

                $('#cb_tipo').change(function () {
                    $('#div_extensao').hide();
                    //alert($( "#cb_tipo option:selected" ).text());

                    sel = $("#cb_tipo option:selected").text();
                    //alert(sel);
                    if (sel == 'Extensão') {

                        $('#div_extensao').show();
                    } else {
                        $('#div_extensao').hide();
                    }
                })
            });
        </script>



        <legend><?= __('Cadastrar novo projeto - Dados básicos.') ?></legend>
        <?php
        
        echo $this->Form->input('ano', ['style' => 'width: 130px;', 'label' => 'Ano']);
        echo $this->Form->input('tipo_projeto', ['options' => array(0 => 'Pesquisa', 1 => 'Extensão', 2 => 'Inovação', 3 => 'Eventos'), 'label' => 'Tipo Projeto.', 'style' => 'width: 150px;', 'id' => 'cb_tipo']);
        echo $this->Form->input('tituto_projeto');


        echo $this->Form->input('data_inicio',['label'=> 'Data do Início' ,'type' => 'text', 'class' => 'data_bp', 'style' => 'width: 150px;']);
        echo $this->Form->input('data_fim', ['type' => 'text', 'empty' => true, 'default' => '', 'id' => 'data_fim', 'class' => 'data_bp', 'style' => 'width: 150px;']);
        echo '<div id=div_extensao>';
        echo $this->Form->input('id_area_tematica',['label'=> 'Área Temática ','options' => $areas_tematicas, 'empty' => '(Selecione uma area)']);        
        echo $this->Form->input('id_linha_extensao',['label'=> 'Linha de extensão ','options' => $linhas_extensao,  'empty' => '(Selecione uma extensão)']);        
        echo '</div>';
        echo $this->Form->input('cod_areas_conhecimentos',['label'=> 'Áreas do Conhecimento' ,'options' => $areas]);        
        echo $this->Form->input('comite_etica', ['label' => 'Necessita Comitê de Ética?', 'type' => 'checkbox', 'empty' => true]);
        echo $this->Form->input('descricao_projeto',['label'=> 'Descrição do projeto' ]);
        echo $this->Form->input('curso_id', ['options' => $cursos, 'empty' => true, 'style' => 'width: 200px;']);
        ?>
    </fieldset>
    <?= $this->Form->button('Avançar   ' . $this->Html->icon('arrow-right', ['iconSet' => 'fa',]),['class' => 'btn btn-primary'], ['scape' => false]) ?>
    <?= $this->Form->end() ?>
   
</div>
