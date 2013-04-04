<?php
    verifica("../../login.php");
    if(!DAOFactory::getNivelEnsinoEscolaDAO()->verificaAcesso(151))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Nivel de Ensino Escola";

    $classeMEC = "NivelEnsinoMec";
    $classeEscola = "NivelEnsinoEscola";
    $nome_vinculo = "Nível de Ensino";

    $parametros_escola = array(
        "tabela_mec"=>"nivel_ensino_mec",
        "tabela_escola"=>"nivel_ensino_escola",
        "chave_ligacao"=>"nivel_ensino_mec_id",
        "chave_ligacao_campo"=>"nivelEnsinoMecId"
    );


?> 
