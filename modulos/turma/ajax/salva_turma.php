<?php
include("includes_ajax.php");

import("Turma");
import("TurmaDisciplina");
import("TurmaDisciplinaHorario");

parse_str($_POST["dados_form"],$dados_turma);
$escola_id = $_POST["escola_id"];
$ano_letivo_id = $_POST["ano_letivo_id"];

print_r($dados_turma);
//exit;
$turma_id = $dados_turma["id"];

$turma = new Turma();
$turma->escolaId = $escola_id;
$turma->anoLetivoId = $ano_letivo_id;
$turma->turnoId = $dados_turma["turno_id"];
$turma->nivelEnsinoMecId = $dados_turma["nivel_ensino_mec_id"];
$turma->anoId = $dados_turma["ano_id"];
$turma->salaId = $dados_turma["sala_id"];
$turma->codigo = $dados_turma["codigo"];
$turma->numMaxAluno = $dados_turma["num_max_aluno"];

if(!$turma_id){
    $turma_id = DAOFactory::getTurmaDAO()->insert($turma);
}else{
    $turma->id =  $turma_id;

    DAOFactory::getTurmaDAO()->update($turma);

    $sql_remove_disciplina_horario = "DELETE FROM turma_disciplina_horario WHERE turma_disciplina_id IN (SELECT id FROM turma_disciplina WHERE turma_id=".$turma_id.")";
    $query = new SqlQuery($sql_remove_disciplina_horario);
    QueryExecutor::executeUpdate($query);

    DAOFactory::getTurmaDisciplinaDAO()->deleteByTurmaId($turma_id);
}

$disciplinas_adicionadas = $dados_turma["disciplinas"];

//print_r($disciplinas_adicionadas);

foreach($disciplinas_adicionadas as $disciplina_mec_id){

    $turma_disciplina = new TurmaDisciplina();
    $turma_disciplina->disciplinasMecId = $disciplina_mec_id;
    $turma_disciplina->turmaId = $turma_id;
    $turma_disciplina->servidorId = $dados_turma["servidor"][$disciplina_mec_id];
    $turma_disciplina->horasAulaSemestre1 = $dados_turma["horas_aula_semestre1"][$disciplina_mec_id];
    $turma_disciplina->horasAulaSemestre2 = $dados_turma["horas_aula_semestre2"][$disciplina_mec_id];

    $turma_disciplina_id = DAOFactory::getTurmaDisciplinaDAO()->insert($turma_disciplina);

    $horarios_disciplina = $dados_turma["horarios"][$disciplina_mec_id];

    if(!is_array($horarios_disciplina)) $horarios_disciplina=array();
    foreach($horarios_disciplina as $horario_disciplina){

        $ar_hor = explode("_",$horario_disciplina);
        $cod_horario = $ar_hor[0];
        $dia_semana = $ar_hor[1];

        $horario_disciplina_obj = new TurmaDisciplinaHorario();
        $horario_disciplina_obj->diasSemana = $dia_semana;
        $horario_disciplina_obj->horarioId = $cod_horario;
        $horario_disciplina_obj->turmaDisciplinaId = $turma_disciplina_id;
        DAOFactory::getTurmaDisciplinaHorarioDAO()->insert($horario_disciplina_obj);

    }

}


?>