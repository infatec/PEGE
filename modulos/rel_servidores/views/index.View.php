<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>ajax.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.tablesorter.js"></script>


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
                        <td align="center" valign="top">
                           <? include(DOMAIN_PATH."includes/barra.php")?>
                        </td>
                    </tr>
                    <tr> 
                        <td align="center" valign="top">
				           

                        <form action="gera_relatorio.php" method="post" enctype="multipart/form-data" target="janela1" id="busca_avancada" >
                            <table width="830" border="0" cellspacing="0" cellpadding="0" class="filtro">
                                <tr>
                                    <td>
                                        <div class="pesquisa_avancada">

                                            <dl>
                                                <dd class="vazio"><input type="hidden" name="operador[]" value="and"></dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="nome" >Nome</option>
                                                        <option value="inep" >Inep</option>
                                                        <option value="bairro" >Bairro</option>
                                                        <option value="cep" >Cep</option>
                                                        <option value="email" >E-mail</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                   <input name="valor[]" type="text" size="50" maxlength="30">
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="inep" >Inep</option>
                                                        <option value="bairro" >Bairro</option>
                                                        <option value="cep" >Cep</option>
                                                        <option value="email" >E-mail</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <input name="valor[]" type="text" size="50">
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="bairro" >Bairro</option>
                                                        <option value="cep" >Cep</option>
                                                        <option value="email" >E-mail</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <input name="valor[]" type="text" size="50">
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="cep" >Cep</option>
                                                        <option value="email" >E-mail</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <input name="valor[]" type="text" size="50" >
                                                </dd>
                                            </dl>

                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="email" >E-mail</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <input name="valor[]" type="text" size="50" maxlength="30">
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="funcao_principal" >Fun��o</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <? foreach($funcoes as $funcao): ?>
                                                            <option value="<?=$funcao["funcao_principal"]?>" ><?=$funcao["funcao_principal"]?></option>
                                                        <? endforeach;?>
                                                    </select>
                                                </dd>
                                            </dl>

                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="niv_escola" >N�vel de escolaridade</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="NA" >N�o Alfabetivado</option>
                                                        <option value="A" >Alfabetivado</option>
                                                        <option value="EFII" >Ens. Fundamental I Incompleto</option>
                                                        <option value="EFIC" >Ens. Fundamental I Completo</option>
                                                        <option value="EFIII" >Ens. Fundamental II Incompleto</option>
                                                        <option value="EFIIC" >Ens. Fundamental II Completo</option>
                                                        <option value="EMI" >Ens. M�dio Incompleto</option>
                                                        <option value="EMC" >Ens. M�dio Completo</option>
                                                        <option value="G" >Gradu��o</option>
                                                        <option value="E" >Especializa��o</option>
                                                        <option value="M" >Mestrado</option>
                                                        <option value="D" >Doutorado</option>
                                                        <option value="PD" >P�s-Doutorado</option>
                                                    </select>
                                                </dd>
                                            </dl>

                                            <dl>
                                                <dd>
                                                    <select name="operador[]" >
                                                        <option value="and">E</option>
                                                        <option value="or">OU</option>
                                                    </select>
                                                </dd>
                                                <dd>

                                                    <select name="campo[]" class="campo">
                                                        <option value="disposicao_outro_orgao" >Disposi��o Outro Org�o</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="S" >Sim</option>
                                                        <option value="N" >N�o</option>
                                                    </select>
                                                </dd>
                                            </dl>


                                            <h2>&raquo; Marque os campos que ir�o aparecer no relat�rio</h2>

                                            <div class="campos">

                                                <div class="coluna">

                                                    <label><input type="checkbox" value="N�vel de escolaridade|nivEscola" name="campos_aparecer[]"> N�vel de escolaridade</label>
                                                    <label><input type="checkbox" value="Fun��o|funcaoPrincipal" name="campos_aparecer[]"> Fun��o</label>

                                                </div>


                                                <div class="coluna">

                                                    <label><input type="checkbox" value="Disposi��o Outro Org�o|disposicaoOutroOrgao" name="campos_aparecer[]"> Disposi��o Outro Org�o</label>

                                                </div>

                                            </div>


                                            <dl>
                                                <dd><input type="submit" value="Gerar Relat�rio"
                                                           onClick="window.open('','janela1','toolbar=no,scrollbars=yes, location=no,directories=no, status=no, menubar=no, width=1000, height=700, top=250, left=310 resizeable=yes');"
                                                           target='janela1' /></dd>

                                            </dl>

                                        </div>
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
</body>
</html>