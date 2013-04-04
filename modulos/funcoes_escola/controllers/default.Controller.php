<?php
    verifica("../../login.php");
    if(!DAOFactory::getFuncoesEscolaDAO()->verificaAcesso(154))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Funções Escola";

    $classeMEC = "FuncoesMec";
    $classeEscola = "FuncoesEscola";
    $nome_vinculo = "Funções";

    $parametros_escola = array(
        "tabela_mec"=>"funcoes_mec",
        "tabela_escola"=>"funcoes_escola",
        "chave_ligacao"=>"funcoes_mec_id",
        "chave_ligacao_campo"=>"funcoesMecId"
    );

?> 
