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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>PEGE - Programa estatistico e Gestor Escolar</title>
    <link href="stilo/folha.css" rel="stylesheet" type="text/css">
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
<div id="tituloTabela"><p><strong>Ata de Resultados Finais</strong></p></div>


<div align="center"><p id="campos1">Concluiu-se o processo de adequação global dos resultados finais dos seguintes alunos do <?=$ano->nome?> , turma <?=$turma->turma?> do <?=$nivel_ensino->nome?> da escola <?=$escola->nome?>, localizada <?=$escola->endereco?>, com os seguintes resultados:</p></div>

<div id="tabela" align="center" >
    <table border="0" class="tabela">
        <tr>
            <th rowspan="2" width="20px" align="center" >Ordem</th>
            <th rowspan="2" width="500px" >Nome do Aluno</th>
            <th colspan="16">Materias/Disciplinas</th>
            <th rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
        <tr >
            <th>Port.</th>
            <th>Ing.</th>
            <th>His.</th>
            <th>Geo.</th>
            <th>Art.</th>
            <th>E.F.</th>
            <th>Mat.</th>
            <th>Cie.</th>
            <th>Filo.</th>
            <th>E.R.</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
        <?
        $i=1;
        foreach($alunos as $aluno):?>
            <tr >
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
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <? $i++;
        endforeach; ?>

    </table>

</div>

<div align="center">
    <p id="rodape">E para constar EU____________________________________________Secretário(a), lavrei a presente<strong>ATA</strong> que vai assinada pelo diretor do estabelecimento de ensno.<br>
    <div align="center" style="width:300px;">____________________________________<br>Nome do Diretor</div>
</div>
</body>
</html>