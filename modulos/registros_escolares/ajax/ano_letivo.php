<?php
include("includes_ajax.php");
import("AnoLetivo");

$escola_id = (int)$_POST["escola_id"];

$dados = array('primary_key' => 'id',
    'nome' => 'identificacao',
    'tabela' => 'ano_letivo',
    'condicao' => 'where escola_id='.$escola_id.' order by data_inicio_aulas desc',
    'nome_input' => 'ano_letivo_id',
    'id' => 'ano_letivo_id',
    'onchange'=>'getTurmas()',
    'class' => $erro["ano_letivo_id"]
);

?>
<b> Selecione um ano letivo: <?=DAOFactory::getAnoLetivoDAO()->geraSelect($dados)?> </b>