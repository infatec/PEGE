<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $tipos_dependencia_mec = DAOFactory::getTiposDependenciaMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>