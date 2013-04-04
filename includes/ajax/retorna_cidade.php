<?  session_start();
	$_SESSION["permissao_temp"] = 3;
	
	include("../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    include(DOMAIN_PATH."lib/paginacao.php");
    include(DOMAIN_PATH."lib/pgs.php");
    #### MODELS #########
    
    require_once(DOMAIN_PATH."models/include_conexao.php");
    
    import("Cidade");
    
	header("Content-type: text/html; charset=ISO-8859-1");

	$estado_id = (int)$_GET["estado_id"];
	$cidade_id = (int)$_GET["cidade_id_valor"];
	$nome_input = $_GET["nome_input"];
	
	$dados = array('primary_key' => 'id', 
					'nome' => 'nome', 
					'tabela' => 'cidade', 
					'condicao' => 'where estados_id='.$estado_id.' order by nome asc', 
					'nome_input' => ''.$nome_input.'', 
					'id' => ''.$nome_input.'', 
					'class' => 'select', 
					'value' => $cidade_id);	
					
	DAOFactory::getCidadeDAO()->geraSelect($dados);
	
?>

