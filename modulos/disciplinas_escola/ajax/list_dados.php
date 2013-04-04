<?php

include("includes_ajax.php");
#### MODELS #########

import("DisciplinasMec");

$escola_id = (int)$_POST["escola_id"];

$disciplinas_mec = DAOFactory::getDisciplinasMecDAO()->queryAll(" *"," WHERE status=1 ORDER BY nome ASC");//PEGA TODOS OS REGISTROS COM O TOP

$disciplinas_escola = DAOFactory::getDisciplinasEscolaDAO()->getDisciplinasEscola($escola_id);

$list_select = array();

foreach($disciplinas_mec as $disciplina_mec){
    $list_select[]= array(
        'value'=>$disciplina_mec->id,
        'nome'=>$disciplina_mec->nome

    );
}

$marcadas_ar = array();

foreach($disciplinas_escola as $disciplina_escola){
    $marcadas_ar[] = "'".$disciplina_escola["disciplina_mec_id"]."'";
}

if(count($marcadas_ar)>0) $marcadas_string = implode(",",$marcadas_ar);

$nome_vinculo = "Disciplinas";

//MULTI SELECT
include(DOMAIN_PATH."modulos/escola/views/multi_select_vinculo_mec_escola.php");

?>