<?php
include("includes_ajax.php");
import("DisciplinasMec");

$term = $_GET["term"];
$escola_id = $_GET["escola_id"];

$disciplinas = DAOFactory::getDisciplinasMecDAO()->queryAll("*","where
                            id in ( select disciplinas_mec_id from disciplinas_escola where escola_id=".$escola_id." )
                            and nome like '%".$term."%' ORDER by nome ASC");

foreach($disciplinas as $disciplina){
    $resultado[] = array(
        "id"=>$disciplina->id,
        "label"=>utf8_encode($disciplina->nome),
        "value" =>utf8_encode($disciplina->nome)
    );
}

echo json_encode($resultado);

?>