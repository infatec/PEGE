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
        $tipos_frequencia_mec = new TiposFrequenciaMec();
        
		$tipos_frequencia_mec->codigo = $_POST['codigo'];
		$tipos_frequencia_mec->nome = $_POST['nome'];
		$tipos_frequencia_mec->individualEscola = $_POST['individual_escola'];

        if(empty($erro))
        {
            $tipos_frequencia_mec->created=date('Y-m-d H:i:s');
            $tipos_frequencia_mec->status=1;
            DAOFactory::getTiposFrequenciaMecDAO()->insert($tipos_frequencia_mec);
            $tipos_frequencia_mec=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>