<?php
    verifica("../../login.php");
    if(!DAOFactory::getCedDAO()->verificaAcesso(170))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Ced - Controle Eletr�nico de Documentos";

?> 
