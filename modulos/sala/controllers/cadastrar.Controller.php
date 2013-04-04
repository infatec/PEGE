<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id','capacidade','localizacao');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
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
        $sala = new Sala();
        
		$sala->escolaId = $_POST['escola_id'];
		$sala->nome = $_POST['nome'];
		$sala->capacidade = $_POST['capacidade'];
		$sala->localizacao = $_POST['localizacao'];

        if(empty($erro))
        {
            $sala->created=date('Y-m-d H:i:s');
            $sala->status=1;
            DAOFactory::getSalaDAO()->insert($sala);
            $sala=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>