<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>



<div class="row">
      <?= $this->Html->link('Voltar', ['action' => 'index',$acompanhamento->id], ['class' => 'btn btn-primary']); ?>
    <div class="col-lg-5">
        <h3><?= __('Projeto: ') ?> <?= $acompanhamento->has('projeto') ? $this->Html->link($acompanhamento->projeto->tituto_projeto, ['controller' => 'Projetos', 'action' => 'view', $acompanhamento->projeto->id]) : '' ?></h3>
         <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($acompanhamento->id) ?></p>
        <h6><?= __('Tipo') ?></h6>
        <p><?= $acompanhamento->tipoAcompanhamentoToStr($acompanhamento->tipo) ?></p>
        <h6><?= __('Criado Por') ?></h6>
        <p><?= $acompanhamento->created_by ?></p>
   
   
         <h6><?= __('Criado') ?></h6>
        <p><?= h($acompanhamento->created) ?></p>
    </div>
    
       
   
</div>
<div class="row texts">
    <div class="col-lg-3">
        <h3><?= __('Descrição') ?></h3>
        <?= $this->Text->autoParagraph(h($acompanhamento->descricao)); ?>
    </div>
</div>

