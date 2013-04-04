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
        $distritos_mec = new DistritosMec();
        
		$distritos_mec->codigo = $_POST['codigo'];
		$distritos_mec->nome = $_POST['nome'];
		$distritos_mec->uf = $_POST['uf'];

        if(empty($erro))
        {
            $distritos_mec->created=date('Y-m-d H:i:s');
            $distritos_mec->status=1;
            DAOFactory::getDistritosMecDAO()->insert($distritos_mec);
            $distritos_mec=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>