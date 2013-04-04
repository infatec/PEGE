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
        $carteira_estudantil = new CarteiraEstudantil();
        
		$carteira_estudantil->escolaId = $_POST['escola_id'];
		$carteira_estudantil->alunoId = $_POST['aluno_id'];
		$carteira_estudantil->turma = $_POST['turma'];
		$carteira_estudantil->turno = $_POST['turno'];
		$carteira_estudantil->matricula = $_POST['matricula'];
		$carteira_estudantil->foto = $_POST['foto'];

        if(empty($erro))
        {
            $carteira_estudantil->created=date('Y-m-d H:i:s');
            $carteira_estudantil->status=1;
            DAOFactory::getCarteiraEstudantilDAO()->insert($carteira_estudantil);
            $carteira_estudantil=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>