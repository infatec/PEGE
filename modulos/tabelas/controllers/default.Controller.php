<?php
    verifica("../../login.php");
    if(!DAOFactory::getTabelasDAO()->verificaAcesso(72))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tabelas";

?> 
