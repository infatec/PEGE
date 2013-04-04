<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposDependenciaMecDAO()->verificaAcesso(142))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Dependência Mec";

?> 
