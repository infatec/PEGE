<?php
    verifica("../../login.php");
    if(!DAOFactory::getFuncoesEscolaDAO()->verificaAcesso(154))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Fun��es Escola";

    $classeMEC = "FuncoesMec";
    $classeEscola = "FuncoesEscola";
    $nome_vinculo = "Fun��es";

    $parametros_escola = array(
        "tabela_mec"=>"funcoes_mec",
        "tabela_escola"=>"funcoes_escola",
        "chave_ligacao"=>"funcoes_mec_id",
        "chave_ligacao_campo"=>"funcoesMecId"
    );

?> 
