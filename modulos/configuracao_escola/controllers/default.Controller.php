<?php
    verifica("../../login.php");
    if(!DAOFactory::getConfiguracaoEscolaDAO()->verificaAcesso(147))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="ConfiguracaoEscola";

?> 
