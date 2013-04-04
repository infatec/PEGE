<?php	    
    //PARAMETROS PAGINAวรO
    $linhas_pagina = 25;
    $n_=(int)$_GET["n"] ? (int)$_GET["n"] : 1;
    $n_=(int)$_POST["n"] ? (int)$_POST["n"] : $n_;
    $begin = ($n_*$linhas_pagina)-$linhas_pagina;
    $top = $linhas_pagina+$begin;
    #######################
    
    #### FILTRO ############
    
    $campo_sel = $_GET["campo"];
	if(!empty($campo_sel))
	{
		$nome = $_GET['nome'];
		$operador = $_GET['operador'];
			
		if($operador=="qcon") $criterio .= "and ".$campo_sel." like '%".$nome."%'";
		if($operador=="qcom") $criterio .= "and ".$campo_sel." like '".$nome."%'";
		
		$parametros_url.= "&campo=".$campo_sel."&operador=".$operador."&".$campo_sel."=".$nome;
	}
     
    ########## 
        
    $tr = DAOFactory::getDistritosMecDAO()->count(" WHERE 1=1 ".$criterio."");//TOTAL DE REGISTROS COM CRITERIO
    $distritos_mecs = DAOFactory::getDistritosMecDAO()->queryAll(" *"," WHERE 1=1 ".$criterio." ORDER BY id DESC LIMIT ".$begin.",".$linhas_pagina." ");//PEGA TODOS OS REGISTROS COM O TOP
    
     
    if(isset($_SESSION["msg_index"])) 
    {
        $msg_index = $_SESSION["msg_index"];
        unset($_SESSION["msg_index"]);
    }
?>