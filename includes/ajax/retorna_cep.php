<?php
    include("../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");

	header("Content-type: text/html; charset=ISO-8859-1");
	verifica ("../../login.php");
	
	$cep = $_GET["cep"];
	$dados_cep_ar = busca_cep($cep);
	
	if($dados_cep_ar!=0)
	{
		foreach ($dados_cep_ar as $dados)
		{
			$dados_cep .= $dados."|";
		}
		echo $dados_cep;
	}
	else
	{
		echo 0;
	}
?>