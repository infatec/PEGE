<?php
include("includes_ajax.php");

$action = $_POST["action"];
$escola_id = (int)$_POST["escola_id"];
$dado_mec_id = (int)$_POST["dado_mec_id"][0];

$dado_escola_mec = new ModalidadeEnsinoEscola();
$dado_escola_mec_busca = DAOFactory::getModalidadeEnsinoEscolaDAO()->queryAll("*","where escola_id=".$escola_id." and modalidade_ensino_mec_id=".$dado_mec_id."");

if($action=="insert"){
    if(!$dado_escola_mec_busca){//CASO NÃO TENHA ESSE DISCIPLINA VINCULADA EU INSIRO
        $dado_escola_mec->escolaId = $escola_id;
        $dado_escola_mec->modalidadeEnsinoMecId = $dado_mec_id;
        DAOFactory::getModalidadeEnsinoEscolaDAO()->insert($dado_escola_mec);
    }
}elseif($action=="remove"){

    DAOFactory::getModalidadeEnsinoEscolaDAO()->delete($dado_escola_mec_busca[0]->id);

}
?>