<?php
    $this->extend('../Layout/TwitterBootstrap/dashboard');
    echo($projeto);
    ?>
<div class="row"  style="display: table; margin: 0 auto">
    <div class="col-lg-12"  style="display: block; margin: 0 auto">
<p><strong><u>COMIT&Ecirc; DE PESQUISA E EXTENS&Atilde;O &ndash; CAMPUS UMUARAMA</u></strong><p>

<p><strong><u>PROPOSTA</u></strong><strong><u> DE PROJETO DE EXTENS&Atilde;O</u></strong></p>


    </div>
</div>
  <?php foreach ($projeto as $projeto): ?>
<h4>1. IDENTIFICA&Ccedil;&Atilde;O DA PROPOSTA</h4>
<ul>
<li><strong>T&iacute;tulo da proposta:</strong></li>
</ul>
<p><?= $projeto->tituto_projeto?></p>
<ul>
<li><strong>Caracteriza&ccedil;&atilde;o da proposta:</strong></li>
</ul>

<p><?php
            switch ($projeto->tipo_projeto){
                case 0 :
                  echo("Pesquisa");
                    break;
                case 1:
                    echo("Extensão");
                    break;
                case 2 :
                    echo("Inovação");
                    break;
                case 3 :
                    echo("Eventos");
                    break;
            }

      ?></p>
<ul>
<li><strong>Grande &Aacute;rea do Conhecimento:</strong></li>
</ul>

<p><?= $projeto->areas ?></p>

<ul>
<li><strong>&Aacute;rea tem&aacute;tica</strong></li>
</ul>

<p><?= $projeto->areatematica ?></p>

<li><strong>Linha de extens&atilde;o</strong></li>
</ul>

<p><?= $projeto->linhasext?></p>
<ul>
<li><strong>Colegiado a qual est&aacute; vinculado o projeto</strong></li>
</ul>
<p><?= $projeto->colegiado ?></p>
<ul>
<li><strong>Parcerias externas</strong></li>
</ul>
<p><?= $projeto->parcerias_ext ?></p>
<p><strong>1.8 Esta &eacute; a primeira vez que o projeto ser&aacute; apreciado pelo COPE?</strong></p>
<p><?= $projeto->primeira = 0 ? 'Sim': 'Não'  ?></p>

