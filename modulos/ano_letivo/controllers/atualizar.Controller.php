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
        $ano_letivo = new AnoLetivo();
        $ano_letivo->id=$id;
        
		$ano_letivo->escolaId = $_POST['escola_id'];
		$ano_letivo->identificacao = $_POST['identificacao'];
        $ano_letivo->dataInicioMatricula = geradatamy($_POST['data_inicio_matricula']);
        $ano_letivo->dataFimMatricula = geradatamy($_POST['data_fim_matricula']) ;
        $ano_letivo->dataInicioAula = geradatamy($_POST['data_inicio_aulas']);
        $ano_letivo->dataFimAula = geradatamy($_POST['data_fim_aulas']);
        $ano_letivo->dataFimPrimeiroSemestre = geradatamy($_POST['data_fim_primeiro_semestre']);
        $ano_letivo->situacao = $_POST['situacao'];
        $ano_letivo->dataInicioSegundoSemestre = geradatamy($_POST['data_inicio_segundo_semestre']);
 
               
        if(empty($erro))
        {
            DAOFactory::getAnoLetivoDAO()->update($ano_letivo);
            $ano_letivo=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $ano_letivo = DAOFactory::getAnoLetivoDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>