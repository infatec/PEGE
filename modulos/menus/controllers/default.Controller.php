<?php
    verifica("../../login.php");
    if(!DAOFactory::getMenusDAO()->verificaAcesso(71))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Menus";

?> 
