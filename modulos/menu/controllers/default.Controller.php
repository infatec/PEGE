<?php
    verifica("../../login.php");
    if(!DAOFactory::getMenuDAO()->verificaAcesso(99))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Menu";

?> 
