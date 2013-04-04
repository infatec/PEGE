<?php
    verifica("../../login.php");
    if(!DAOFactory::getConfiguracaoEscolaDAO()->verificaAcesso(147))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="ConfiguracaoEscola";

?> 
