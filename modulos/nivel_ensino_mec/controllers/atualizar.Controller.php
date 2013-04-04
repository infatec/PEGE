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
        $nivel_ensino_mec = new NivelEnsinoMec();
        $nivel_ensino_mec->id=$id;
        
		$nivel_ensino_mec->modalidadeEnsinoMecId = $_POST['modalidade_ensino_mec_id'];
		$nivel_ensino_mec->codigo = $_POST['codigo'];
		$nivel_ensino_mec->individualEscola = $_POST['individual_escola'] ? "S" : "N" ;
		$nivel_ensino_mec->nome = $_POST['nome'];
 
               
        if(empty($erro))
        {
            DAOFactory::getNivelEnsinoMecDAO()->update($nivel_ensino_mec);
            $nivel_ensino_mec=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $nivel_ensino_mec = DAOFactory::getNivelEnsinoMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>