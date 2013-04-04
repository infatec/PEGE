<?php
    verifica("../../login.php");
    if(!DAOFactory::getTabelasDAO()->verificaAcesso(72))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tabelas";

?> 
