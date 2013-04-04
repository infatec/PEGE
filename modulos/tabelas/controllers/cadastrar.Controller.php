<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id','tabela_id','tipo');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
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
        $tabelas = new Tabela();
        
		$tabelas->tabelaId = $_POST['tabela_id'];
		$tabelas->menuId = $_POST['menu_id'];
		$tabelas->nome = $_POST['nome'];
		$tabelas->pasta = $_POST['pasta'];

        if(empty($erro))
        {
            $tabelas->created=date('Y-m-d H:i:s');
            $tabelas->status=1;
            DAOFactory::getTabelasDAO()->insert($tabelas);
            $tabelas=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>