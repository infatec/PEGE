<?php
    verifica("../../login.php");
    if(!DAOFactory::getUsuariosDAO()->verificaAcesso(22))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Usuarios";

?> 
