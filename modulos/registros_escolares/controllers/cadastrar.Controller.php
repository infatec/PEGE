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
        $turma = new Turma();
        
		$turma->codigo = $_POST['codigo'];
		$turma->nivelEnsinoMecId = $_POST['nivel_ensino_mec_id'];
		$turma->turnoId = $_POST['turno_id'];
		$turma->anoId = $_POST['ano_id'];
		$turma->numMaxAluno = $_POST['num_max_aluno'];
		$turma->escolaId = $_POST['escola_id'];
		$turma->anoLetivoId = $_POST['ano_letivo_id'];
		$turma->salaId = $_POST['sala_id'];

        if(empty($erro))
        {
            $turma->created=date('Y-m-d H:i:s');
            $turma->status=1;
            DAOFactory::getTurmaDAO()->insert($turma);
            $turma=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>