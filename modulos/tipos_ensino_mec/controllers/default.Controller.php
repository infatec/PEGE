<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposEnsinoMecDAO()->verificaAcesso(135))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Ensino Mec";

?> 
