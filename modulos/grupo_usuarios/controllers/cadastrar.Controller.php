<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
        #### faço a validação #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        } 
        ################
        $grupo_usuarios = new GrupoUsuario();
        
		$grupo_usuarios->tipo = $_POST['tipo'];
		$grupo_usuarios->nome = $_POST['nome'];
		$grupo_usuarios->descricao = $_POST['descricao'];

        if(empty($erro))
        {
            $grupo_usuarios->created=date('Y-m-d H:i:s');
            $grupo_usuarios->status=1;
            DAOFactory::getGrupoUsuariosDAO()->insert($grupo_usuarios);
            $grupo_usuarios=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>