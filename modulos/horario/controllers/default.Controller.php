<?php
    verifica("../../login.php");
    if(!DAOFactory::getHorarioDAO()->verificaAcesso(166))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Hor�rio";

?> 
