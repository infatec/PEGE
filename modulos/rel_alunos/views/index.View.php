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
                                                        <option value="rg" >RG</option>
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
                                                        <option value="sexo" >Sexo</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="M" <? if($aluno->sexo=="M") echo "selected" ?>>Masculino</option>
                                                        <option value="F" <? if($aluno->sexo=="F") echo "selected" ?>>Feminino</option>
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
                                                        <option value="raca" >Cor</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="Negro" <? if($aluno->raca=="Negro") echo "selected" ?>>Negro</option>
                                                        <option value="Mulato escuro" <? if($aluno->raca=="Mulato escuro") echo "selected" ?>>Mulato escuro</option>
                                                        <option value="Mulato médio" <? if($aluno->raca=="Mulato médio") echo "selected" ?>>Mulato médio</option>
                                                        <option value="Mulato claro" <? if($aluno->raca=="Mulato claro") echo "selected" ?>>Mulato claro</option>
                                                        <option value="Branco" <? if($aluno->raca=="Branco") echo "selected" ?>>Branco</option>
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
                                                        <option value="tipo_defic" >Tipo de deficiência</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="VISUAL" <? if($aluno->tipoDefic=="VISUAL") echo "selected" ?>>Deficiência visual</option>
                                                        <option value="MOTORA" <? if($aluno->tipoDefic=="MOTORA") echo "selected" ?>>Deficiência motora</option>
                                                        <option value="MENTAL" <? if($aluno->tipoDefic=="MENTAL") echo "selected" ?>>Deficiência mental</option>
                                                        <option value="AUDITIVA" <? if($aluno->tipoDefic=="AUDITIVA") echo "selected" ?>>Deficiência auditiva</option>
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
                                                        <option value="grupo_sangue" >Grupo sanguineo</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="O+" <? if($aluno->grupoSangue=="O+") echo "selected" ?>>O+</option>
                                                        <option value="O-" <? if($aluno->grupoSangue=="O?") echo "selected" ?>>O-</option>
                                                        <option value="A+" <? if($aluno->grupoSangue=="A+") echo "selected" ?>>A+</option>
                                                        <option value="A-" <? if($aluno->grupoSangue=="A?</") echo "selected" ?>>A-</option>
                                                        <option value="B+" <? if($aluno->grupoSangue=="B+") echo "selected" ?>>B+</option>
                                                        <option value="AB+" <? if($aluno->grupoSangue=="AB++") echo "selected" ?>>AB+</option>
                                                        <option value="AB-" <? if($aluno->grupoSangue=="AB++") echo "selected" ?>>AB-</option>
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
                                                        <option value="grupo_sangue_rh" >Fator RH</option>
                                                    </select>

                                                </dd>
                                                <dd>
                                                    <select name="valor[]" class="valor">
                                                        <option value="" >TODOS</option>
                                                        <option value="RH positivo (+)" <? if($aluno->grupoSangueRh=="RH positivo (+)") echo "selected" ?>>RH positivo (+)</option>
                                                        <option value="RH negativo (-)" <? if($aluno->grupoSangueRh=="RH negativo (-)") echo "selected" ?>>RH negativo (-)</option>
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
                                                        <option value="grupo_sangue_alergia" >Alergia no sangue</option>
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
                                                        <option value="grupo_sangue_diabetico" >Diabético</option>
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
                                                        <option value="usa_oculos" >Usa óculos</option>
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
                                                        <option value="destro" >Destro</option>
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

                                                    <label><input type="checkbox" value="Peso|peso" name="campos_aparecer[]"> Peso</label>
                                                    <label><input type="checkbox" value="Altura|altura" name="campos_aparecer[]"> Altura</label>
                                                    <label><input type="checkbox" value="Cor|raca" name="campos_aparecer[]"> Cor</label>
                                                    <label><input type="checkbox" value="Tipo de deficiência|tipo_defic" name="campos_aparecer[]"> Tipo de deficiência</label>
                                                    <label><input type="checkbox" value="Grupo sanguineo|grupo_sangue" name="campos_aparecer[]"> Grupo sanguineo</label>


                                                </div>


                                                <div class="coluna">

                                                    <label><input type="checkbox" value="Fator RH|grupo_sangue_rh" name="campos_aparecer[]"> Fator RH</label>
                                                    <label><input type="checkbox" value="Alergia no sangue|grupo_sangue_alergia" name="campos_aparecer[]"> Alergia no sangue</label>
                                                    <label><input type="checkbox" value="Diabético|grupo_sangue_diabetico" name="campos_aparecer[]"> Diabético</label>
                                                    <label><input type="checkbox" value="Usa óculos|usa_oculos" name="campos_aparecer[]"> Usa óculos</label>
                                                    <label><input type="checkbox" value="Destro|destro" name="campos_aparecer[]"> Destro</label>

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