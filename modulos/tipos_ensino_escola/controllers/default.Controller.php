<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposEnsinoEscolaDAO()->verificaAcesso(149))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Ensino Escola";

?> 
