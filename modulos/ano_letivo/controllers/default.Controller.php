<?php
    verifica("../../login.php");
    if(!DAOFactory::getAnoLetivoDAO()->verificaAcesso(165))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Ano Letivo";

?> 
