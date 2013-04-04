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
    
	require_once(DOMAIN_PATH.'models/class/dao/DisciplinasEscolaDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/DisciplinasEscola.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/DisciplinasEscolaDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/DisciplinasEscolaExtDAO.class.php');

    
    ######## CONTROLLER ##############  
    include(DOMAIN_PATH."modulos/disciplinas_escola/controllers/default.Controller.php");
?>