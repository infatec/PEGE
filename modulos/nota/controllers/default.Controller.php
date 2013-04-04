<?php
    verifica("../../login.php");
    if(!DAOFactory::getNotaDAO()->verificaAcesso(174))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Lançamento de Notas";

?> 
