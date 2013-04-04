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
        $turma = new Turma();
        $turma->id=$id;
        
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
            DAOFactory::getTurmaDAO()->update($turma);
            $turma=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $turma = DAOFactory::getTurmaDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>