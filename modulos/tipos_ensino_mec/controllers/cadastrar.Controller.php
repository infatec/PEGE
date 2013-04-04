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
        $tipos_ensino_mec = new TiposEnsinoMec();
        
		$tipos_ensino_mec->codigo = $_POST['codigo'];
		$tipos_ensino_mec->nome = $_POST['nome'];
		$tipos_ensino_mec->individualEscola = $_POST['individual_escola'];

        if(empty($erro))
        {
            $tipos_ensino_mec->created=date('Y-m-d H:i:s');
            $tipos_ensino_mec->status=1;
            DAOFactory::getTiposEnsinoMecDAO()->insert($tipos_ensino_mec);
            $tipos_ensino_mec=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>