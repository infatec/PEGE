<?php
include("includes_ajax.php");

$action = $_POST["action"];
$escola_id = (int)$_POST["escola_id"];
$disciplina_mec_id = (int)$_POST["dado_mec_id"][0];

$disciplina_escola_mec = new DisciplinasEscola();
$disciplina_escola_mec_busca = DAOFactory::getDisciplinasEscolaDAO()->queryAll("*","where escola_id=".$escola_id." and disciplinas_mec_id=".$disciplina_mec_id."");

if($action=="insert"){
    if(!$disciplina_escola_mec_busca){//CASO NÃO TENHA ESSE DISCIPLINA VINCULADA EU INSIRO
        $disciplina_escola_mec->escolaId = $escola_id;
        $disciplina_escola_mec->disciplinasMecId = $disciplina_mec_id;
        DAOFactory::getDisciplinasEscolaDAO()->insert($disciplina_escola_mec);
    }
}elseif($action=="remove"){

    DAOFactory::getDisciplinasEscolaDAO()->delete($disciplina_escola_mec_busca[0]->id);

}
?>