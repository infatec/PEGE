<?php
    verifica("../../login.php");
    if(!DAOFactory::getEscolaDAO()->verificaAcesso(146))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Escola";

