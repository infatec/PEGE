<?php
    verifica("../../login.php");
    if(!DAOFactory::getTurmaDAO()->verificaAcesso(168))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Registros Escolares Aluno";

?> 
