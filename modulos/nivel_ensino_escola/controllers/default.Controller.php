<?php
    verifica("../../login.php");
    if(!DAOFactory::getNivelEnsinoEscolaDAO()->verificaAcesso(151))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Nivel de Ensino Escola";

    $classeMEC = "NivelEnsinoMec";
    $classeEscola = "NivelEnsinoEscola";
    $nome_vinculo = "N�vel de Ensino";

    $parametros_escola = array(
        "tabela_mec"=>"nivel_ensino_mec",
        "tabela_escola"=>"nivel_ensino_escola",
        "chave_ligacao"=>"nivel_ensino_mec_id",
        "chave_ligacao_campo"=>"nivelEnsinoMecId"
    );


?> 
