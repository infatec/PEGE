<?php
include("../ajax/includes_ajax.php");

import("Turma");
import("Aluno");
import("NivelEnsinoMec");
import("Ano");
import("AnoLetivo");

$escola_id = $_GET["escola_id"];
$turma_id =$_GET["turma_id"];

$escola = DAOFactory::getEscolaDAO()->load($escola_id);
$turma = DAOFactory::getTurmaDAO()->load($turma_id);
$nivel_ensino = DAOFactory::getNivelEnsinoMecDAO()->load($turma->nivelEnsinoMecId);
$ano = DAOFactory::getAnoDAO()->load($turma->anoId);
$ano_letivo = DAOFactory::getAnoLetivoDAO()->load($turma->anoLetivoId);

$alunos = DAOFactory::getAlunoDAO()->getAlunosByTurma($turma_id);

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
    	<div id="tituloTabela"><p><strong>Resultado Bimestral</strong></p></div>
        
        
        <div align="center"><p id="campos1">Escola:<?=$escola->nome?> Ano:<?=$ano->nome?> <br />Turma:<?=$turma->codigo?> <br />Bimestre: 1 </p></div>
        
        
      <div id="tabela" align="center">  
      <table class="tabela">
      <tr>
      <th rowspan="3" width="20px">N° da Ordem</th>
      <th rowspan="3" width="300px">Nome do Aluno</th>
      <th colspan="13">disciplinas</th>
        <th rowspan="3">Pres.</th>
      <th rowspan="3">Fal.</th>
      </tr>
      
      <tr>
      <th>Port.</th>
      <th>Mat.</th>
      <th>Cie.</th>
      <th>His.</th>
      <th>Geo.</th>
      <th>Art.</th>
      <th>E.F.</th>
      <th>L.E.</th>
      <th>E.R.</th>
      <th>Fil</th>
      <th>T.A.</th>
      <th></th>
      <th></th>
      </tr>
        
        <tr>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>M</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
         <?
        $i=1;
        foreach($alunos as $aluno):?>
            <tr>
             <td><?=$i?></td>
                <td><?=$aluno["nome"]?></td>
            <td>8.5</td>
                <td>7.5</td>
                <td>9.5</td>
                <td>8.5</td>
                <td>9.5</td>
                <td>9.5</td>
                <td>9.5</td>
                <td>10.0</td>
                <td>6.5</td>
                <td>7.5</td>
                <td>7.5</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
            
           <? $i++;
        endforeach; ?>  
        
        </table>
        <br />
        </div>
        <div align="center">
        <div align="center">Teresina(PI)<?=date(' d / m / Y ')?></div>
        <br />
        <br />
        <div align="center">___________________________________________<br />Diretor</div>
        <br />
        <br />
        <div align="center">___________________________________________<br />Secretário</div>
        </div>
        
        
</body>
</html>