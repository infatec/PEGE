<?php
    verifica("../../login.php");
    if(!DAOFactory::getDistritosMecDAO()->verificaAcesso(133))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Distritos Mec";

?> 
