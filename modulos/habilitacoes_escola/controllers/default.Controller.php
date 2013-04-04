<?php
    verifica("../../login.php");
    if(!DAOFactory::getHabilitacoesEscolaDAO()->verificaAcesso(152))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Habilita��es Escola";

    $classeMEC = "HabilitacoesMec";
    $classeEscola = "HabilitacoesEscola";
    $nome_vinculo = "Habilita��es";

    $parametros_escola = array(
        "tabela_mec"=>"habilitacoes_mec",
        "tabela_escola"=>"habilitacoes_escola",
        "chave_ligacao"=>"habilitacoes_mec_id",
        "chave_ligacao_campo"=>"habilitacoesMecId"
    );

?> 
