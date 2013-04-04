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
                                <td height='36' align='right' class='text_bold_preto'>Escola</td>
                                <td class='text_padrao'>
                                    <?=DAOFactory::getConfiguracaoEscolaDAO()->toString("escola","nome",$configuracao_escola->escolaId)?>
                                </td>
                            </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Prédio Pesquisado:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->predPesq)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Situação da codificação:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->statusCodificacao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código SEEC A:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->codSeecA)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código SEEC B:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->codSeecB)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Dependência Administrativa:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->dependenciaAdministrativa)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Natureza de ocupação:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->naturezaOcupacao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Natureza de ocupação do prédio:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->naturezaOcupacaoPredrio)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Entidade proprietária do Módel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->entidadeProprietariaMovel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Total de salas:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->totalSalasAula)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Total de salas Levantadas:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->totalSalasLevantada)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Unidade Executora:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->unidadeExecutora)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Outras atividades do prédio:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->identificacaoOutrasAtividadesPredio)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Docência?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->docencia)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Promoção de acesso à informação?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->promocaoAcessoInformacao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Apoio educacional?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->apoioEducacional)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Alimentação?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->alimentacao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Saúde e higiene?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->saudeEHigiene)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Promoção da convivência? :</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->promocaoConvivencia)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Suporte pedagógico à docência?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->suportePedagogicoDocencia)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Administração? :</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->administracao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Manutenção, conservação e segurança?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($configuracao_escola->manutencaoConservacaoSeguranca)?>
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
