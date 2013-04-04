<?php
include("../ajax/includes_ajax.php");

import("Turma");
import("Aluno");
import("NivelEnsinoMec");
import("Ano");
import("AnoLetivo");

$escola_id = $_GET["escola_id"];
$ano_letivo_id =$_GET["ano_letivo_id"];

$escola = DAOFactory::getEscolaDAO()->load($escola_id);
$ano_letivo = DAOFactory::getAnoLetivoDAO()->load($ano_letivo_id);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>PEGE</title>
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
<div id="tituloTabela"><p><strong>Rendimento Anual do Ensino Fundamental(1° ao 9° ano) <?=$ano_letivo->identificacao?></strong></p></div>


<div align="center"><p id="campos1">Escola:<span style="text-decoration: underline;"><?=$escola->nome?></span> Turno: Manhã
</p></div>

<div align="center">
	<table class="tabela">
    	<tr>
        <th rowspan="2">Ano</th>
        <th rowspan="2">MI</th>
        <th rowspan="2">D</th>
        <th rowspan="2">TE</th>
        <th rowspan="2">EV</th>
        <th rowspan="2">PM</th>
        <th rowspan="2">MF</th>
        <th colspan="2">Port</th>
        <th colspan="2">Mat</th>
        <th colspan="2">Geo</th>
        <th colspan="2">His</th>
        <th colspan="2">Cie</th>
        <th colspan="2">E.Rel.</th>
        <th colspan="2">Art</th>
        <th colspan="2">filo</th>
        <th colspan="2">Ing</th>
        <th colspan="2">E.F.</th>
        <th rowspan="2">n° de RP Turma</th>
        </tr>
    	
        <tr>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        <th>AP</th>
        <th>RP</th>
        </tr>
    	<?for ($i=1;$i<10;$i++): ?>
            <tr>
                <td><?=$i?>º ano</td>
                <td>200</td>
                <td>5</td>
                <td>40</td>
                <td>35</td>
                <td>5</td>
                <td>-</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
               <td>40</td>
                <td>10</td>
                <td>40</td>
                <td>10</td>
                <td>5</td>
            </tr>
        <? endfor;?>
    	
    <tr>
    <th colspan="28">LEGENDA: MI-Matrícula Inicial  |  PM-Pós-matricula | D-Desistente | 
    MF-matrícula final | TE-transferência expedida | A-aprovados | EV-evadido | RP-reprovados  </th>
    </tr>
    </table>

</div>

</body>
</html>