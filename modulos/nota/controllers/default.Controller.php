<?php
    verifica("../../login.php");
    if(!DAOFactory::getNotaDAO()->verificaAcesso(174))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Lan�amento de Notas";

?> 
