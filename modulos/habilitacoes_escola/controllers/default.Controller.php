<?php
    verifica("../../login.php");
    if(!DAOFactory::getHabilitacoesEscolaDAO()->verificaAcesso(152))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Habilitações Escola";

    $classeMEC = "HabilitacoesMec";
    $classeEscola = "HabilitacoesEscola";
    $nome_vinculo = "Habilitações";

    $parametros_escola = array(
        "tabela_mec"=>"habilitacoes_mec",
        "tabela_escola"=>"habilitacoes_escola",
        "chave_ligacao"=>"habilitacoes_mec_id",
        "chave_ligacao_campo"=>"habilitacoesMecId"
    );

?> 
