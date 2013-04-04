<?php
include("includes_ajax.php");

import("Ano");

$escola_id = (int)$_POST["escola_id"];
$nivel_ensino_mec_id = (int)$_POST["nivel_ensino_mec_id"];

$dados = array('primary_key' => 'id',
    'nome' => 'nome',
    'tabela' => 'ano',
    'condicao' => 'where nivel_ensino_mec_id='.$nivel_ensino_mec_id.' and id in (select ano_id from ano_escola where escola_id='.$escola_id.') order by nome asc',
    'nome_input' => 'ano_id',
    'id' => 'ano_id',
    'class' => $erro["ano_id"],
    'value' => $turma->anoId
);

DAOFactory::getAnoDAO()->geraSelect($dados);

?>