<?php
    verifica("../../login.php");
    if(!DAOFactory::getDisciplinasEscolaDAO()->verificaAcesso(148))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Disciplinas Escola";

?> 
