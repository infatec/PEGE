<?php
include("../ajax/includes_ajax.php");

import("Turma");
import("Aluno");
import("NivelEnsinoMec");
import("Ano");
import("Turno");
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
     Secretaria Municipal de Educa��o
  </strong></div>                 
</div>
	<hr /> 
    
    <div id="tituloTabela"><p><strong>Boletim do Aluno</strong></p></div>
    
    <div align="center"><p id="campos1">
    Escola:<span style="text-decoration: underline;"><?=$escola->nome?></span><br />
    Endere�o:<span style="text-decoration: underline;"><?=$escola->endereco?></span><br />
    Nome do Aluno(a):<span style="text-decoration: underline;"><?=$aluno->nome?></span><br />
    Ano:<span style="text-decoration: underline;"><?=$ano->nome?></span>Turma:<span style="text-decoration: underline;"><?=$turma->codigo?></span> 
    Turno: <span style="text-decoration: underline;"><?=$turno->nome?></span> N�vel de Ensino: <span style="text-decoration: underline;"><?=$nivel_ensino->nome?></span><br />
    Ano Letivo: <span style="text-decoration: underline;"><?=$ano_letivo->identificacao?></span></p></div>
    
    <div id="tabela" align="center">
    	<table class="tabela">
    	<tr>
        <th rowspan="2" width="250px">Disciplinas</th>
        <th colspan="2">1�Bimestre</th>
        <th colspan="2">2�Bimestre</th>
        <th rowspan="2">M�d.Semes.</th>
        <th colspan="2">3�Bimestre</th>
        <th colspan="2">4�Bimestre</th>
        <th rowspan="2">M�d.Semes.</th>
        <th rowspan="2">M�d.Anual</th>
        <th rowspan="2">Recu.Final</th>
        <th rowspan="2">M�d.Final</th>
        <th rowspan="2">Faltas</th>
        <th rowspan="2">Observa��es</th>
        </tr>
        
        <tr>
        <th>M�dia</th>
        <th>Falta</th>
        <th>M�dia</th>
        <th>Falta</th>
        <th>M�dia</th>
        <th>Falta</th>
        <th>M�dia</th>
        <th>Falta</th>
        </tr>
        
        <tr>
        <td><strong>Portugu�s</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>Matem�tica</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>Ci�ncias</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        <tr>
        <td><strong>Hist�ria</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        <tr>
        <td><strong>Geografia</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        <tr>
        <td><strong>Arte</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>Educa��o Fisica</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>Ensino Religioso</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>Lingua Inglesa</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>Introdu��o a Filosofia</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        
        <tr>
        <td><strong>T�cnicas Agricolas</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        <tr>
        <td><strong>Estudos da Sociedade e da Natureza</strong></td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        <td>10</td>
        </tr>
        </table>
    </div>
    <div align="center"><p id="campos1">
    O(A) Aluno(a) foi___________________________________<br /><br /><br />
    Assinatura do Respos�vel<br /><br />
    1�Bimestre____________________________________________<br /><br />
    2�Bimestre____________________________________________<br /><br />
    3�Bimestre____________________________________________<br /><br />
    4�Bimestre____________________________________________<br /><br /><br /><br />
    ____________________________________<br />
    Diretor(a)<br /><br /><br />
    ____________________________________<br />
    Secret�rrio(a)
    
</body>
</html>