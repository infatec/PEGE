<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $grupo_usuarios = DAOFactory::getGrupoUsuariosDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>