<?php
    verifica("../../login.php");
    if(!DAOFactory::getCedDAO()->verificaAcesso(170))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Ced - Controle Eletrônico de Documentos";

?> 
