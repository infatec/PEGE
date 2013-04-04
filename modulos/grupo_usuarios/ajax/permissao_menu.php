<?php
	session_start();
    include("../../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    require_once(DOMAIN_PATH.'models/class/dao/GrupoUsuariosDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/GrupoUsuario.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/GrupoUsuariosDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/GrupoUsuariosExtDAO.class.php');
    
    require_once(DOMAIN_PATH.'models/class/dao/MenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Menu.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/MenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/MenusExtDAO.class.php');
    
    require_once(DOMAIN_PATH.'models/class/dao/GrupoUsuarioMenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/GrupoUsuarioMenu.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/GrupoUsuarioMenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/GrupoUsuarioMenusExtDAO.class.php');

    
    import("Chave");
    
    header("Content-type: text/html; charset=ISO-8859-1");
    $grupo_usuario_id=(int)$_GET["grupo_id"];
    $chave=$_GET["chave"];
    $permissao = (int)$_GET["permissao"];
    
    $menu_id = DAOFactory::getChavesDAO()->retornaValorChave($chave);
    
    if($permissao==1){
        $grupo_usuario_menu = new GrupoUsuarioMenu();
        $grupo_usuario_menu->grupoId = $grupo_usuario_id;
        $grupo_usuario_menu->menuId = $menu_id;
        $grupo_usuario_menu->permissao =3;
        DAOFactory::getGrupoUsuarioMenusDAO()->insert($grupo_usuario_menu);
        echo '<td align="center" class="texto">
                <a href="javascript:;" onclick="permissaoMenu('.$grupo_usuario_id.',\''.$chave.'\',0)" class="">Sem Acesso</a>
            </td>
            <td>-</td>
            <td align="center" class="texto">
                <a href="javascript:;"  class="linkMenu">Com Acesso</a>
            </td>';
    }elseif($permissao==0){
       $grupo_usuarios_menus = DAOFactory::getGrupoUsuarioMenusDAO()->queryAll("*"," where grupo_id=".$grupo_usuario_id." and menu_id=".$menu_id." ");
       //print_r($grupo_usuarios_menus);
       foreach($grupo_usuarios_menus as $grupo_usuario_menu ){
            DAOFactory::getGrupoUsuarioMenusDAO()->delete($grupo_usuario_menu->id,$grupo_usuario_menu->grupoId,$grupo_usuario_menu->menuId); 
       }
       echo '<td align="center" class="texto">
                <a href="javascript:;" class="linkMenu" class="">Sem Acesso</a>
            </td>
            <td>-</td>
            <td align="center" class="texto">
                <a href="javascript:;" onclick="permissaoMenu('.$grupo_usuario_id.',\''.$chave.'\',1)" >Com Acesso</a>
            </td>';
        
    }
   
    
?>