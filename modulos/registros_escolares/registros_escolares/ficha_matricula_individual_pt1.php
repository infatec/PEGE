<?php
include("../ajax/includes_ajax.php");

import("Turma");
import("Aluno");
import("NivelEnsinoMec");
import("Ano");
import("Turno");
import("Matricula");
import("AnoLetivo");

$escola_id = $_GET["escola_id"];
$aluno_id =$_GET["aluno_id"];
$turma_id =$_GET["turma_id"];

$escola = DAOFactory::getEscolaDAO()->load($escola_id);
$turma = DAOFactory::getTurmaDAO()->load($turma_id);
$nivel_ensino = DAOFactory::getNivelEnsinoMecDAO()->load($turma->nivelEnsinoMecId);
$turno = DAOFactory::getTurnoDAO()->load($turma->turnoId);
$ano = DAOFactory::getAnoDAO()->load($turma->anoId);
$ano_letivo = DAOFactory::getAnoLetivoDAO()->load($turma->anoLetivoId);

$aluno = DAOFactory::getAlunoDAO()->load($aluno_id);


$matriculas = DAOFactory::getMatriculaDAO()->queryAll("*"," where aluno_id = ".$aluno_id." and turma_id= ".$turma_id." ");

$matricula = $matriculas[0];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>PEGE - Programa estatistico e Gestor Escolar</title>
<link href="stilo/folha.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="topo">
	<div id="foto"><img src="images/img_escola.JPG" width="70" height="70"></div>
    <div id="titulo">
    <strong>Estado do PI<br>
     Secretaria Municipal<br> 
     Secretaria Municipal de Educação
  </strong></div>                       
</div>

<hr>

	<div align="center"><p id="campos1"><strong>Ficha de Matricula Incividual</strong></p></div>
    
<div align="center">
    	<table class="tabela">
   	    	<tr>
            <th width="10px">01</th>
            <th width="300px">Nome da Escola</th>
            <th width="10px">02</th>
            <th width="200px">Localidade</th>
            <th width="10px">03</th>
            <th width="200px">Municipio</th>
            <th width="10px">04</th>
            <th width="200px">Distrito</th>
            </tr>
            
            <tr>
            <td colspan="2"><?=$escola->nome?></td>
            <td colspan="2">Urbana</td>
            <td colspan="2">Teresina</td>
            <td colspan="2">-</td>
            </tr>
            </table>
            
            <br />
			<table class="tabela">
            <tr>
            <th width="5px">05</th>
            <th colspan="7">Dados Sobre o Aluno</th>
            </tr>
            </table>
      Nome:<span style="text-decoration: underline;"><?=$aluno->nome?></span>_______________________Sexo:______________________Cor:_______________________<br />
      Data de Nascimento:_____/______/______Nacionalidade:________________________Naturalidade:____________________Relegião:__________________<br />
      Registro de Nascimento:_____________________________Livro N°:_________________Folha N°:_________________Comarca:_____________________<br />
      Carteira de Identidade N°:______________CPF N°:_________________Titulo de Eleitor N°:__________________Zona N°:__________Cessão:___________<br />
      Carteira de Reservista:___________________________Série N°:_____________________Cartegria N°:___________________CSM:___________________<br />
      Endereço:________________________________________Cidade:___________________Bairro:________________________Fone:___________________<br />
      Escola Origem:_____________________________________Cidade:______________________Estado:___________________Rede Municipal:&nbsp;(&nbsp;)est. &nbsp; part.(&nbsp;)<br />
      Família Composta:___________________________pessoas Reside: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pais(&nbsp;)&nbsp;&nbsp;&nbsp; Parentes(&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp Outros(&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Estado Civil:&nbsp;&nbsp;&nbsp; Casado(&nbsp;)&nbsp;&nbsp;&nbsp; Solteiro(&nbsp;)&nbsp;&nbsp;&nbsp; Outros(&nbsp;)<br />
      Grupo Sanguíneo:____________RH:______________Tipo de alergia:_________________________Diabéticos:&nbsp;&nbsp;&nbsp;sim(&nbsp;)&nbsp;&nbsp;&nbsp;não(&nbsp;)&nbsp;&nbsp;&nbsp; Outra Doença:_____________<br />
      Profissão do Aluno:_______________________Endereço do Trabalho:___________________________________________Telefone:____________________<br />
      Renda Familiar:_____________________________________________________________________________________Cartão Bolsa Familiar:&nbsp;&nbsp;sim(&nbsp;)&nbsp;&nbsp;&nbsp;não(&nbsp;)<br />
       <br />
			<table class="tabela">
            <tr>
            <th width="5px">05</th>
            <th colspan="7">Dados Sobre os Pais</th>
            </tr>
            </table>
            Nome do Pai:__________________________________________________________________________________________________Vivo:&nbsp;&nbsp;sim(&nbsp;)&nbsp;&nbsp;&nbsp;não(&nbsp;)<br />
            Nacionalidade:______________________Naturalidade:_______________________Nível de Escolaridade:_______________________Religião:___________<br />
            Profissão:____________________Endereço de Trabalho:__________________________________________________Telefone:______________________<br />
            Nome da Mãe:_________________________________________________________________________________________________Vivo:&nbsp;&nbsp;sim(&nbsp;)&nbsp;&nbsp;&nbsp;não(&nbsp;)<br />
             Nacionalidade:______________________Naturalidade:_______________________Nível de Escolaridade:_______________________Religião:___________<br />
            Profissão:____________________Endereço de Trabalho:__________________________________________________Telefone:______________________<br />
             Nome da Responsável:___________________________________________________________________________________________Vivo:&nbsp;&nbsp;sim(&nbsp;)&nbsp;&nbsp;&nbsp;não(&nbsp;)<br />
             Nacionalidade:______________________Naturalidade:_______________________Nível de Escolaridade:_______________________Religião:___________<br />
            Profissão:____________________Endereço de Trabalho:__________________________________________________Telefone:______________________<br />
            </div>
            
            <br />
            <div align="center">
            
	<table class="tabela">
    <tr>
    <th width="35px">06</th>
    <th colspan="6"><strong>REQUERIMENTO DE MATRÍCULA - EDUCAÇÃO BÁSICA</strong></th>
    </tr>
    </table>
    <table class="tabela">
    	<tr>
    	<th width="100px" rowspan="2">Data</th>
        <th width="100px" rowspan="2">Ano</th>
        <th width="100px" rowspan="2">Turma</th>
        <th width="100px" rowspan="2">Turno</th>
        <th width="350px" rowspan="2">Assinatura dos Pais e ou Responsáveis</th>
        <th width="100px" rowspan="2">Rubrica</th>
        <th colspan="2">resutato Final</th>
   	   </tr>
       
       <tr>
       <th>Aprov.</th>
       <th>Reprov.</th>
       </tr>
       
       <tr>
       <td><?=geradatabr1($matricula->dataMatricula)?></td>
       <td><?=$ano->nome?></td>
       <td><?=$turma->codigo?></td>
       <td><?=$turno->nome?></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       </tr>
      
	</table>
    <table class="tabela">
    <tr>
    <th colspan="2">Declaração</th>
    </tr>
    
    <tr>
    <th width="500px" height="150px">&nbsp;</th>
    <th width="500px" height="150px">&nbsp;</th>
    </tr>
    </table>
</div>
</body>
</html>