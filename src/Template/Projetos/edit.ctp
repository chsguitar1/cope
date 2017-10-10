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
            $("#myTooltips a").tooltip({
                title: 'It works in absence of title attribute.'
            });
        });
    </script>
    <div class="panel with-nav-tabs panel-info">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1info" data-toggle="tab">Informações</a></li>
                <li><a href="#tab2info" data-toggle="tab">Formulário</a></li>
                <li><a href="#tab3info" data-toggle="tab">Cronograma</a></li>


            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1info">
                    <?= $this->Form->create($projeto) ?>
                    <fieldset>
                        <legend><?= __('Informações do Projeto') ?></legend>
                        <?php
                        echo $this->Form->input('ano', ['style' => 'width: 130px;', 'label' => 'Ano']);
                        echo $this->Form->input('tipo_projeto', ['options' => array(0 => 'Pesquisa', 1 => 'Extensão'), 'label' => 'Tipo Projeto.', 'style' => 'width: 150px;']);
                        echo $this->Form->input('tituto_projeto');

                        echo $this->Form->input('data_inicio', ['type' => 'text', 'class' => 'data_bp', 'style' => 'width: 150px;']);
                        echo $this->Form->input('data_fim', ['type' => 'text', 'empty' => true, 'default' => '', 'id' => 'data_fim', 'class' => 'data_bp', 'style' => 'width: 150px;']);

                        echo $this->Form->input('cod_areas_conhecimentos', ['options' => $areas]);
                        echo $this->Form->input('comite_etica', ['label' => 'Necessita Comitê de Ética?', 'type' => 'checkbox', 'empty' => true]);
                        echo $this->Form->input('descricao_projeto');
                        echo $this->Form->input('curso_id', ['options' => $cursos, 'empty' => true, 'style' => 'width: 200px;']);
                        ?>
                    </fieldset>
                </div>
                <div class="tab-pane fade" id="tab2info">
                    <?= $this->Form->create($projeto) ?>
                    <fieldset>

                        <legend><?= __('Documentação do projeto ') ?></legend>
                        <?php
                        echo $this->Form->input('colegiado', ['label' => 'Colegiado a qual está vinculado',
                            'placeholder' => \App\Model\Entity\Projeto::COLE_PL]);
                        echo $this->Form->input('parcerias_ext', ['label' => 'Parcerias externas', 'placeholder' => \App\Model\Entity\Projeto::PAR_PL]);
                        echo $this->Form->input('primeira', ['label' => 'Esta é a primeira vez que o projeto será apreciado pelo COPE?', 'type' => 'checkbox', 'empty' => true]);
                        echo $this->Form->input('resumo', ['label' => 'Resumo do projeto.', 'placeholder' => \App\Model\Entity\Projeto::RES_PL]);
                        echo $this->Form->input('palavras_chave', ['type' => 'text', 'label' => 'Palavras-chaves', 'placeholder' => \App\Model\Entity\Projeto::PAL_PL]);
                        echo $this->Form->input('fundamentacao', ['label' => 'Fundamentação da proposta', 'placeholder' => \App\Model\Entity\Projeto::FUN_PL]);
                        echo $this->Form->input('objetivos', ['label' => 'Objetivos', 'placeholder' => \App\Model\Entity\Projeto::OBJ_PL]);
                        echo $this->Form->input('metodologia', ['label' => 'Metodologia', 'placeholder' => \App\Model\Entity\Projeto::MTD_PL]);
                        echo $this->Form->input('recursos', ['label' => 'Recursos (materiais e financeiros)', 'placeholder' => \App\Model\Entity\Projeto::REC_PL]);
                        echo $this->Form->input('referencias', ['label' => 'Referências bibliográficas', 'placeholder' => \App\Model\Entity\Projeto::REF_PL]);
                        ?>
                    </fieldset>   
                </div>
                <div class="tab-pane fade" id="tab3info">


                    <div class="panel panel-default">
                        <div class="panel-body">
                            <fieldset>
                                <legend><?= __('Detalhes do Cronograma Projeto.') ?></legend>

                              


                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>Avitidade</th>
                                            <th>Janeiro</th>
                                            <th>Fevereiro</th>
                                            <th>Março</th>
                                            <th>Abril</th>
                                            <th>Maio</th>
                                            <th>Junho</th>
                                            <th>Julho</th>
                                            <th>Agosto</th>
                                            <th>Setembro</th>
                                            <th>Outubro</th>
                                            <th>Novembro</th>
                                            <th>Dezembro</th>

                                           
                                        </tr>
                                    </thead>

                                    <?php foreach ($cronograma as $an): ?>
                                        <tr>

                                            <td><?= h($an->atividade) ?></td>
                                            <td><?= h($an->janeiro == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->fevereiro == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->marco == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->abril == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->maio == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->junho == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->julho == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->agosto == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->setembro == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->outubro == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->novembro == 1 ? 'X' : '' ) ?></td>
                                            <td><?= h($an->desembro == 1 ? 'X' : '' ) ?></td>

                                            <td><td>
                                        </tr>

                                    <?php endforeach; ?>
                                </table>
                            </fieldset>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <div>
        <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn btn-success']) ?>
        <?= $this->Form->end() ?>
        <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
    </div>
