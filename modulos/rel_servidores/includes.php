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
    
	require_once(DOMAIN_PATH.'models/class/dao/ServidorDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Servidor.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ServidorDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/ServidorExtDAO.class.php');

    import("ConfiguracaoEscola");

    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/rel_servidores/controllers/default.Controller.php");
