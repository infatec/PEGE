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
                                                        <option value="zona" >Zona</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="Indefinido" >Indefinido</option>
                                                        <option value="Urbana">Urbana</option>
                                                        <option value="Rural">Rural</option>
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
                                                        <option value="dependencia_administrativa" >Dep. Administrativa</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="Nenhuma">Nenhuma</option>
                                                        <option value="Municipal">Municipal</option>
                                                        <option value="Outro">Outro</option>
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
                                                        <option value="natureza_ocupacao_predrio" >Ocupação do prédio</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="próprio">Próprio</option>
                                                        <option value="alugado">Alugado</option>
                                                        <option value="cedido">Cedido</option>
                                                        <option value="conveniado">Conveniado</option>
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
                                                        <option value="entidade_proprietaria_movel" >Propriedade do imóvel</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="federal">Federal</option>
                                                        <option value="estadual">Estadual</option>
                                                        <option value="municipal">Municipal</option>
                                                        <option value="particular">Particular</option>
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
                                                        <option value="ce.status_funcionamento" >Status Funcionamento</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="Indefinido">Ativa</option>
                                                        <option value="Paralisada">Paralisada</option>
                                                        <option value="Extinta">Extinta</option>
                                                        <option value="Fechada">Fechada</option>
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
                                                        <option value="unidade_executora" >Unidade Executora</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="associação de pais e mestres" >Associação de Pais e Mestres</option>
                                                        <option value="conselho de escola">Conselho de escola</option>
                                                        <option value="caixa escolar" >Caixa escolar</option>
                                                        <option value="outra" >Outra</option>
                                                        <option value="não existe">Não existe</option>
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
                                                        <option value="docencia" >Docência</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="S" >Sim</option>
                                                        <option value="N" >Não</option>
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
                                                        <option value="apoio_educacional" >Apoio Educacional</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="S" >Sim</option>
                                                        <option value="N" >Não</option>
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
                                                        <option value="ce.assentamento" >Assentamento</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="S" >Sim</option>
                                                        <option value="N" >Não</option>
                                                    </select>
                                                </dd>
                                            </dl>

                                            <h2>&raquo; Marque os campos que irão aparecer no relatório</h2>

                                            <div class="campos">

                                                <div class="coluna">

                                                    <label><input type="checkbox" value="Zona|zona" name="campos_aparecer[]"> Zona</label>
                                                    <label><input type="checkbox" value="Dependência Administrativa|dependencia_administrativa" name="campos_aparecer[]"> Dependência Administrativa</label>
                                                    <label><input type="checkbox" value="Ocupação do prédio|natureza_ocupacao_predrio" name="campos_aparecer[]"> Ocupação do prédio</label>
                                                    <label><input type="checkbox" value="Propriedade do imóvel|entidade_proprietaria_movel" name="campos_aparecer[]"> Propriedade do imóvel</label>
                                                    <label><input type="checkbox" value="Unidade Executora|unidade_executora" name="campos_aparecer[]"> Unidade Executora</label>
                                                    <label><input type="checkbox" value="Nome diretor|nome_diretor" name="campos_aparecer[]"> Nome do Diretor</label>

                                                </div>


                                                <div class="coluna">

                                                    <label><input type="checkbox" value="Docência|docencia" name="campos_aparecer[]"> Docência</label>
                                                    <label><input type="checkbox" value="Apoio Educacional|apoio_educacional" name="campos_aparecer[]"> Apoio Educacional</label>
                                                    <label><input type="checkbox" value="Assentamento|assentamento" name="campos_aparecer[]"> Assentamento</label>
                                                    <label><input type="checkbox" value="Alunos Matriculados|AM" name="campos_count[]"> Qtd de alunos matriculados no ano letivo ativo</label>
                                                    <label><input type="checkbox" value="Qtd Turmas|QT" name="campos_count[]"> Qtd de turmas no ano letido ativo</label>
                                                    <label><input type="checkbox" value="Qtd Professores|QP" name="campos_count[]"> Qtd de professores</label>
                                                    <label><input type="checkbox" value="Qtd Servidores|QS" name="campos_count[]"> Qtd de Servidores</label>


                                                </div>

                                            </div>


                                            <dl>
                                                <dd><input type="submit" value="Gerar Relatório"
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