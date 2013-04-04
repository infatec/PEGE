<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id','individual_escola');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
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
        $cargos_mec = new CargosMec();
        
		$cargos_mec->codigo = $_POST['codigo'];
		$cargos_mec->nome = $_POST['nome'];
		$cargos_mec->individualEscola = $_POST['individual_escola'];

        if(empty($erro))
        {
            $cargos_mec->created=date('Y-m-d H:i:s');
            $cargos_mec->status=1;
            DAOFactory::getCargosMecDAO()->insert($cargos_mec);
            $cargos_mec=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>