<?php
include("../includes_ajax.php");
import("Escola");

$term = $_GET["term"];

$escolas = DAOFactory::getEscolaDAO()->queryAll("*"," WHERE nome like '%".$term."%' or inep like '%".$term."%' ORDER BY nome ASC LIMIT 10 ");

foreach($escolas as $escola){
    $resultado[] = array(
        "id"=>$escola->id,
        "label"=>utf8_encode($escola->nome),
        "value" =>utf8_encode($escola->nome)
    );
}

echo json_encode($resultado);

?>