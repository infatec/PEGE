<?php
    verifica("../../login.php");
    if(!DAOFactory::getTurmaDAO()->verificaAcesso(168))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Registros Escolares Aluno";

?> 
