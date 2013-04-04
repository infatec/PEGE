<?php
include("includes_ajax.php");
import("Servidor");

$term = $_GET["term"];
$escola_id = $_GET["escola_id"];

$servidores = DAOFactory::getServidorDAO()->queryAll("*","where nome like '%".$term."%' ORDER by nome ASC");

foreach($servidores as $servidor){
    $resultado[] = array(
        "id"=>$servidor->id,
        "label"=>utf8_encode($servidor->nome),
        "value" =>utf8_encode($servidor->nome)
    );
}

echo json_encode($resultado);

?>