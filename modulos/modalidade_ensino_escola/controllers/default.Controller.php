<?php
    verifica("../../login.php");
    if(!DAOFactory::getModalidadeEnsinoEscolaDAO()->verificaAcesso(150))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Modalidade de Ensino Escola";

?> 
