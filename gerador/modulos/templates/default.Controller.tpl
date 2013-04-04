<?php
    verifica("../../login.php");
    if(!DAOFactory::get${clazzName}DAO()->verificaAcesso(${chave_tabela}))
    {
        $_SESSION["msg_index"] = "Você não tem acesso nesse módulo.";
        redireciona("../../index.php");                  
    }
    $modulo="${clazzName}";

?> 
