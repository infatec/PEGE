<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $modalidade_ensino_mec = DAOFactory::getModalidadeEnsinoMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>