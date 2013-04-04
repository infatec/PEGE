<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $tipos_despesa_mec = DAOFactory::getTiposDespesaMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>