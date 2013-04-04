<?php
	 
    if($_SESSION["permissao_temp"]<3)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	} 
    
    $id=$_POST["id"]; 
    if($_POST["acao"])
    {
        $trans = new Transaction();
        foreach($id as $value)
        {
            $result=DAOFactory::getUsuariosDAO()->delete($value);
            if(!$result) 
            {
                $trans->rollback();
                $erro=1;
                break;
            }             
        } 
        if(!$erro) $trans->commit();
        
        $trans=NULL;
        if(empty($erro)) $_SESSION["msg_index"] = "Registro(s) removidos com sucesso.";
        else $_SESSION["msg_index"] = "Problemas ao remover registro(s).";             
        redireciona("index.php");
        exit;
                
    }
    
    if($_POST["id"])//AQUI VOU PERCORRER OS REGISTROS QUE FORAM SELECIONADOS E CARREGA-LOS EM UM ARRAY COM SEUS DEVIDOS OBJETOS
    {
        $usuarioss=array();
        //$id = $_POST["id"];
        foreach($id as $dados)
        {
           $usuarios = DAOFactory::getUsuariosDAO()->load($dados);
           if(empty($usuarios)) 
           {
             $_SESSION["msg_index"] = 'Registro não existe.';
             redireciona("index.php");
             exit;   
           }
           $usuarioss[]=$usuarios;
        }            
    }
    else
	{
		$_SESSION["msg_index"] = 'Selecione algum registro';
		redireciona("index.php");
        exit;
	}
 
?>