<?php
    verifica("../../login.php");
    if(!DAOFactory::getPortariaDAO()->verificaAcesso(171))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Portaria";

?> 
