<?php
    verifica("../../login.php");
    if(!DAOFactory::getModalidadeEnsinoMecDAO()->verificaAcesso(136))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Modalidade Ensino Mec";

?> 
