<?php
    verifica("../../login.php");
    if(!DAOFactory::getCargosMecDAO()->verificaAcesso(139))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Cargos Mec";

?> 
