<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposDespesaMecDAO()->verificaAcesso(145))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Despesas Mec";

?> 
