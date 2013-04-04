<?php
    verifica("../../login.php");
    if(!DAOFactory::getCargosMecDAO()->verificaAcesso(139))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Cargos Mec";

?> 
