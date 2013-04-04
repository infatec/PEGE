<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $tipos_frequencia_mec = DAOFactory::getTiposFrequenciaMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>