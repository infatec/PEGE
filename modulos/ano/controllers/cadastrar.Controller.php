<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id');//AQUI VOU COLOCAR OS CAMPOS QUE N�O PRECISAM SER VALIDADOS
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
        $ano = new Ano();
        
		$ano->nivelEnsinoMecId = $_POST['nivel_ensino_mec_id'];
		$ano->codigo = $_POST['codigo'];
		$ano->nome = $_POST['nome'];
        $ano->idadeCorreta = $_POST['idade_correta'];
		$ano->individualEscola = $_POST['individual_escola'];

        if(empty($erro))
        {
            $ano->created=date('Y-m-d H:i:s');
            $ano->status=1;
            DAOFactory::getAnoDAO()->insert($ano);
            $ano=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>