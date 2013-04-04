<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $cargos_mec = DAOFactory::getCargosMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>