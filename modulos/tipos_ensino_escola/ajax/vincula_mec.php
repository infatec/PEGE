<?php
include("includes_ajax.php");

$action = $_POST["action"];
$escola_id = (int)$_POST["escola_id"];
$tipo_ensino_mec_id = (int)$_POST["dado_mec_id"][0];

$tipo_esino_mec = new TiposEnsinoEscola();
$tipo_esino_escola_mec_busca = DAOFactory::getTiposEnsinoEscolaDAO()->queryAll("*","where escola_id=".$escola_id." and tipos_ensino_mec_id=".$tipo_ensino_mec_id."");

if($action=="insert"){
    if(!$tipo_esino_escola_mec_busca){//CASO NÃO TENHA ESSE DISCIPLINA VINCULADA EU INSIRO
        $tipo_esino_mec->escolaId = $escola_id;
        $tipo_esino_mec->tiposEnsinoMecId = $tipo_ensino_mec_id;
        DAOFactory::getTiposEnsinoEscolaDAO()->insert($tipo_esino_mec);
    }
}elseif($action=="remove"){

    DAOFactory::getTiposEnsinoEscolaDAO()->delete($tipo_esino_escola_mec_busca[0]->id);

}
?>