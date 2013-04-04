<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $nivel_ensino_mec = DAOFactory::getNivelEnsinoMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>