<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposMaterialMecDAO()->verificaAcesso(143))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Material Mec";

?> 
