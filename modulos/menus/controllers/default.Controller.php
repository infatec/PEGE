<?php
    verifica("../../login.php");
    if(!DAOFactory::getMenusDAO()->verificaAcesso(71))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Menus";

?> 
