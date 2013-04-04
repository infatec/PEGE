<?php
    verifica("../../login.php");
    if(!DAOFactory::getHabilitacoesMecDAO()->verificaAcesso(138))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Habilitações Mec";

?> 
