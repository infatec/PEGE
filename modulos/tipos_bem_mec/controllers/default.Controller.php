<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposBemMecDAO()->verificaAcesso(144))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Bem Mec";

?> 
