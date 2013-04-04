<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposMaterialEscolaDAO()->verificaAcesso(157))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Material Escola";

    $classeMEC = "TiposMaterialMec";
    $classeEscola = "TiposMaterialEscola";
    $nome_vinculo = "Tipo Material";

    $parametros_escola = array(
        "tabela_mec"=>"tipos_material_mec",
        "tabela_escola"=>"tipos_material_escola",
        "chave_ligacao"=>"tipos_material_mec_id",
        "chave_ligacao_campo"=>"tiposMaterialMecId"
    );


?> 
