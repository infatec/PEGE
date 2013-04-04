<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>main.js"></script>
<script src="<?=URL.'/modulos/turma/inc/'?>funcoes_modulo.js"></script>


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

                            <form action="<?=$GLOBALS["paginaAtual"]?>"  name="form" method="get">
                                <table width="830" border="0" style="padding: 20px;" cellspacing="0" cellpadding="0" class="filtro">
                                    <tr>

                                        <td width="120">
                                            <input type="hidden" value="" id="escola_id">
                                            Nome ou Inep da Escola <br />

                                            <input name="nome" type="text" autocomplete="off" id="nome" onKeyDown="buscaEscolasTurma(this)"  size="50" maxlength="50"></td>
                                        <td valign="bottom"> <button style="width: 200px;display: none;" id="btn_outra_escola" onclick="selecionarOutraEscolaTurma()" type="button" class="bt">Selecionar outra escola</button> </td>

                                    </tr>

                                    <tr id="dados_escola" style="display: none;">
                                        <td colspan="2">

                                            <fieldset style="width: 700px;">
                                                <legend>Escola selecionada</legend>
                                                <table width="640" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
                                                    <tr>
                                                        <td class="celulaTitle">Inep:</td>
                                                        <td style="text-align: left;" id="inep_escola"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="celulaTitle">Escola:</td>
                                                        <td style="text-align: left;" id="nome_escola"></td>
                                                    </tr>

                                                </table>
                                            </fieldset>

                                            <div id="ano_letivo"></div>

                                            <div id="buttons_opcoes_turma" style="display: none;">
                                                <div class="clear"><br></div>

                                                <button style="width: 180px; height: 40px;" id="btn_turmas" onclick="getTurmas()" type="button" class="bt">
                                                    Visualizar Turmas
                                                </button>

                                                <button style="width: 180px; height: 40px;" id="btn_add_turma" onclick="formTurma()" type="button" class="bt">
                                                    Adicionar Turma
                                                </button>

                                            </div>

                                        </td>
                                    </tr>

                                </table>
                            </form>

                            <div id="conteudo" class="borda" style="width: 810;padding: 10px;display: none;">


                            </div>

                            <div id="lista_escolas" class="borda" style="width: 810;padding: 10px;display: none;">


                            </div>


                            <table id="msg_digite" width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
                                <tr>
                                    <td>
                                        <div class="message tip">
                                            <p>Digite o nome de uma escola.</p>
                                        </div>
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