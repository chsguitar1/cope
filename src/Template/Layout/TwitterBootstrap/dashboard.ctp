<?php

use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', array($this->request->controller, $this->request->action)) . '" ');
$this->start('tb_body_start');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="navbar navbar-inverse navbar-fixed-top" style="background: #008a4d" >
 
        <?php
        echo $this->Html->image("ifpr_logo.png", [
            "alt" => "Brownies", 'style' => ' float: left; margin-right: 15px;',
            'url' => ['controller' => 'Projetos', 'action' => 'redirecionar']
        ]);
        ?>


        <div class="row">
            <div class=" nav nav navbar-right col-md-9 col-sm-9 col-xs-9">
              
                <?= $this->Form->create('Perfil', ['url' => ['controller' => 'Users', 'action' => 'alterar_perfil'], 'id' => 'formPerfil']) ?>
                <?=
                $this->Form->input('role', ['options' => $roles, 'default' => $role_padrao, 'label' => ['text' => 'Perfil', 'style' => 'color: white'],
                    'style' => 'width: 250px;', 'onChange' => 'document.getElementById("formPerfil").submit();']);
                ?>
            <?= $this->Form->end() ?>
                <span style="color: white; font-weight: bold">Usuário: <?= $user->username ?> </span>
                <span> </span>
                <span> </span>
            </div>
            <div class="col-md-63col-sm-3 col-xs-3">

            </div>
        </div>

        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= Configure::read('App.title') ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right visible-xs">
                <?= $this->fetch('tb_sidebar') ?>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    <li><?= $this->Html->link('Projetos', array('controller' => 'Projetos', 'action' => 'index'),array('style' => 'color:#ffffff;font-size:20px;')) ?></li>
                    <li><?= $this->Html->link('Pessoas', array('controller' => 'Pessoas', 'action' => 'index'),array('style' => 'color:#ffffff;font-size:20px;')) ?></li>
                    <li><?= $this->Html->link('Usuários', array('controller' => 'Users', 'action' => 'index'), array('style' => 'color:#ffffff;font-size:20px;')) ?></li>
                    <li><?= $this->Html->link('Cursos', array('controller' => 'Cursos', 'action' => 'index'),array('style' => 'color:#ffffff;font-size:20px;')) ?></li>
                    <li><?= $this->Html->link('Pareceres', array('controller' => 'SolicitacaoPareceres', 'action' => 'index'),array('style' => 'color:#ffffff;font-size:20px;')) ?></li>


                    <li><?= $this->Html->link('Sair', array('controller' => 'Users', 'action' => 'logout'),array('style' => 'color:#ffffff;font-size:20px;')) ?></li>
                </ul>
                <form class="navbar-form navbar-right">
<!--                    <input type="text" class="form-control" placeholder="Search...">-->
                </form>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
<?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="padding-top: 120px;" >
                <?php
                /**
                 * Default `flash` block.
                 */
                if (!$this->fetch('tb_flash')) {
                    $this->start('tb_flash');
                    if (isset($this->Flash))
                        echo $this->Flash->render();
                    $this->end();
                }
                $this->end();

                $this->start('tb_body_end');
                echo '</body>';
                $this->end();

                $this->append('content', '</div></div></div>');
                echo $this->fetch('content');
                