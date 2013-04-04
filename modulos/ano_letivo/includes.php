<?php    
    session_start();
    include("../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    include(DOMAIN_PATH."lib/paginacao.php");
    #### MODELS #########
    
    require_once(DOMAIN_PATH."models/include_conexao.php");
    
	require_once(DOMAIN_PATH.'models/class/dao/AnoLetivoDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/AnoLetivo.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/AnoLetivoDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/AnoLetivoExtDAO.class.php');

    
    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/ano_letivo/controllers/default.Controller.php");
?>