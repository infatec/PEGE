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
        $not_validacao=array();//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
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
        $ano = new Ano();
        $ano->id=$id;
        
		$ano->nivelEnsinoMecId = $_POST['nivel_ensino_mec_id'];
		$ano->codigo = $_POST['codigo'];
		$ano->nome = $_POST['nome'];
        $ano->idadeCorreta = $_POST['idade_correta'];
        $ano->individualEscola = $_POST['individual_escola'] ? "S" : "N" ;

        if(empty($erro))
        {
            DAOFactory::getAnoDAO()->update($ano);
            $ano=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $ano = DAOFactory::getAnoDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>