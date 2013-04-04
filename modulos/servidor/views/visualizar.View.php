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
                                    <td height='36' align='right' class='text_bold_preto'>Nome:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->nome)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Cpf:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->cpf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Inep:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->inep)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>E-mail:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->email)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Endereço:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->endereco)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Número:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->numero)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Bairro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->bairro)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Cidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->cidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Uf:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->uf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Local:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->local)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nível escolar:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->nivEscola)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Formação:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->formacao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Celular:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->celular)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->telefone)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Cep:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($servidor->cep)?>
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
