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

    header("Content-type: text/html; charset=ISO-8859-1");
    import("Chave");
    
    $chave = $_GET["chave"];
    
   // print_r($_SESSION);
    $grupo_usuario_id=DAOFactory::getChavesDAO()->retornaValorChave($chave);
    $menus = DAOFactory::getMenusDAO()->permissoesMenu($grupo_usuario_id);
   
    
?>
<table width="830" border="0" cellspacing="0" cellpadding="2" style="margin-top:20px;">
    <tr>
    	<td class="text_bold_vermelho" align="center">Setando as permiss&otilde;es de Menus</td>
        <td></td>
    </tr>
    <tr>
        <td class="text_bold_preto" align="center">
                      
            <table width="444" border="0" cellspacing="4" cellpadding="2">
                <tr>
                    <td width="172" class="text_bold_preto">Menus</td>
                    <td class="text_titulo">&nbsp;</td>
                </tr>
                <? foreach($menus as $menu): 
                        $chave_menu = DAOFactory::getChavesDAO()->geraChave($menu["id"]);
                        $onclickSA=$onclickCA=$classCA=$classSA="";                        
                        if($menu["permissao"]>0) {
                            $classCA="linkMenu";
                            $onclickSA = 'onclick="permissaoMenu('.$grupo_usuario_id.',\''.$chave_menu.'\',0)"';
                        }
                        elseif($menu["permissao"]==0){
                            $classSA="linkMenu";
                            $onclickCA = 'onclick="permissaoMenu('.$grupo_usuario_id.',\''.$chave_menu.'\',1)"';
                        }
                ?>
                    <tr>
                        <td class="text_padrao"><?=$menu["nome"]?> </td>
                        <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px;">
                            <tr id="<?=$chave_menu?>">
                                <td align="center" class="texto">
                                    <a href="javascript:;" <?=$onclickSA?> class="<?=$classSA?>">Sem Acesso</a>
                                </td>
                                <td>-</td>
                                <td align="center" class="texto">
                                    <a href="javascript:;" <?=$onclickCA?> class="<?=$classCA?>">Com Acesso</a>
                                </td>
                            </tr>
                        </table>                    
                        </td>
                    </tr>
               <? endforeach; ?>
    </tr>
</table>