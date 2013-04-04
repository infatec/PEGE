<?php
    verifica("../../login.php");
    if(!DAOFactory::getPortariaDAO()->verificaAcesso(171))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Portaria";

?> 
