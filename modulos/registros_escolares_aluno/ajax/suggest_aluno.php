<?php

include("includes_ajax.php");
import("Aluno");

$term = $_GET["term"];
$ano_letivo_id = $_GET["ano_letivo_id"];

$alunos = DAOFactory::getAlunoDAO()->queryAll("*","where (nome like '%".$term."%' or inep like '%".$term."%')
  and id in (select m.aluno_id from matricula m inner join turma t on m.turma_id=t.id where t.ano_letivo_id = ".$ano_letivo_id.")
  ORDER by nome ASC limit 20");

foreach($alunos as $aluno){
    $resultado[] = array(
        "id"=>$aluno->id,
        "label"=>utf8_encode($aluno->nome ." / inep:". $aluno->inep),
        "value" =>''
    );
}

echo json_encode($resultado);

?>