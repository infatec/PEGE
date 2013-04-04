<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $menu = DAOFactory::getMenuDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>