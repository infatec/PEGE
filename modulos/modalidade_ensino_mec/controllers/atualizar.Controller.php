<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	} 
   
    $id=(int)$_GET["id"];   
    if($_POST["acao"])
    {
        $not_validacao=array('individual_escola');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
        #### faço a validação #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        } 
        ##################
        $id=(int)$_POST["id"];
        $modalidade_ensino_mec = new ModalidadeEnsinoMec();
        $modalidade_ensino_mec->id=$id;
        
		$modalidade_ensino_mec->codigo = $_POST['codigo'];
		$modalidade_ensino_mec->nome = $_POST['nome'];
		$modalidade_ensino_mec->individualEscola = $_POST['individual_escola'] ? "S" : "N" ;
 
               
        if(empty($erro))
        {
            DAOFactory::getModalidadeEnsinoMecDAO()->update($modalidade_ensino_mec);
            $modalidade_ensino_mec=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $modalidade_ensino_mec = DAOFactory::getModalidadeEnsinoMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>