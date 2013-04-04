<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $carteira_estudantil = DAOFactory::getCarteiraEstudantilDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>