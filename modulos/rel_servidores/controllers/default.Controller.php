<?php
    verifica("../../login.php");
    if(!DAOFactory::getServidorDAO()->verificaAcesso(162))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Relatório de Servidores";

