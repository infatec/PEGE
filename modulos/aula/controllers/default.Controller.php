<?php
    verifica("../../login.php");
    if(!DAOFactory::getAulaDAO()->verificaAcesso(173))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Lan�amento de aulas";

?> 
