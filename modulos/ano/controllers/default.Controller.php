<?php
    verifica("../../login.php");
    if(!DAOFactory::getAnoDAO()->verificaAcesso(163))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Ano";

?> 
