<?php
    verifica("../../login.php");
    if(!DAOFactory::getTurnoDAO()->verificaAcesso(161))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Turno";

?> 
