<?php
    verifica("../../login.php");
    if(!DAOFactory::getDisciplinasEscolaDAO()->verificaAcesso(148))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Disciplinas Escola";

?> 
