<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposMaterialMecDAO()->verificaAcesso(143))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Material Mec";

?> 
