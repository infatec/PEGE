<?php
    
    $chave = $_GET["igu"];
    $id = DAOFactory::getChavesDAO()->retornaValorChave($chave);
    
	$grupo_usuario = DAOFactory::getGrupoUsuariosDAO()->load($id);
    
    $menus = DAOFactory::getMenusDAO()->queryAll("*","where status = 1");
    
?>