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
                                        <?=stripslashes($escola->nome)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Endereço:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->endereco)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Número:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->numero)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Bairro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->bairro)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Cidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->cidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>UF:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->uf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CEP:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->cep)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Inep:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->inep)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CNPJ:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->cnpj)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código Escola:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->codEscola)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Dependência Administrativa?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->depAdministrativo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Status Funcionamento:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->statusFuncionamento)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Zona:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->zona)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Status Censo:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->statusCenso)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->telefone)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>E-mail:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->email)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Latitude:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->latitude)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Longitude:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->longitude)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código Estado:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->codEstado)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código Cidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->codCidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>DDD:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($escola->ddd)?>
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
