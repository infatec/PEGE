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
    
	require_once(DOMAIN_PATH.'models/class/dao/MatriculaDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Matricula.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/MatriculaDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/MatriculaExtDAO.class.php');

    
    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/matricula/controllers/default.Controller.php");
?>