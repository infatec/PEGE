<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposFrequenciaEscolaDAO()->verificaAcesso(155))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Frequ�ncia Escola";

    $classeMEC = "TiposFrequenciaMec";
    $classeEscola = "TiposFrequenciaEscola";
    $nome_vinculo = "Tipos Frequ�ncia";

    $parametros_escola = array(
        "tabela_mec"=>"tipos_frequencia_mec",
        "tabela_escola"=>"tipos_frequencia_escola",
        "chave_ligacao"=>"tipos_frequencia_mec_id",
        "chave_ligacao_campo"=>"tiposFrequenciaMecId"
    );

?> 
