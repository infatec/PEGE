<?php
    verifica("../../login.php");
    if(!DAOFactory::getNivelEnsinoMecDAO()->verificaAcesso(137))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Nivel de Ensino Mec";

?> 
