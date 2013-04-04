<?php

header("Content-type: text/html; charset=ISO-8859-1");

session_start();
$_SESSION["permissao_temp"] = 3;
include("../../../config/appConfig.php");
include(DOMAIN_PATH."functions/funcoes.inc.php");
include(DOMAIN_PATH."functions/datas.inc.php");
include(DOMAIN_PATH."models/include_conexao.php");
include(DOMAIN_PATH."lib/Model.php");
include(DOMAIN_PATH."lib/paginacao.php");
include(DOMAIN_PATH."lib/class_anti_injection.php");
#### MODELS #########

require_once(DOMAIN_PATH."models/include_conexao.php");

require_once(DOMAIN_PATH.'models/class/dao/AnoEscolaDAO.class.php');
require_once(DOMAIN_PATH.'models/class/dto/AnoEscola.class.php');
require_once(DOMAIN_PATH.'models/class/mysql/AnoEscolaDAO.class.php');
require_once(DOMAIN_PATH.'models/class/mysql/ext/AnoEscolaExtDAO.class.php');


######## CONTROLLER ##############
include(DOMAIN_PATH."modulos/ano_escola/controllers/default.Controller.php");
?>