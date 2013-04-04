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
    
    require_once(DOMAIN_PATH.'models/class/dao/GrupoUsuarioTabelasDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/GrupoUsuarioTabela.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/GrupoUsuarioTabelasDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/GrupoUsuarioTabelasExtDAO.class.php');
    
     require_once(DOMAIN_PATH.'models/class/dao/TabelasDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Tabela.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/TabelasDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/TabelasExtDAO.class.php');

    
    import("Chave");
    
    header("Content-type: text/html; charset=ISO-8859-1");
    $grupo_usuario_id=(int)$_GET["grupo_id"];
    $chave=$_GET["chave"];
    $permissao = (int)$_GET["permissao"];
    
    $tabela_id = DAOFactory::getChavesDAO()->retornaValorChave($chave);
    
    if($permissao){
        $grupo_usuario_tabela = new GrupoUsuarioTabela();
        $grupo_usuario_tabela->grupoId = $grupo_usuario_id;
        $grupo_usuario_tabela->tabelaId = $tabela_id;
        $grupo_usuario_tabela->permissao =$permissao;
        DAOFactory::getGrupoUsuarioTabelasDAO()->insert($grupo_usuario_tabela);
        echo '<td align="center" class="texto">
                <a href="javascript:;" onclick="permissaoTabela('.$grupo_usuario_id.',\''.$chave.'\',0)" class="">Sem Acesso</a>
            </td>
            <td>-</td>
            <td align="center" class="texto">
                <a href="javascript:;"  class="linkMenu">Com Acesso</a>
            </td>';
    }elseif($permissao==0){
       $grupo_usuario_tabelas = DAOFactory::getGrupoUsuarioTabelasDAO()->queryAll("*"," where grupo_id=".$grupo_usuario_id." and tabela_id=".$tabela_id." ");
       //print_r($grupo_usuarios_menus);
       foreach($grupo_usuario_tabelas as $grupo_usuario_tabela ){
            DAOFactory::getGrupoUsuarioTabelasDAO()->delete($grupo_usuario_tabela->id); 
       }
       echo '<td align="center" class="texto">
                <a href="javascript:;" class="linkMenu" class="">Sem Acesso</a>
            </td>
            <td>-</td>
            <td align="center" class="texto">
                <a href="javascript:;" onclick="permissaoTabela('.$grupo_usuario_id.',\''.$chave.'\',3)" >Com Acesso</a>
            </td>';
        
    }
   
    
?>