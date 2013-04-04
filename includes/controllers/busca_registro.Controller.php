<?php
	verifica("../login.php");    
     
    $tabela = $_GET["tabela"];
	$modulo = $_GET["modulo"];
	$campo = $_GET["campo"];
	
	$campo_id = $_GET["campo_id"];
	$campo_nome = $_GET["campo_nome"];
    $criterio = $_GET["criterio"];
	
	if(empty($campo_id)) $campo_id = $tabela."_id";
	if(empty($campo_nome)) $campo_nome =$tabela."_nome";
	
	if(empty($campo)) $campo="descricao";
	
	//$queryString.= "&tabela=".$tabela."modulo&=".$modulo;
	
    $criterio1 = " WHERE 1=1 ";
    
    $criterio1 .= $criterio." ";
    
	$campo_sel = $_GET["campo_sel"];
	
	if(!empty($campo_sel))
	{
		$nome = $_GET['nome'];
		$operador = $_GET['operador'];
	     		
		if($operador=="qcon") $criterio1 .= "and ".$campo_sel." like '%".$nome."%'";
		if($operador=="qcom") $criterio1 .= "and ".$campo_sel." like '".$nome."%'";
		
		$queryString.= "&".$campo_sel."=".$nome;
		
	}
    $sql='SELECT id,'.$campo.' FROM '.$tabela.' '.$criterio1.' LIMIT 0,100' ;
    $sqlQuery = new SqlQuery($sql);
    $rs = QueryExecutor::execute($sqlQuery);//PEGA TODOS OS REGISTROS COM O TOP
?>