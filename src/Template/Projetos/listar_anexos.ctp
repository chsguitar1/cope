<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="projetos form large-9 medium-8 columns content">
   
    <fieldset>
        <legend><?= __('Detalhes do Projeto.') ?></legend>


        <span style="font-weight: bold;"> Título do Projeto: </span><?= $projeto->tituto_projeto; ?>

        <legend><?= __('Anexos:') ?></legend>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Tamanho</th>
                    <th>Data Envio</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <?php foreach ($projeto->anexos as $an): ?>
                <tr>

                    <td><?= h($an->id) ?></td>
                    <td><?= h($an->descricao) ?></td>
                    <td><?= h($an->tipoAnexoToStr($an->tipo_anexo)) ?></td>
                    <td><?= h($an->tamanho . ' bytes') ?></td>
                    <td><?= h($an->created) ?></td>
                    <td><?= h($an->criado_por->pessoa->nome . ' (' . $an->criado_por->username . ')') ?></td>        

                    <td><?= ($projeto->rascunho) ? $this->Form->postLink(__(''), ['action' => 'del_anexo', $an->id], ['confirm' => __('Tem certeza que deseja remover # {0}?', $an->id), 'class' => 'btn btn-default fa fa-trash-o', 'title' => 'Deletar']) : '' ?>
                        <?= $this->Html->link('', ['controller' => 'Anexos', 'action' => 'download', $an->id],['class' => 'btn btn-default fa fa-download', 'title' => 'Download']); ?>
                    <td>
                </tr>

            <?php endforeach; ?>
        </table>
    </fieldset>
 
</div>
<div class="col-lg-2">
       <?= $this->Html->link('Voltar', ['action' => 'index-presidente'], ['class' => 'btn btn-primary']); ?>
    </div>
