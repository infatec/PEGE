<?
/**
 * FunÁ„o para importar todos os arquivos das classes! 
 *
 * @param string $Name
 * 
 */
 
function textInline($text) {
	
		$text = str_replace("\n","",$text);
		$text = str_replace("\r","",$text);
		$text = addslashes($text);
		
		return $text;
	
	} 

function debuga($ar){
    echo "<pre>";
    var_dump($ar);
}

function import($name)
{
    
    require_once(DOMAIN_PATH.'models/class/dao/'.$name.'DAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/'.$name.'.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/'.$name.'DAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/'.$name.'ExtDAO.class.php');
}

function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

 function calc_idade($data_nasc,$separador="-"){

	$data_nasc = explode($separador, $data_nasc);
	
	$data = date("d-m-Y");
	$data = explode("-", $data);
	$anos = $data[2] - $data_nasc[2];
	
	if ( $data_nasc[1] >= $data[1] ){
	
		if ( $data_nasc[0] <= $data[0] ){
			return $anos;
		}else{
			return $anos-1;

		}
		}else{
		
			return $anos;
	}
}

function CalcularIdade($nascimento,$formato,$separador)
{
    //Data Nascimento
    $nascimento = explode($separador, $nascimento);

    if ($data1>$data2)
    {
        return " ";
    }

    if ($formato=="dma")
    {
        $ano = $nascimento[2];
        $mes = $nascimento[1];
        $dia = $nascimento[0];
    }
    elseif ($formato=="amd")
    {
        $ano = $nascimento[0];
        $mes = $nascimento[1];
        $dia = $nascimento[2];
    }

    $dia1 = $dia;
    $mes1 = $mes;
    $ano1 = $ano;

    $dia2 = date("d");
    $mes2 = date("m");
    $ano2 = date("Y");

    $dif_ano = $ano2 - $ano1;
    $dif_mes = $mes2 - $mes1;
    $dif_dia = $dia2 - $dia1;

    if ( ($dif_mes == 0) and ($dia2 < $dia1) ) {
        $dif_dia = (ultimoDiaMes($data1) - $dia1) + $dia2;
        $dif_mes = 11;
        $dif_ano--;
    } elseif ($dif_mes < 0) {
        $dif_mes = (12 - $mes1) + $mes2;
        $dif_ano--;
        if ($dif_dia<0){
            $dif_dia = (ultimoDiaMes($data1) - $dia1) + $dia2;
            $dif_mes--;
        }
    } elseif ($dif_dia < 0) {
        $dif_dia = (ultimoDiaMes($data1) - $dia1) + $dia2;
        if ($dif_mes>0) {
            $dif_mes--;
        }
    }
    if ($dif_ano>0) {
        $dif_ano = $dif_ano . " ano" . (($dif_ano>1) ? "s ": " ") ;
    } else { $dif_ano = ""; }
    if ($dif_mes>0) {
        $dif_mes = $dif_mes . " mes" . (($dif_mes>1) ? "es ": " ") ;
    } else { $dif_mes = ""; }
    if ($dif_dia>0) {
        $dif_dia = $dif_dia . " dia" . (($dif_dia>1) ? "s ": " ") ;
    } else { $dif_dia = ""; }

    return $dif_ano;

}
	
