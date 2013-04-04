<?php
    verifica("../../login.php");
    if(!DAOFactory::getCargosEscolaDAO()->verificaAcesso(153))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Cargos Escola";

    $classeMEC = "CargosMec";
    $classeEscola = "CargosEscola";
    $nome_vinculo = "Cargos";

    $parametros_escola = array(
        "tabela_mec"=>"cargos_mec",
        "tabela_escola"=>"cargos_escola",
        "chave_ligacao"=>"cargos_mec_id",
        "chave_ligacao_campo"=>"cargosMecId"
    );

?> 
