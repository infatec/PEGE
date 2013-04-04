<?php
    include("includes.php");
    require_once(DOMAIN_PATH.'models/class/dao/MenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Menu.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/MenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/MenusExtDAO.class.php');
    import("Chave");
  //  import("Menu");
    include(DOMAIN_PATH."modulos/grupo_usuarios/controllers/configure.Controller.php");
    
    ##### VIEW  ###############
    
    include(DOMAIN_PATH."modulos/grupo_usuarios/views/configure.View.php");
      
?>