<?php
include("includes_ajax.php");

$action = $_POST["action"];
$escola_id = (int)$_POST["escola_id"];
$dado_mec_id = (int)$_POST["dado_mec_id"][0];

$daoEscola = "get".$classeEscola."DAO";

$dado_escola_mec = new $classeEscola();
$dado_escola_mec_busca = DAOFactory::$daoEscola()->queryAll("*","where escola_id=".$escola_id." and ".$parametros_escola["chave_ligacao"]."=".$dado_mec_id."");

if($action=="insert"){
    if(!$dado_escola_mec_busca){//CASO NÃO TENHA ESSE DISCIPLINA VINCULADA EU INSIRO
        $dado_escola_mec->escolaId = $escola_id;
        $dado_escola_mec->$parametros_escola["chave_ligacao_campo"] = $dado_mec_id;
        DAOFactory::$daoEscola()->insert($dado_escola_mec);
    }
}elseif($action=="remove"){

    DAOFactory::$daoEscola()->delete($dado_escola_mec_busca[0]->id);

}
?>