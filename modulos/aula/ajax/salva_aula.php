<?php
include("includes_ajax.php");

import("Aula");
import("FaltaAluno");

parse_str($_POST["dados_form"],$dados_aula);

//print_r($dados_aula);
//exit;
$aula_id = $dados_aula["id"];
$turma_disciplina_id = $dados_aula["turma_disciplina_id"];

$aula = new Aula();
$aula->turmaDisciplinaId = $turma_disciplina_id;
$aula->dataAula = geradatamy($dados_aula["data_aula"]);
$aula->horaInicio = $dados_aula["hora_inicio"];
$aula->horaFim = $dados_aula["hora_fim"];
$aula->atividade = $dados_aula["atividade"];
$aula->qtdAula = $dados_aula["qtd_aula"];

if(!$aula_id){
    $aula_id = DAOFactory::getAulaDAO()->insert($aula);
}else{
    $aula->id =  $aula_id;

    DAOFactory::getAulaDAO()->update($aula);

    DAOFactory::getFaltaAlunoDAO()->deleteByAulaId($aula_id);
}

$faltas_aluno = $dados_aula["faltas"];

foreach($faltas_aluno as $matricula_id=>$aula){
    $falta_aluno = new FaltaAluno();
    $falta_aluno->matriculaId = $matricula_id;
    $falta_aluno->aula=$aula;
    $falta_aluno->aulaId = $aula_id;
    DAOFactory::getFaltaAlunoDAO()->insert($falta_aluno);
    $falta_aluno=NULL;
}


?>
