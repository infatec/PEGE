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
    
	require_once(DOMAIN_PATH.'models/class/dao/EscolaDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Escola.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/EscolaDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/EscolaExtDAO.class.php');

    import("ConfiguracaoEscola");

    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/escola/controllers/default.Controller.php");
