<?php
    verifica("../../login.php");
    if(!DAOFactory::getGrupoUsuariosDAO()->verificaAcesso(64))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Grupo de Usu�rios";

?> 
