<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposDependenciaEscolaDAO()->verificaAcesso(156))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Dependência Escola";

    $classeMEC = "TiposDependenciaMec";
    $classeEscola = "TiposDependenciaEscola";
    $nome_vinculo = "Tipo Dependência";

    $parametros_escola = array(
        "tabela_mec"=>"tipos_dependencia_mec",
        "tabela_escola"=>"tipos_dependencia_escola",
        "chave_ligacao"=>"tipos_dependencia_mec_id",
        "chave_ligacao_campo"=>"tiposDependenciaMecId"
    );

?> 
