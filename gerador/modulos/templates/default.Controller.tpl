<?php
    verifica("../../login.php");
    if(!DAOFactory::get${clazzName}DAO()->verificaAcesso(${chave_tabela}))
    {
        $_SESSION["msg_index"] = "Voc� n�o tem acesso nesse m�dulo.";
        redireciona("../../index.php");                  
    }
    $modulo="${clazzName}";

?> 
