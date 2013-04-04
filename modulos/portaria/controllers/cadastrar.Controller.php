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
        $portaria = new Portaria();
        
		$portaria->servidorId = $_POST['servidor_id'];
		$portaria->dataEntrada = $_POST['data_entrada'];
		$portaria->horaEntrada = $_POST['hora_entrada'];
		$portaria->rg = $_POST['rg'];
		$portaria->alunoId = $_POST['aluno_id'];
		$portaria->modalidade = $_POST['modalidade'];

        if(empty($erro))
        {
            $portaria->created=date('Y-m-d H:i:s');
            $portaria->status=1;
            DAOFactory::getPortariaDAO()->insert($portaria);
            $portaria=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>