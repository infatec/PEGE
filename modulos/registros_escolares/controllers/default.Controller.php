<?php
    verifica("../../login.php");
    if(!DAOFactory::getTurmaDAO()->verificaAcesso(167))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Registros Escolares";

?> 
