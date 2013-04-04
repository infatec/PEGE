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
    
	require_once(DOMAIN_PATH.'models/class/dao/MenuDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Menu.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/MenuDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/MenuExtDAO.class.php');

    
    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/menu/controllers/default.Controller.php");
?>