<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposFrequenciaEscolaDAO()->verificaAcesso(155))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Frequência Escola";

    $classeMEC = "TiposFrequenciaMec";
    $classeEscola = "TiposFrequenciaEscola";
    $nome_vinculo = "Tipos Frequência";

    $parametros_escola = array(
        "tabela_mec"=>"tipos_frequencia_mec",
        "tabela_escola"=>"tipos_frequencia_escola",
        "chave_ligacao"=>"tipos_frequencia_mec_id",
        "chave_ligacao_campo"=>"tiposFrequenciaMecId"
    );

?> 
