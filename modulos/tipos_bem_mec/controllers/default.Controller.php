<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposBemMecDAO()->verificaAcesso(144))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Bem Mec";

?> 
