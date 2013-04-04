<?php
    verifica("../../login.php");
    if(!DAOFactory::getMenuDAO()->verificaAcesso(99))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Menu";

?> 
