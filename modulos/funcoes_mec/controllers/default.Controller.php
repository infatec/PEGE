<?php
    verifica("../../login.php");
    if(!DAOFactory::getFuncoesMecDAO()->verificaAcesso(140))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Fun��es Mec";

?> 
