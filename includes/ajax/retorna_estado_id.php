<?
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
    
    $nome_cidade = $_GET["nome_cidade"];
    
    $cidade = DAOFactory::getCidadeDAO()->queryByNome($nome_cidade);
    
	echo $cidade[0]->estadosId."|".$cidade[0]->id;
    
?>