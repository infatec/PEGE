<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $${table_name} = DAOFactory::get${clazzName}DAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>