<h4>2. INTEGRANTES DA PROPOSTA</h4>
<p><strong>2.1 Coordenador</strong></p>
<p>&nbsp;</p>
<p>Nome:</p>
<p>CPF: SIAPE:</p>
<p>Campus:</p>
<p>Titula&ccedil;&atilde;o (gradua&ccedil;&atilde;o):</p>
<p>Titula&ccedil;&atilde;o (p&oacute;s-gradua&ccedil;&atilde;o): <em>inserir a &uacute;ltima titula&ccedil;&atilde;o.</em></p>
<p>E-mail:</p>
<p>Telefone:</p>
<p>Link do Curr&iacute;culo Lattes:</p>
<p>Data da &uacute;ltima atualiza&ccedil;&atilde;o do Curr&iacute;culo Lattes: <em>deve ter sido realizada em per&iacute;odo inferior a 12 meses.</em></p>
<p><strong>2.2 Vice Coordenador</strong></p>
<p><em>(n&atilde;o obrigat&oacute;rio)</em></p>
<p>Nome:</p>
<p>CPF: SIAPE:</p>
<p>Campus:</p>
<p>Titula&ccedil;&atilde;o (gradua&ccedil;&atilde;o):</p>
<p>Titula&ccedil;&atilde;o (p&oacute;s-gradua&ccedil;&atilde;o): <em>inserir a &uacute;ltima titula&ccedil;&atilde;o</em>.</p>
<p>E-mail:</p>
<p>Telefone:</p>
<p>Link do Curr&iacute;culo Lattes:</p>
<p>Data da &uacute;ltima atualiza&ccedil;&atilde;o do Curr&iacute;culo Lattes: <em>deve ter sido realizada em per&iacute;odo inferior a 12 meses.</em></p>
<p><strong>2.3 Colaboradores</strong></p>
<p>&nbsp;</p>
<p><strong> 2.3.1 Colaborador docente ou t&eacute;cnico</strong></p>
<p>Nome:</p>
<p>CPF: SIAPE: <em>em caso de colaborador do IFPR</em></p>
<p>Institui&ccedil;&atilde;o/Campus:</p>
<p>Titula&ccedil;&atilde;o (gradua&ccedil;&atilde;o):</p>
<p>Titula&ccedil;&atilde;o (p&oacute;s-gradua&ccedil;&atilde;o): <em>inserir a &uacute;ltima titula&ccedil;&atilde;o</em>.</p>
<p>Fun&ccedil;&atilde;o no projeto:</p>
<p>E-mail:</p>
<p>Link do Curr&iacute;culo Lattes:</p>
<p>Data da &uacute;ltima atualiza&ccedil;&atilde;o do Curr&iacute;culo Lattes: <em>deve ter sido realizada em per&iacute;odo inferior a 12 meses.</em></p>
<p><strong>2.3.2 Colaborador discente</strong></p>
<p>Nome:</p>
<p>CPF:</p>
<p>Institui&ccedil;&atilde;o/Campus:</p>
<p>Curso:</p>
<p>M&oacute;dulo</p>
<p>Carga hor&aacute;ria semanal dedicada ao projeto:</p>
<p>Bolsa: <em>caso haja.</em></p>
<p><em>Caso o coordenador ainda v&aacute; selecionar os discentes para o projeto, informar o nome do curso e m&oacute;dulo de onde se pretende realizar a sele&ccedil;&atilde;o.</em></p>
<p>Link do Curr&iacute;culo Lattes:</p>
<p>Data da &uacute;ltima atualiza&ccedil;&atilde;o do Curr&iacute;culo Lattes: <em>deve ter sido realizada em per&iacute;odo inferior a 12 meses.</em></p>
<h1>3. CARACTERIZA&Ccedil;&Atilde;O DA PROPOSTA</h1>
<p><strong>3.1 Local de execu&ccedil;&atilde;o</strong></p>
<p><strong>3.2 Resumo da proposta</strong></p>
<p><em>(descri&ccedil;&atilde;o sucinta da motiva&ccedil;&atilde;o, fundamenta&ccedil;&atilde;o, metodologia e objetivos do trabalho &ndash; entre 150 e 500 palavras).</em></p>
<p><strong>3.3 Palavras-chaves</strong></p>
<p><em>(entre 3 e 5 palavras).</em></p>
<p><strong>3.4 Fundamenta&ccedil;&atilde;o da proposta</strong></p>
<p><em>(Descri&ccedil;&atilde;o da Contextualiza&ccedil;&atilde;o, Justificativa/ Relev&acirc;ncia/ Interface com pol&iacute;ticas p&uacute;blicas/ P&uacute;blico-alvo/ Envolvimento e parcerias com os diferentes atores sociais - comunidade externa - e Revis&atilde;o Bibliogr&aacute;fica &ndash; m&aacute;ximo de 10 p&aacute;ginas em fonte ARIAL ou an&aacute;logo, tamanho 12 e espa&ccedil;amento entre linhas de 1,5. A p&aacute;gina deve manter a configura&ccedil;&atilde;o deste documento. Na modalidade evento a revis&atilde;o bibliogr&aacute;fica poder ser mais sucinta. Deve constar o arranjo produtivo local, municipal, estadual.).</em></p>
<p><strong>3.5 Objetivos</strong></p>
<p><em>(Descri&ccedil;&atilde;o sucinta dos objetivos do trabalho, os quais podem ser divididos em gerais e espec&iacute;ficos. Especificar se h&aacute; previs&atilde;o de publica&ccedil;&otilde;es ou outras produ&ccedil;&otilde;es, tais como: pedidos de Prote&ccedil;&atilde;o de Propriedade Intelectual; Artigos Completos em Peri&oacute;dicos; Livros; Cap&iacute;tulos de Livros; Textos em Jornais/Revistas de Not&iacute;cias; participa&ccedil;&atilde;o em eventos).</em></p>
<p><strong>3.6 M&eacute;todos da A&ccedil;&atilde;o e t&eacute;cnica de trabalho</strong></p>
<p><em>(Descri&ccedil;&atilde;o da metodologia a ser utilizada na execu&ccedil;&atilde;o do projeto de extens&atilde;o).</em></p>
<p><strong>3.7 Recursos (materiais e financeiros)</strong></p>
<p><em>(Elencar como recursos materiais os equipamentos, instrumentos, dispositivos, aparelhos ou ferramentas utilizadas na atividade de extens&atilde;o. Tamb&eacute;m podem entrar nesta categoria espa&ccedil;os como salas de reuni&atilde;o, laborat&oacute;rios, pr&eacute;dios, terrenos, etc. Com rela&ccedil;&atilde;o aos recursos financeiros, devem ser listados os custos relativos &agrave;s atividades, servi&ccedil;os e at&eacute; os recursos materiais a serem utilizados na execu&ccedil;&atilde;o do projeto de pesquisa. Especificar as poss&iacute;veis fontes dos recursos financeiros).</em></p>
<p><strong>3.8 Cronograma</strong></p>
<p><em>(Descri&ccedil;&atilde;o da ordem cronol&oacute;gica de realiza&ccedil;&atilde;o das atividades. Pode ser apresentada na forma de tabela).</em></p>
<p><strong>3.9 Participa&ccedil;&atilde;o discente no projeto</strong></p>
<p><em>(Caso haja discente no projeto, descrever como se dar&aacute; a participa&ccedil;&atilde;o do mesmo, atividades a serem executadas. Apontar como a proposta poder&aacute; contribuir para o desenvolvimento dos alunos envolvidos em tr&ecirc;s perspectivas: de forma&ccedil;&atilde;o cidad&atilde;, de qualifica&ccedil;&atilde;o profissional e de conhecimento cient&iacute;fico. Recomenda-se que todas as a&ccedil;&otilde;es contemplem participa&ccedil;&atilde;o dos estudantes, quando n&atilde;o houver participa&ccedil;&atilde;o discente justificar essa restri&ccedil;&atilde;o. Inserir cronograma conforme o modelo abaixo).</em></p>
<table width="624">
<tbody>
<tr>
<td rowspan="2" width="272">
<p><strong>Atividades</strong></p>
</td>
<td colspan="12" width="352">
<p><strong>Meses</strong></p>
</td>
</tr>
<tr>
<td width="29">
<p><strong>1</strong></p>
</td>
<td width="29">
<p><strong>2</strong></p>
</td>
<td width="29">
<p><strong>3</strong></p>
</td>
<td width="29">
<p><strong>4</strong></p>
</td>
<td width="29">
<p><strong>5</strong></p>
</td>
<td width="29">
<p><strong>6</strong></p>
</td>
<td width="29">
<p><strong>7</strong></p>
</td>
<td width="29">
<p><strong>8</strong></p>
</td>
<td width="29">
<p><strong>9</strong></p>
</td>
<td width="29">
<p><strong>10</strong></p>
</td>
<td width="29">
<p><strong>11</strong></p>
</td>
<td width="32">
<p><strong>12</strong></p>
</td>
</tr>
<tr>
<td width="272">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="32">&nbsp;</td>
</tr>
<tr>
<td width="272">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="32">&nbsp;</td>
</tr>
<tr>
<td width="272">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="32">&nbsp;</td>
</tr>
<tr>
<td width="272">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="29">&nbsp;</td>
<td width="32">&nbsp;</td>
</tr>
</tbody>
</table>
<p><strong>3.10 Carga hor&aacute;ria</strong></p>
<p><em>(Preencher a tabela abaixo que resume a carga hor&aacute;ria de todos os participantes no projeto, inclusive coordenadores).</em></p>
<table width="449">
<tbody>
<tr>
<td width="234">
<p><strong>Integrante</strong></p>
</td>
<td width="216">
<p><strong>Carga hor&aacute;ria semanal</strong></p>
</td>
</tr>
<tr>
<td width="234">&nbsp;</td>
<td width="216">&nbsp;</td>
</tr>
<tr>
<td width="234">&nbsp;</td>
<td width="216">&nbsp;</td>
</tr>
<tr>
<td width="234">&nbsp;</td>
<td width="216">&nbsp;</td>
</tr>
<tr>
<td width="234">&nbsp;</td>
<td width="216">&nbsp;</td>
</tr>
</tbody>
</table>
<p><strong>3.11 Refer&ecirc;ncias bibliogr&aacute;ficas</strong></p>
<p><em>(apresenta&ccedil;&atilde;o dos textos, artigos, revistas e/ou livros utilizados no desenvolvimento do projeto).</em></p>
<p>Umuarama, ____ de ______ de ______.</p>
<p><em><u>(Assinatura do coordenador do projeto)___</u></em></p>
<p>&nbsp;</p>
<p><em>Nome completo do coordenador do projeto</em></p>
<p>Coordenador do projeto</p>
<ol start="4">
<li><strong> Anexos</strong></li>
</ol>
<p><em>ANEXO OBRIGAT&Oacute;RIO:</em></p>
<p><em>Documento de apresenta&ccedil;&atilde;o do projeto ao colegiado a qual est&aacute; vinculado.</em></p>
<p><em>DEMAIS ANEXOS:</em></p>
<p><em>Documento que comprove parceria com institui&ccedil;&atilde;o externa (caso o projeto apresente esta condi&ccedil;&atilde;o).</em></p>
<p><em>Caso o proponente considere pertinente, poder&aacute; incluir outros anexos.</em></p>
  <?php endforeach; ?>