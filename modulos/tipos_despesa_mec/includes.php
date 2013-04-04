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
    
	require_once(DOMAIN_PATH.'models/class/dao/TiposDespesaMecDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/TiposDespesaMec.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/TiposDespesaMecDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/TiposDespesaMecExtDAO.class.php');

    
    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/tipos_despesa_mec/controllers/default.Controller.php");
?>