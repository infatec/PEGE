<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $configuracao_escola = DAOFactory::getConfiguracaoEscolaDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>