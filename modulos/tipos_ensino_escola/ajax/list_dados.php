<?php

include("includes_ajax.php");
#### MODELS #########

import("TiposEnsinoMec");

$escola_id = (int)$_POST["escola_id"];

$tipos_ensino_mec = DAOFactory::getTiposEnsinoMecDAO()->queryAll("*"," WHERE status=1 ORDER BY nome ASC");//PEGA TODOS OS REGISTROS COM O TOP

$list_select = array();

foreach($tipos_ensino_mec as $tipo_ensino_mec){
    $list_select[]= array(
        'value'=>$tipo_ensino_mec->id,
        'nome'=>$tipo_ensino_mec->nome

    );
}

$tipos_ensino_escola = DAOFactory::getTiposEnsinoEscolaDAO()->getTiposEnsinoByEscola($escola_id);

$marcadas_ar = array();

foreach($tipos_ensino_escola as $tipo_ensino_escola){
    $marcadas_ar[] = "'".$tipo_ensino_escola["tipo_ensino_mec_id"]."'";
}

if(count($marcadas_ar)>0) $marcadas_string = implode(",",$marcadas_ar);

$nome_vinculo = "Tipos de Ensino";

//MULTI SELECT
include(DOMAIN_PATH."modulos/escola/views/multi_select_vinculo_mec_escola.php");
?>