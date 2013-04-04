<?php
    verifica("../../login.php");
    if(!DAOFactory::getGrupoUsuariosDAO()->verificaAcesso(64))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Grupo de Usuários";

?> 
