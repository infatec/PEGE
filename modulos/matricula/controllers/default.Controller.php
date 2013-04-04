<?php
    verifica("../../login.php");
    if(!DAOFactory::getMatriculaDAO()->verificaAcesso(169))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Matricula";

?> 
