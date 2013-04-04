<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id',);//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
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
        $menus = new Menu();
        
		$menus->nome = $_POST['nome'];
		$menus->tipo = $_POST['tipo'];
		$menus->ordem = $_POST['ordem'];

        if(empty($erro))
        {
            $menus->created=date('Y-m-d H:i:s');
            $menus->status=1;
            DAOFactory::getMenusDAO()->insert($menus);
            $menus=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>