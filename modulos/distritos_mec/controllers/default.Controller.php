<?php
    verifica("../../login.php");
    if(!DAOFactory::getDistritosMecDAO()->verificaAcesso(133))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Distritos Mec";

?> 
