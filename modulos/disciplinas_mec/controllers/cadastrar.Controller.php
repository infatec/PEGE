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
        $disciplinas_mec = new DisciplinasMec();
        
		$disciplinas_mec->codigo = $_POST['codigo'];
		$disciplinas_mec->nome = $_POST['nome'];
		$disciplinas_mec->individualEscola = $_POST['individual_escola'];

        if(empty($erro))
        {
            $disciplinas_mec->created=date('Y-m-d H:i:s');
            $disciplinas_mec->status=1;
            DAOFactory::getDisciplinasMecDAO()->insert($disciplinas_mec);
            $disciplinas_mec=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>