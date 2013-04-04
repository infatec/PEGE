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
    import("Parametro");
    
    $parametros = DAOFactory::getParametroDAO()->queryAll("*"); 
    $parametro = $parametros[0]; 
    ##### VIEW  ###############
      
?>
<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>mascaras.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>main.js"></script>

</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr> 
    <td width="20" valign="top"></td>
    <td valign="top">
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
            
            <tr>
                <td align="center" valign="top">
                   <table width="480" border="0" cellspacing="0" cellpadding="0" class="barra">
                        <tr>
                            <td width="37"><img src="<?=URL.'/webroot/img_sistema/'?>seta_redonda.png" id="esquerda"/></td>
                            <td width="719"><h1><a href="index.php">Parametros</a></h1></td>        
                            
                        </tr>                       
                  </table>
                </td>
            </tr>
            <tr> 
                <td align="center" valign="top">
                     <table width="480" border="0" cellspacing="0" cellpadding="0"  class="filtro">
                    
                        <tr>
                            <td width="140">
                               <b>Escola:</b>                  
                            </td>
                            <td><?=$parametro->nomeEmpresa?></td>
                        </tr>
                        
                      
                        <tr>
                            <td>
                            <b>Senha e-mail padrão:</b>
                            </td>
                            <td><?=$parametro->senhaEmailCliente?>
                            </td>
                        </tr>
                        
                    </table>
               </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>