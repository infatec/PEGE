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
     Secretaria Municipal <br> 
     Secretaria Municipal de Educação
  </strong></div>                 
</div>
	<hr /> 
    <div id="" align="center">
    	<table class="tabela">
    		<tr>
            <th width="100px">Nome da escola</th>
            <th width="300px"><?=$escola->nome?></th>
            </tr>
            <tr>
            <th>Localidade:</th>
            <th>Urbana</th>
            </tr>
        </table>
    </div>
    
    <div align="center"><p id="campos1"><strong>Certificado de Conclusão de Curso ou Ano Escolar</strong></p></div>
    <div align="center" style="text-align: left;padding: 30px;">
    <div align="left" id="esquerda"><strong>Certificamos</strong> que o Aluno(a)</div><br />
    <?=$aluno->nome?><br />
    filho(a) de ___________________________________________________________________________________________________________<br />
    e de________________________________________________________________________________________________________________<br />
    Natural de__________________________Estado_____________________Nascido(a) em________de_________________de_______________<br />
    concluiu o <?=$ano->nome?> do <?=$nivel_ensino->nome?> neste Estabelecimento de Ensino, tendo como resultado de seus estudos constantes no Hitórico <br /> Escolar, nos termos da lei n° 9.394/96 e do regimento interno de Rede Municipal de Educação.<br /><br /><br />
   
   
    <div align="right" id="direita">Cidade (UF),________de________________de___________</div>
</div>
    
    <br /><br /><br /><br />
    <div align="center">
    	______________________________________<br />Secretário(a) Escolar<br /><br /><br /><br />
        ________________________________________<br />Diretor(a)
        
        	<div align="left" id="esquerda"><h3>Visto:</h3></div><br /><br /><br />
    </div>
    
    <div align="center">_______________________________________________________<br />Secretaria Muniicipal de Educação</div><br />
    
    
    <div align="center">
    <div id="obs">Observação:</div>
    </div>
    
</body>
</html>