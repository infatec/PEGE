<?php
    verifica("../../login.php");
    if(!DAOFactory::getAnoEscolaDAO()->verificaAcesso(164))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Ano Escola";

    $classeMEC = "Ano";
    $classeEscola = "AnoEscola";
    $nome_vinculo = "Ano";

    $parametros_escola = array(
        "tabela_mec"=>"ano",
        "tabela_escola"=>"ano_escola",
        "chave_ligacao"=>"ano_id",
        "chave_ligacao_campo"=>"anoId"
    );

?> 
