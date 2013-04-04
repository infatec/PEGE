<?php
    verifica("../../login.php");
    if(!DAOFactory::getModalidadeEnsinoEscolaDAO()->verificaAcesso(150))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Modalidade de Ensino Escola";

?> 
