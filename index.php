<?php
    //set_time_limit(10000);
    session_start();
    include("config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    ###    # CONTROLLER  #########
    $estaNaRaiz = 1;
    verifica("login.php");
   
    require_once(DOMAIN_PATH.'models/class/dao/MenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/dto/Menu.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/MenusDAO.class.php');
	require_once(DOMAIN_PATH.'models/class/mysql/ext/MenusExtDAO.class.php');
    
   
    ##### VIEW  ###############
    $menu=DAOFactory::getMenusDAO()->getMenu(URL);
    $_SESSION["menu_sistema"] = NULL;
    $_SESSION["menu_sistema"] = $menu;
    //SCRIPT PARA BAKUP A CADA 4 DIAS
   
?>  

<html>
<head>
<title><?=$config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<link href="<?=URL.'/webroot/js/'?>datepicker/datepicker.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>datepicker/datepicker.js"></script>
<script src="<?=URL.'/webroot/js/'?>datepicker/pt.js"></script>
<script src="<?=URL.'/webroot/js/'?>datepicker/pt-br.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.tablesorter.js"></script>
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script>
//TABLE SORTER
$(function() {		
	$("#tablesorter-demo").tablesorter({
        sortList:[[0,1]], 
        widgets: ['zebra']        
	});
});	
</script>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="60" valign="top" bgcolor="#FFFFFF">
        <? require_once(DOMAIN_PATH.'includes/topo.php') ?>
    </td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="10" valign="top"></td>
          <td valign="top">
          <table width="80%" border="0" align="center" cellpadding="0" cellspacing="6" style="margin-top:50px;">
             
              <tr>  
              <td align="center" width="830" colspan="2">
                    <div align="center">
                    <br/>                    
                    <?
					if(!empty($_SESSION["msg_index"]))
					{?>
					<table width="830" border="0" cellspacing="0" cellpadding="0" align="center">
						<tr>
							<td height="50" valign="middle"><?=$_SESSION["nomeusuario_mvf_g"]?>, <?=$_SESSION["msg_index"] ?></td>
						</tr>
					</table>
					<?
						unset($_SESSION["msg_index"]);
					}
					else
					{
					?>
                        <h3 style="font-size: 15px; font-family: sans-serif;"><?=$_SESSION["nomeusuario_mvf_g"]?>, Bem Vindo ao <?=$config["nomeSite"]?></h3>
                        
                    <?
                    }
					?>
                    <p>
                        <h4>Este &eacute; o seu <?=$_SESSION["acessosusuario_mvf_g"]?>&ordm; acesso.</h4><br>                        	
                        <span style="font-size:12px">
                        Seu &uacute;ltimo acesso foi em <?=$_SESSION["ultimoacessousuario_mvf_g"]?><br />
                            Sempre clique em <a href="login.php" class="linkMenu">SAIR</a> para aumentar a seguran&ccedil;a<br>
                        </span>                    
                    </p>
                </div>          
                </td>
              </tr>             
              <tr>
                <td><table width="80%" border="0">                  
                </table>
                </td>
              </tr>
          </table>
          </td>
        </tr>
      </table></td>      
  </tr>
</table>
</body>
</html>
