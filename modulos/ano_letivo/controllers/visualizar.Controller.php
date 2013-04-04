<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $ano_letivo = DAOFactory::getAnoLetivoDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>