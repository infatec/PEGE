<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposDependenciaMecDAO()->verificaAcesso(142))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Depend�ncia Mec";

?> 
