<?php

include("includes_ajax.php");

$daoMEC = "get".$classeMEC."DAO";

import($classeMEC);
import("Escola");

$escola_id = (int)$_POST["escola_id"];

$parametros_escola["escola_id"] = $escola_id;

$dados_mec = DAOFactory::$daoMEC()->queryAll("*"," WHERE status=1 ORDER BY nome ASC");//PEGA TODOS OS REGISTROS COM O TOP

$dados_escola = DAOFactory::getEscolaDAO()->getDadosMecByEscola($parametros_escola);

$list_select = array();

foreach($dados_mec as $dado_mec){
    $list_select[]= array(
        'value'=>$dado_mec->id,
        'nome'=>$dado_mec->nome

    );
}

$marcadas_ar = array();

foreach($dados_escola as $dado_escola){
    $marcadas_ar[] = "'".$dado_escola["dado_mec_id"]."'";
}

if(count($marcadas_ar)>0) $marcadas_string = implode(",",$marcadas_ar);

//MULTI SELECT
include(DOMAIN_PATH."modulos/escola/views/multi_select_vinculo_mec_escola.php");

?>