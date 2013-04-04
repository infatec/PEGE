<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposFrequenciaMecDAO()->verificaAcesso(141))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Frequência Mec";

?> 
