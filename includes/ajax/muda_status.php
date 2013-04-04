<? session_start();
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
    
	$id_registro = (int)$_GET["id_registro"];
	$novostatus = $_GET["novostatus"];
	$tabela = $_GET["tabela"];
    
    $sql =  "update $tabela set status = '".$novostatus."' where id = $id_registro";
    $query = new SqlQuery($sql);
	QueryExecutor::executeUpdate($query);
    
    if($novostatus) echo '<img name="status-'.$id.'" src="../../webroot/img_sistema/24_tick.png" onclick="javascript:mudaStatus('.$id_registro.',0,'.$id_registro.',\''.$tabela.'\');"  border="0">';
    else echo '<img name="status-'.$id.'" src="../../webroot/img_sistema/24_x_false.png" onclick="javascript:mudaStatus('.$id_registro.',1,'.$id_registro.',\''.$tabela.'\');"  border="0">';
    
?>