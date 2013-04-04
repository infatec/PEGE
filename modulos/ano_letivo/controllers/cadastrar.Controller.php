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
        $ano_letivo = new AnoLetivo();
        
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
            $ano_letivo->created=date('Y-m-d H:i:s');
            $ano_letivo->status=1;
            DAOFactory::getAnoLetivoDAO()->insert($ano_letivo);
            $ano_letivo=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>