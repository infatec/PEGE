<?php
include("includes_ajax.php");

import("Ano");
import("Turma");

$escola_id = (int)$_POST["escola_id"];
$ano_id = (int)$_POST["ano_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];

$dados = array('primary_key' => 'id',
    'nome' => 'codigo',
    'tabela' => 'turma',
    'condicao' => 'where ano_letivo_id='.$ano_letivo_id.' and escola_id='.$escola_id.' and ano_id='.$ano_id.' order by codigo asc',
    'nome_input' => 'ano_id',
    'onchange'=>'getDisciplinas(this.value)',
    'id' => 'turma_id',
    'class' => $erro["turma_id"]
);

DAOFactory::getTurmaDAO()->geraSelect($dados);

?>