function ultimoDiaMes($data=""){
    if (!$data) {
       $dia = date("d");
       $mes = date("m");
       $ano = date("Y");
    } else {
       $dia = date("d",$data);
       $mes = date("m",$data);
       $ano = date("Y",$data);
    }
    $data = mktime(0, 0, 0, $mes, 1, $ano);
    return date("d",$data-1);
  }

	//corta um texto de acordo com a quantidade de carecteres selecionado
	function cortaTexto ($texto,$caracteres)
	{	
		if (strlen($texto) >= $caracteres)  
		{ 
			$texto = substr($texto,0,$caracteres).'...';   
		} 
		return $texto;
	}
	
	function redireciona ($pagina){
		echo "<script language='javascript'>document.location='$pagina';</script>";
	}
	function voltar ($pagina)
	{
		echo "<script language='javascript'>history.go($pagina);</script>";
	}
	
	function getmicrotime()
	{
		list($sec, $usec) = explode(" ",microtime());
		return ($sec + $usec);
	}
	
	// tempo de execucao
	function tempoDeLoad()
	{
		list($sec, $usec) = explode(" ",microtime());
		return ($sec + $usec);
	}
	
	#######################

	function unsetSession()
	{
		session_start();
		unset($_SESSION["idusuario_mvf_g"],$_SESSION["Tabela"],$_SESSION["idtipo_mvf_g"],$_SESSION["loginusuario_mvf_g"],$_SESSION["nomeusuario_mvf_g"],$_SESSION["emailusuario_mvf_g"],$_SESSION["ultimoacessousuario_mvf_g"],$_SESSION["acessosusuario_mvf_g"],$_SESSION["timeout_mvf_g"]);
	}
	
	function geraSenha($senha, $login=NULL)
	{
		if(empty($login))		
		{
			$salt = '102d10d54sdsdhf4f5f54f50f5s4f4505f';
			$gera_pass = sha1($salt.$senha.'GÍnesis');
		}
		else
		{
			$salt = "0c8a1ca3e1316de28f8af408a684284c";
			$gera_pass = md5($login.$salt.$senha);
		}		
		
		return $gera_pass;
	}
		/**
	 * Verifica se a sess„o j· expirou
     * @param String pagina  
     * 
	 */
	function verifica ($pagina)
	{
		
		$tempo = $GLOBALS["tempoSessao_g"];
		if(!isset($_SESSION["idusuario_mvf_g"]))
		{
			header("Location: ".$pagina);
			exit;
		}
		$limite  = time()-($tempo); //em segundos
		if ($_SESSION["timeout_mvf_g"] > $limite) 
		{
			$_SESSION["timeout_mvf_g"] = time(); ///Inicializa novo tempo da sessao
		}
		else 
		{
			expirou ();
		exit;
		}
	}
	
    function verificaAluno()
	{
		
		$tempo = $GLOBALS["tempoSessao_g"];
		if(!isset($_SESSION["matricula"]))
		{
			header("Location: login.php");
			exit;
		}
		
	}
    
	function logoff ()
	{
		unsetSession();
		tabelaValidacaoLogin("Sess„o finalizada com sucesso!");
	}
	
	function expirou (){
		session_start();
		session_destroy();
		tabelaValidacaoLogin("Sua Sess„o expirou!");
	}
	function loginErrado (){
		tabelaValidacaoLogin("Login ou senha inv·lidos!");
	}


    function botaoEnviar()
	{
		if (($_SESSION["permissao_temp"]==3))
		{ ?><title>secoes</title>
			<br><br><center><input name="Submit" type="submit" class="botao_branco" value="Gravar"></center><br><br>
	<? 	}
	}
	function botaoRemover()
	{
		if (($_SESSION["permissao_temp"]==3))
		{ ?>
			<input type="submit" name="remover_" value="Remover" class="botao_branco"> 
			<input type="hidden" name="remover" value="remover" class="input_branco">
	<? 	}
	}
	function botaoEscolher()
	{
		if (($_SESSION["permissao_temp"]==3))
		{ ?>
			<input type="submit" name="remover_" value="Escolher" class="botao_branco"> 
			<input type="hidden" name="remover" value="remover" class="input_branco">
	<? 	}
	}
	
	function botaoSim()
	{
		if (($_SESSION["permissao_temp"]==3))
		{ 
	       echo '<center><input type="hidden" name="deletar"><input name="Submit" type="submit" class="botao_branco" value="Sim"></center>';
	 	}
	}
	function botaoNao()
	{
		if (($_SESSION["permissao_temp"]>=1))
		{ 
			echo '<center><input name="Submit" type="button" class="botao_branco" value="N„o" onclick="document.location=\'index.php\'"></center>';
	 	}
	}
	function botaoCheckbox($valor)
	{
		if (($_SESSION["permissao_temp"]==3))
		{ 
			return '<input type="checkbox" name="id[]" value="'.$valor.'">';
		}
	}
	function alert($mensagem)
	{
		echo '<script>alert("'.$mensagem.'");</script>';
	}

	function nome($extensao,$pasta)
	{		
		$temp = substr(md5(uniqid(time())), 0, 10);
		$imagem_nome = $temp . "." . $extensao;

		if(file_exists($pasta . $imagem_nome))
		{
			$imagem_nome = nome($extensao,$pasta);
		}
		return $imagem_nome;
	}				
	function fazUploadFile($name,$extensoes_validas,$caminho)
	{
		
        $filetemp = $_FILES[$name]["tmp_name"];
    	$filename = $_FILES[$name]['name'];
    	$filesize = $_FILES[$name]['size'];
    	$filetype = $_FILES[$name]['type'];
    	$extensao_arquivo = end(explode(".",$filename));
    	$dir = $caminho;
        $nome_arquivo = nome($extensao_arquivo,$dir);
        
       // if(!in_array($extensao_arquivo,$extensoes_validas)) return false;
        
       	if (empty($erro))
    	{
    		if(is_uploaded_file($_FILES[$name]['tmp_name']))
            {
                
                if(move_uploaded_file($_FILES[$name]['tmp_name'], $dir.$nome_arquivo))
                {
                    return $nome_arquivo;
                }
                else
                {
                    return false;
                }
            
            }
            else
            {
                return false;
            }
	   }
        
        
	}
	function retirar_acentos_caracteres_especiais($string) {
		$palavra = strtr($string, "äåéöúûü•µ¿¡¬√ƒ≈∆«»… ÀÃÕŒœ–—“”‘’÷ÿŸ⁄€‹›ﬂ‡·‚„‰ÂÊÁËÈÍÎÏÌÓÔÒÚÛÙıˆ¯˘˙˚¸˝ˇ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
		$palavranova = str_replace("_", " ", $palavra);
	   return $palavranova; 
	}
	function gerarandonstring($n){
		$str = "ABCDEFGHIJLMNOPQRSTUVXZYWKabcdefghjlmnopqrstuvxzywk0123456789_-";
		$cod = "";
		for($a = 0;$a < $n;$a++){
		$rand = rand(0,63);
		$cod .= substr($str,$rand,1);}
		return $cod;
	}
	function verificaTagString($str)//verifica se tem tags html ou php
	{
		return strip_tags($str);
	}
	function removeArrPos(&$array, $arpos) 
	{
		$aux_array = $array;
	
		foreach ($array as $Indice => $Valor) {
			if(array_search($Indice,$arpos)) {
				$array[$Indice] = 0;
				   }
		}
	
	}
	function busca_cep($cep){  
       $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
       if(!$resultado){  
           return 0;  
       }  
       parse_str($resultado, $retorno);   
       return $retorno;  
   } 
	function geraFotoBase64($valor,$pasta)
	{
		$nomeImagem = nome("jpg",DOMAIN_PATH."fotos/".$pasta);
		$caminho_arq = DOMAIN_PATH.'fotos/'.$pasta."/".$nomeImagem; //$ip . '.jpg';

		if ($setaArquivo = fopen($caminho_arq, 'w'))
		{
			fwrite($setaArquivo, base64_decode($valor));
			return $nomeImagem;
		}
		else
		 	return false;
	}
	function moeda($valor) {
		$valor = str_replace(",","", $valor);
	    $valor = number_format($valor, 2, ',', '.');
	    return $valor;
	}
    function tabelaValidacaoLogin($msg){
	
	echo "
			<br><br><br><br>
			<table width=\"500\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#000000\" align=\"center\">
				<tr>
					<td align=\"center\" class=\"texto\" height=\"270\" bgcolor=\"#FFFFFF\">
						<font color=\"#FF0000\" size=\"3\"><b>$msg</b></font><br><br>
						<a href=\"index.php\" class=\"link\">Clique aqui</a> para conectar-se novamente.
					</td>
				</tr>
			</table>
	";
	}
    function checkbox($nome, $value=null)
	{
		$texto = '<input type="checkbox" name="'.$nome.'" id="'.$nome.'" value="1"';
		if($value==1) $texto.= '"checked"'; 
		$texto.=' />';
		return $texto;
	}
    function checkboxString($nome, $value,$valor_cadastrado=null)
    {
        $texto = '<input type="checkbox" name="'.$nome.'" id="'.$nome.'" value="'.$value.'" ';
        if($value==$valor_cadastrado) $texto.= ' checked ';
        $texto.=' />';
        return $texto;
    }

    function transformaValorMoedaEmFloat($valor_moeda){
        $subst = array("R$", ".");
        $valor_moeda = str_replace($subst,"",$valor_moeda);
        $valor_moeda = str_replace(",",".",$valor_moeda);
        return $valor_moeda;
    }
    function reduz_imagem($img, $max_x, $max_y, $nome_foto) 
    {
    
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width, $height) = getimagesize($img);
        
        $original_x = $width;
        $original_y = $height;
        
        // se a largura for maior que altura
        if($original_x > $original_y) {
           $porcentagem = (100 * $max_x) / $original_x;      
        }
        else {
           $porcentagem = (100 * $max_y) / $original_y;  
        }
        
        $tamanho_x = $original_x * ($porcentagem / 100);
        $tamanho_y = $original_y * ($porcentagem / 100);
        
        $image_p = imagecreatetruecolor($tamanho_x, $tamanho_y);
        $image   = imagecreatefromjpeg($img);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);
        return imagejpeg($image_p, $nome_foto, 100);
        
    }
    function faz_upload($file,$caminho,$size){//O $file vai ser o $_FILES['name_arq']
        $type		= $file['type'];
		$name		= $file['name'];
		$temp_name	= $file['tmp_name'];
		$file_erros	= $file['error'];
		
		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $name, $ext);
		$novoNome = nome($ext[1], $caminho);
		
		if($novoNome!="")
		{
			if (move_uploaded_file($temp_name, $caminho.'/gr_'.$novoNome))
			{
				//chmod($caminho.'/'.$novoNome,1777);
				$novoNomeMiniatura = 'mini_'.$novoNome;
				
				reduz_imagem($caminho.'/gr_'.$novoNome,$size["larguraMin"],$size["alturaMin"], $caminho.'/'.$novoNomeMiniatura);
				reduz_imagem($caminho.'/gr_'.$novoNome,$size["largura"],$size["altura"], $caminho.'/'.$novoNome);
				unlink($caminho.'/gr_'.$novoNome);
				return $novoNome;
			}
			else
			{ 
				return false;	
			}
		
		}
    }

?>