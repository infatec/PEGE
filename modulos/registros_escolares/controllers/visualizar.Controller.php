<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $turma = DAOFactory::getTurmaDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>