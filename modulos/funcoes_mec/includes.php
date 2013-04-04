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
    
	require_once(DOMAIN_PATH.'models/class/dao/FuncoesMecDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/FuncoesMec.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/FuncoesMecDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/FuncoesMecExtDAO.class.php');

    
    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/funcoes_mec/controllers/default.Controller.php");
?>