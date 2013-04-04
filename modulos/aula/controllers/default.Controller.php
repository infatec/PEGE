<?php
    verifica("../../login.php");
    if(!DAOFactory::getAulaDAO()->verificaAcesso(173))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Lançamento de aulas";

?> 
