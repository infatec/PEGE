<?php

include("includes_ajax.php");
#### MODELS #########

import("ModalidadeEnsinoMec");

$escola_id = (int)$_POST["escola_id"];

$dados_mec = DAOFactory::getModalidadeEnsinoMecDAO()->queryAll(" *"," WHERE status=1 ORDER BY nome ASC");//PEGA TODOS OS REGISTROS COM O TOP

$modalidades_escola = DAOFactory::getModalidadeEnsinoEscolaDAO()->getDadosByEscola($escola_id);

$list_select = array();

foreach($dados_mec as $dado_mec){
    $list_select[]= array(
        'value'=>$dado_mec->id,
        'nome'=>$dado_mec->nome

    );
}

$marcadas_ar = array();

foreach($modalidades_escola as $modalidade_escola){
    $marcadas_ar[] = "'".$modalidade_escola["dados_mec_id"]."'";
}

if(count($marcadas_ar)>0) $marcadas_string = implode(",",$marcadas_ar);

$nome_vinculo = "Modalidades";

//MULTI SELECT
include(DOMAIN_PATH."modulos/escola/views/multi_select_vinculo_mec_escola.php");

?>