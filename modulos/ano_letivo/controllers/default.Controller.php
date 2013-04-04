<?php
    verifica("../../login.php");
    if(!DAOFactory::getAnoLetivoDAO()->verificaAcesso(165))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Ano Letivo";

?> 
