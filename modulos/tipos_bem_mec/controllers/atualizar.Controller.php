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
        $not_validacao=array('individual_escola');//AQUI VOU COLOCAR OS CAMPOS QUE N�O PRECISAM SER VALIDADOS
        #### fa�o a valida��o #####
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
        $tipos_bem_mec = new TiposBemMec();
        $tipos_bem_mec->id=$id;
        
		$tipos_bem_mec->codigo = $_POST['codigo'];
		$tipos_bem_mec->nome = $_POST['nome'];
		$tipos_bem_mec->individualEscola = $_POST['individual_escola'] ? "S" : "N" ;
 
               
        if(empty($erro))
        {
            DAOFactory::getTiposBemMecDAO()->update($tipos_bem_mec);
            $tipos_bem_mec=NULL;
            $_SESSION["msg_index"] = "Altera��o realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $tipos_bem_mec = DAOFactory::getTiposBemMecDAO()->load($id);   	
	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>