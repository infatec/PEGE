<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $tipos_bem_mec = DAOFactory::getTiposBemMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>