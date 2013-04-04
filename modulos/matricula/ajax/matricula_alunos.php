<?php
include("includes_ajax.php");

import("Matricula");
import("Turma");
import("AnoLetivo");

$turma_id = (int)$_POST["turma_id"];
parse_str($_POST["dados_form"],$alunos_matricular);

$turma = DAOFactory::getTurmaDAO()->load($turma_id);
$anoletivo = DAOFactory::getAnoLetivoDAO()->load($turma->anoLetivoId);

if(!is_array($alunos_matricular["alunos"])) $alunos_matricular["alunos"]=array();

foreach($alunos_matricular["alunos"] as $aluno_id){
    $matricula = new Matricula();
    $matricula->matricula = $anoletivo->identificacao."0".$turma_id."0".$aluno_id;
    $matricula->alunoId = $aluno_id;
    $matricula->turmaId = $turma_id;
    $matricula->dataMatricula = date('Y-m-d');
    DAOFactory::getMatriculaDAO()->insert($matricula);
}

?>