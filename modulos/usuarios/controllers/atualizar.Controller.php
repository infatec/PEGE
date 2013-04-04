<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	} 
   
    $id=(int)$_GET["id"];   
    if($_POST["acao"])
    {
        $not_validacao=array('fone');//AQUI VOU COLOCAR OS CAMPOS QUE N�O PRECISAM SER VALIDADOS
        #### fa�o a valida��o #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        } 
        ##################
        if(count($usuarios_login)>0){
             $erro['login_existe'] = "input_erro";
             $msg_erro .= "Esse login j� existe.<br>"; 
        }
        if(strlen($_POST['senha'])<6)
		{
			$msg_erro .= " O tamanho da senha n&atilde;o deve ser inferior a 6 caracteres";
			$erro['senha_peq'] = "input_erro";
		}
        $id=(int)$_POST["id"];
        $usuarios = new Usuario();
        $usuarios->id=$id;
        
		$usuarios->grupoId = $_POST['grupo_usuarios_id'];
		$usuarios->login = $_POST['login'];
		$usuarios->senha = geraSenha($_POST['senha'],$_POST["login"]);
		$usuarios->nome = $_POST['nome'];
		$usuarios->email = $_POST['email'];
		$usuarios->fone = $_POST['fone'];
		$usuarios->celular = $_POST['celular'];
        $usuarios->permissaoNoticia = $_POST["permissao"];
 
               
        if(empty($erro))
        {
            DAOFactory::getUsuariosDAO()->update($usuarios);
            $usuarios=NULL;
            $_SESSION["msg_index"] = "Altera��o realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $usuarios = DAOFactory::getUsuariosDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>