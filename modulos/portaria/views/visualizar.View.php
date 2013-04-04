<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>mascaras.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
</head>
<body>
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr><td height="80" valign="top" bgcolor="#FFFFFF"><? include(DOMAIN_PATH.'includes/topo.php') ?></td></tr>
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
                                    <td align="center" valign="top">  <? include(DOMAIN_PATH."includes/barra.php")?></td>
                                </tr>
                                <tr> 
                                    <td align="center" valign="top">
                                         <table width="830" border="0" cellspacing="2" cellpadding="0" class="borda" style="margin:5px" >
                                           
<tr>
                                <td height='36' align='right' class='text_bold_preto'>Servidor</td>
                                <td class='text_padrao'>
                                    <?=DAOFactory::getPortariaDAO()->toString("servidor","nome",$portaria->servidorId)?>
                                </td>
                            </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Data Entrada:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($portaria->dataEntrada)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Hora Entrada:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($portaria->horaEntrada)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>RG:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($portaria->rg)?>
                                    </td>
                                </tr>
<tr>
                                <td height='36' align='right' class='text_bold_preto'>Aluno</td>
                                <td class='text_padrao'>
                                    <?=DAOFactory::getPortariaDAO()->toString("aluno","nome",$portaria->alunoId)?>
                                </td>
                            </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Modalidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($portaria->modalidade)?>
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
