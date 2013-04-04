<?php
    session_start();
    include("../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."lib/Model.php");
    
	include(DOMAIN_PATH_ADMIN."models/include_conexao.php");
    
	include(DOMAIN_PATH_ADMIN.'models/class/dao/UsuarioSistemaDAO.class.php');
	include(DOMAIN_PATH_ADMIN.'models/class/dto/UsuarioSistema.class.php');
	include(DOMAIN_PATH_ADMIN.'models/class/mysql/UsuarioSistemaDAO.class.php');
	include(DOMAIN_PATH_ADMIN.'models/class/mysql/ext/UsuarioSistemaExtDAO.class.php');
    
    $grupo_id= $_GET["gi"]; 
    $nome = $_GET["nome"]; 
    $login = $_GET["log"];
    $senhacript = $_GET["secr"];
    $senhaco = $_GET["seco"];
    
    $usuario_sistema = new UsuarioSistema();
    $usuario_sistema->grupoId = $grupo_id;
	$usuario_sistema->login = $login;
	$usuario_sistema->senha = $senhaco;
    $usuario_sistema->senhaCript = $senhacript;
	$usuario_sistema->nome = $nome;
    $usuario_sistema->clienteId = $_SESSION["idcliente_sistema"];
    $usuario_sistema->status = 1;
    
    DAOFactory::getUsuarioSistemaDAO()->insert($usuario_sistema);
    
    redireciona("index.php");
?>