<?php
    verifica("../../login.php");
    if(!DAOFactory::getAlunoDAO()->verificaAcesso(162))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Relat�rio de Alunos";

