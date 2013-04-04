<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td height="80" valign="top" bgcolor="#FFFFFF"><? include (DOMAIN_PATH.'includes/topo.php') ?></td></tr>
<tr>
    <td valign="top">
    	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> 
                <td width="20" valign="top"></td>
                <td valign="top">
                    <table width="100%" border="0" cellspacing="6" cellpadding="0">
                        <tr>
                            <td height="25">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top"> <? include(DOMAIN_PATH."includes/barra.php")?></td>
                        </tr>
                        <tr> 
                            <td align="center" valign="top">
                            
                            
                            <table width="750" border="0" align="center" cellpadding="2" cellspacing="0" class="margin7">
                                <tr> 
                                    <td width="746" align="center" class="text_bold_azul">
                                        <center class="text_vermelho">
                                            Voc&ecirc; realmente deseja excluir?
                                        </center>
                                        <br><br>
                                        <form name="remover" method="post" action="">
                                            <table align="center" width="500" border="0" cellspacing="0" cellpadding="0">
                                                <? foreach($habilitacoes_mecs as $habilitacoes_mec) :?> 
                                                    <tr>
                                                        <td class="text_bold_preto"> 
                                                            <strong><?=$habilitacoes_mec->descricao?></strong>
                                                            <input type="hidden" name="id[]" value="<?=$habilitacoes_mec->id?>" >
                                                        </td>
                                                    </tr>
                                                <? endforeach;?>
                                                <tr>
                                                    <td align="center" style="padding-top:20px;"> 
                                                        <table width="150" border="0" cellpadding="4">
                                                          <tr>
                                                            <td width="50%">
                                                            	<input type="hidden" name="acao" value="1">
																<input name="Submit" type="submit" class="input_branco" value="Sim">
															</td>
                                                            <td>
                                                            	<input name="Submit" type="button" class="input_branco" value="Não" onClick="document.location='index.php'">
															</td>
                                                          </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                                
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