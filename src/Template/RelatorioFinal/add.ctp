<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    ?>
<div class="relatorioFinal form large-9 medium-8 columns content">
    <?= $this->Form->create($relatorioFinal) ?>
    <fieldset>
        <legend><?= __('Relatório') ?></legend>
        <?php
            echo $this->Form->input('num_cadastro',['label'=> '1.4 Cadastro no COPE',
                'placeholder'=> \App\Model\Entity\RelatorioFinal::NUM_PL]);
            echo $this->Form->input('data_ini',['label'=>'1.5 Data de início da execução:']);
            echo $this->Form->input('local_execucao',['label'=>'Local de Execução']);
            echo $this->Form->input('final',['label'=>'Final']);
            echo $this->Form->input('resumo',['label'=>'Resumo do trabalho desenvolvido',
                'placeholder'=> \App\Model\Entity\RelatorioFinal::RES_PL]);
            echo $this->Form->input('palavras',['label'=>'Palavras-chaves',
                'placeholder'=> 'Entre 3 e 5 palavras' ]);
            echo $this->Form->input('situacao',['label'=> 'Situação atual do projeto',
                'placeholder'=> \App\Model\Entity\RelatorioFinal::SITU_PL]);
            echo $this->Form->input('perspectiva',['placeholder'=> \App\Model\Entity\RelatorioFinal::PERS_PL]);
            echo $this->Form->input('participacao_discente',['label'=>'Participação discente na proposta'
                ,'label'=>'Perspectiva do projeto'
                ,'placeholder'=> \App\Model\Entity\RelatorioFinal::PAR_PL]);
            echo $this->Form->input('producoes',['label'=>'Produções',
                'placeholder'=> \App\Model\Entity\RelatorioFinal::PRODU_PL]);
            echo $this->Form->input('referencias',['label'=>'Referências bibliográficas'
                ,'placeholder'=> \App\Model\Entity\RelatorioFinal::REF_PL]);
           
        ?>
    </fieldset>
    <div>
        <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn btn-success']) ?>
        <?= $this->Form->end() ?>
        <?= $this->Html->link('Voltar', ['controller'=>'Projetos','action' => 'index'], ['class' => 'btn btn-primary']); ?>
    </div>
</div>
