<?php
    verifica("../../login.php");
    if(!DAOFactory::getCarteiraEstudantilDAO()->verificaAcesso(172))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Carteira Estudantil";

?> 
