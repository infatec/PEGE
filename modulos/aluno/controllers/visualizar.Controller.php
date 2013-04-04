<?php  
    $id=(int)$_GET["id"];   
    
    if (!empty($id))
	{
	   $aluno = DAOFactory::getAlunoDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
?>