<?php
    verifica("../../login.php");
    if(!DAOFactory::getNivelEnsinoMecDAO()->verificaAcesso(137))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Nivel de Ensino Mec";

?> 
