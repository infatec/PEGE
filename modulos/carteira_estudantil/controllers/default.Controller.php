<?php
    verifica("../../login.php");
    if(!DAOFactory::getCarteiraEstudantilDAO()->verificaAcesso(172))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Carteira Estudantil";

?> 
