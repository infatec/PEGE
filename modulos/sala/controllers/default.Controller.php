<?php
    verifica("../../login.php");
    if(!DAOFactory::getSalaDAO()->verificaAcesso(160))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Sala";

?> 
