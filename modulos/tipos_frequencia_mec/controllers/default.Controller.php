<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposFrequenciaMecDAO()->verificaAcesso(141))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Frequ�ncia Mec";

?> 
