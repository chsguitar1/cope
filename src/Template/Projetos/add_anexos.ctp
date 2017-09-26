<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>


<div class="projetos form large-9 medium-8 columns content">
    <fieldset>


        <div class="projetos form large-9 medium-8 columns content">
            <?= $this->Form->create($projeto) ?>
            <fieldset>

                <legend><?= __('Documentação do projeto: ') . $projeto->tituto_projeto ?></legend>
                <?php
                echo $this->Form->input('colegiado', [ 'label' => 'Colegiado a qual está vinculado']);
                echo $this->Form->input('parcerias_ext', [ 'label' => 'Parcerias externas']);
                echo $this->Form->input('primeira', ['label' => 'Esta é a primeira vez que o projeto será apreciado pelo COPE?', 'type' => 'checkbox', 'empty' => true]);
                echo $this->Form->input('resumo', ['label' => 'Resumo do projeto.']);
                echo $this->Form->input('palavras_chave', ['type' => 'text', 'label' => 'Palavras-chaves']);
                echo $this->Form->input('fundamentacao', ['label' => 'Fundamentação da proposta']);
                echo $this->Form->input('objetivos', ['label' => 'Objetivos']);
                echo $this->Form->input('metodologia', ['label' => 'Metodologia']);
                echo $this->Form->input('recursos', ['label' => 'Recursos (materiais e financeiros)']);
                echo $this->Form->input('referencias', ['label' => 'Referências bibliográficas']);
                ?>
            </fieldset>
            <nav class="navbar  navbar-default">
                <div class="container-fluid container">
                    <?= $this->Form->button(__('Adicionar'), ['name' => 'submit', 'value' => 'addanexos', 'type' => 'submit',
                        'class' => 'btn btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
                </div>
            </nav>


        </div>
