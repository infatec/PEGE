<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposDespesaEscolaDAO()->verificaAcesso(159))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Despesa Escola";

    $classeMEC = "TiposDespesaMec";
    $classeEscola = "TiposDespesaEscola";
    $nome_vinculo = "Tipo Despesa";

    $parametros_escola = array(
        "tabela_mec"=>"tipos_despesa_mec",
        "tabela_escola"=>"tipos_despesa_escola",
        "chave_ligacao"=>"tipos_despesa_mec_id",
        "chave_ligacao_campo"=>"tiposDespesaMecId"
    );

?> 
