<?php
    verifica("../../login.php");
    if(!DAOFactory::getDisciplinasMecDAO()->verificaAcesso(134))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Disciplinas Mec";

?> 
