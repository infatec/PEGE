<?php	    
$tirar_incluir = true;

$sql_funcao='SELECT funcao_principal FROM servidor WHERE funcao_principal IS NOT NULL GROUP BY (funcao_principal)' ;
$sqlQueryFuncao = new SqlQuery($sql_funcao);
$funcoes = QueryExecutor::execute($sqlQueryFuncao);


?>