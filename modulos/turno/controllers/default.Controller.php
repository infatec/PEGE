<?php
    verifica("../../login.php");
    if(!DAOFactory::getTurnoDAO()->verificaAcesso(161))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Turno";

?> 
