<?php
    verifica("../../login.php");
    if(!DAOFactory::getTiposDespesaMecDAO()->verificaAcesso(145))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="Tipos de Despesas Mec";

?> 
