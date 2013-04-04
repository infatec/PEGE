<?php
    verifica("../../login.php");
    if(!DAOFactory::getDisciplinasMecDAO()->verificaAcesso(134))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Disciplinas Mec";

?> 
