<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposBemEscolaDAO()->verificaAcesso(158))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Bem Escola";

    $classeMEC = "TiposBemMec";
    $classeEscola = "TiposBemEscola";
    $nome_vinculo = "Tipo Bem";

    $parametros_escola = array(
        "tabela_mec"=>"tipos_bem_mec",
        "tabela_escola"=>"tipos_bem_escola",
        "chave_ligacao"=>"tipos_bem_mec_id",
        "chave_ligacao_campo"=>"tiposBemMecId"
    );

?> 
