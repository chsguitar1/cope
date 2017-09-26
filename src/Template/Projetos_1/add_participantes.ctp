<div class="projetos form large-9 medium-8 columns content">
    <?= $this->Form->create($projeto) ?>
    <fieldset>




        <legend><?= __('Detalhes do Projeto.') ?></legend>


        <span style="font-weight: bold;"> Título do Projeto: </span><?= $projeto->tituto_projeto; ?>

        <legend><?= __('Participantes:') ?></legend>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>CH</th>
                    <th>Dt. Entrada</th>
                </tr>
            </thead>

            <?php foreach ($projeto->participantes_projetos as $an): ?>
                <tr>

                    <td><?= h($an->id) ?></td>
                    <td><?= h($an->pessoa->nome) ?></td>
                    <td><?= h($an->tipoParticipanteToStr($an->tipo_participante)) ?></td>
                    <td><?= h($an->carga_horaria) . 'h' ?></td>

                    <td><?= h($an->data_entrada->i18nFormat('dd/MM/YYYY')) ?></td>

                </tr>

            <?php endforeach; ?>
        </table>
    </fieldset>

    <?= $this->Form->create($participante) ?>
    <fieldset>




<!-- <legend><?= __('Add Participantes Projeto') ?></legend> -->
        <legend><?= __('Adicionar Participantes Projeto') ?></legend>
        <?php
        $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']);
        echo $this->Form->input('pessoa_id', ['options' => $pessoas]);
        echo $this->Form->input('carga_horaria');
        echo $this->Form->input('tipo_participante', ['options' => array(0 => 'Coordenador', 1 => 'Vice-Coordenador', 2 => 'Colaborador', 3 => 'Bolsista')]);
        echo $this->Form->input('bolsista', ['type' => 'checkbox']);
        echo $this->Form->input('bolsa');
        echo $this->Form->input('data_entrada', ['dateWidget' => 'DD/MM/YYYY', 'type' => 'date']);
        echo $this->Form->input('data_saida', ['empty' => true, 'default' => '']);
        echo $this->Form->input('vinculo_projeto', [ 'options' => $participante->vinculosParticipante()]);
        echo $this->Form->input('recebe_certificado', ['type' => 'checkbox', 'checked' => true]);
        ?>
    </fieldset>

    <?= $this->Form->button('Salvar', ['formnovalidate' => true, 'name' => 'submit', 'value' => 'salvar', 'type' => 'submit']) ?>
    <?= $this->Form->button(__('Adicionar'), ['name' => 'submit', 'value' => 'adicionar', 'type' => 'submit']) ?>

    <?= $this->Form->end() ?>


</div>
