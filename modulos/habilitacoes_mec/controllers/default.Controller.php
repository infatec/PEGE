<?php
    verifica("../../login.php");
    if(!DAOFactory::getHabilitacoesMecDAO()->verificaAcesso(138))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Habilita��es Mec";

?> 
