<?php
    verifica("../../login.php");
    if(!DAOFactory::getMatriculaDAO()->verificaAcesso(169))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Matricula";

?> 
