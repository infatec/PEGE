<?php
include("includes_ajax.php");

import("Turma");
import("Horario");

$escola_id = (int)$_POST["escola_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];

parse_str($_POST["dados_disciplina"],$dados_disciplina);

$disciplina_id = $dados_disciplina["cod_disciplina"];
$nome_disciplina = utf8_decode($_POST["nome_disciplina"]);
$nome_professor = utf8_decode($dados_disciplina["nome_servidor"]);
$servidor_id =  $dados_disciplina["cod_servidor"];
$horas_aula_1_semestre = $dados_disciplina["horas_aula_semestre1"];
$horas_aula_2_semestre = $dados_disciplina["horas_aula_semestre2"];

$horarios = $dados_disciplina["horarios_disciplina"] ? $dados_disciplina["horarios_disciplina"] : array();

include(DOMAIN_PATH."modulos/turma/views/dados_disciplina_turma.php");

?>