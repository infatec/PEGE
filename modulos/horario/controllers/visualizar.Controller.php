<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $horario = DAOFactory::getHorarioDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>