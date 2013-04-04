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
        $carteira_estudantil = new CarteiraEstudantil();
        $carteira_estudantil->id=$id;
        
		$carteira_estudantil->escolaId = $_POST['escola_id'];
		$carteira_estudantil->alunoId = $_POST['aluno_id'];
		$carteira_estudantil->turma = $_POST['turma'];
		$carteira_estudantil->turno = $_POST['turno'];
		$carteira_estudantil->matricula = $_POST['matricula'];
		$carteira_estudantil->foto = $_POST['foto'];
 
               
        if(empty($erro))
        {
            DAOFactory::getCarteiraEstudantilDAO()->update($carteira_estudantil);
            $carteira_estudantil=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $carteira_estudantil = DAOFactory::getCarteiraEstudantilDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>