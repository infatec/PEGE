<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id','individual_escola');//AQUI VOU COLOCAR OS CAMPOS QUE N�O PRECISAM SER VALIDADOS
        #### fa�o a valida��o #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        } 
        ################
        $tipos_despesa_mec = new TiposDespesaMec();
        
		$tipos_despesa_mec->codigo = $_POST['codigo'];
		$tipos_despesa_mec->nome = $_POST['nome'];
		$tipos_despesa_mec->individualEscola = $_POST['individual_escola'];

        if(empty($erro))
        {
            $tipos_despesa_mec->created=date('Y-m-d H:i:s');
            $tipos_despesa_mec->status=1;
            DAOFactory::getTiposDespesaMecDAO()->insert($tipos_despesa_mec);
            $tipos_despesa_mec=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>