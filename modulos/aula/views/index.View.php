<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>ajax.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.tablesorter.js"></script>

    <script>

        function buscaEscolasAulas(campo){
            var letras_digitadas = $(campo).val().length;

            if(letras_digitadas>2){

                $("#msg_digite").hide();

                var dados_escola={
                    'valor' :  $(campo).val()
                };
                var dados = {
                    arquivo : 'ajax/list_escolas.php',
                    dados : dados_escola,
                    elemento: 'lista_escolas'
                };

                buildViewOne(dados);

                $("#lista_escolas").fadeIn();

            }else{
                $("#msg_digite").fadeIn();
                $("#lista_escolas").hide();
            }
        }

        function selecionaEscolaAula(campo){

            var escola_id = $(campo).attr("codigo");
            var nome_escola = $(campo).attr("colegio");
            var inep = $(campo).attr("inep");
            $("#nome").val(nome_escola);
            $("#escola_id").val(escola_id);
            $("#nome").attr("disabled","true");

            $("#lista_escolas").hide();
            $("#btn_outra_escola").show();

            $("#nome_escola").html(nome_escola);
            $("#inep_escola").html(inep);

            var dados_escola={
                escola_id :  escola_id
            };
            var dados = {
                arquivo : 'ajax/ano_letivo.php',
                dados : dados_escola,
                elemento: 'ano_letivo'
            };

            buildViewOne(dados);

            //$("#conteudo").fadeIn();
            $("#dados_escola").fadeIn();

        }

        function selecionarOutraEscolaAula(){
            $("#nome").val("");
            $("#escola_id").val('');
            $("#nome").removeAttr("disabled");
            $("#msg_digite").fadeIn();
            $("#conteudo").hide();
            $("#btn_outra_escola").hide();
            $("#dados_escola").hide();
            $("#nome").focus();
            $("#buttons_opcoes_turma").hide();
        }

        function getAnos(nivel_ensino_mec_id){
            var escola_id = $("#escola_id").val();
            var ano_letivo_id = $("#ano_letivo_id").val();

            var dados_escola={
                escola_id :  escola_id,
                nivel_ensino_mec_id:nivel_ensino_mec_id,
                ano_letivo_id:ano_letivo_id
            };
            var dados = {
                arquivo : 'ajax/select_ano.php',
                dados : dados_escola,
                elemento: 'ano_turma'
            };

            buildViewOne(dados);
        }

        function getTurmas(ano_id){
            var escola_id = $("#escola_id").val();
            var ano_letivo_id = $("#ano_letivo_id").val();

            var dados_escola={
                escola_id :  escola_id,
                ano_id:ano_id,
                ano_letivo_id:ano_letivo_id
            };
            var dados = {
                arquivo : 'ajax/select_turma.php',
                dados : dados_escola,
                elemento: 'turma'
            };

            buildViewOne(dados);
        }

        function getDisciplinas(turma_id){
            var escola_id = $("#escola_id").val();

            var dados_turma={
                escola_id :  escola_id,
                turma_id:turma_id
            };
            var dados = {
                arquivo : 'ajax/select_disciplina.php',
                dados : dados_turma,
                elemento: 'disciplina'
            };

            buildViewOne(dados);
        }

        function getAulas(){

            var dados_aula={
                turma_disciplina_id : $("#turma_disciplina_id").val(),
                escola_id: $("#escola_id").val()
            };
            var dados = {
                arquivo : 'ajax/list_aulas.php',
                dados : dados_aula,
                elemento: 'conteudo'
            };

            buildViewOne(dados);

            $("#buttons_opcoes_aula").fadeIn();
            $("#conteudo").fadeIn();

        }

        function formAula(aula_id){

            $("#conteudo").html('');
            $("#conteudo").hide();

            var dados_form={
                aula_id:aula_id,
                turma_disciplina_id: $("#turma_disciplina_id").val(),
                escola_id: $("#escola_id").val()
            };
            var dados = {
                arquivo : 'ajax/form_aula.php',
                dados : dados_form,
                elemento: 'conteudo'
            };

            buildViewOne(dados);

            $("#conteudo").fadeIn();

            $('html,body').animate({scrollTop: $('#conteudo').offset().top}, 1500);

        }


        function setQtdAulas(qtd_aulas){
            for (var i=1;i<=5;i++)
            {
                $(".aula"+i).hide();
            }
            for (var i=1;i<=5;i++)
            {
                if(qtd_aulas>=i) $(".aula"+i).show();
            }

        }


        function salvarAula(){

            var validado = true;
            $("input[ref=form_aula],textarea[ref=form_aula]").each(function(){
                $(this).css("border-color","#C5C5C5");
                if($(this).val()==""){
                    validado=false;
                    $(this).css("border-color","#FF8888");
                }
            });
            if(!validado){
                alert("Preencha os campos marcados!");
                return false;
            }
            block();
            var dados_aula={
                dados_form: $('#form_aula').serialize()
            };
            var dados={
                dados: dados_aula,
                function_callback : "$.unblockUI();getAulas();$().toastmessage('showSuccessToast', 'Aula salva com sucesso!');",
                arquivo : 'ajax/salva_aula.php'
            };

            processaAjax(dados);

        }




    </script>



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

                                            <input name="nome" autocomplete="off" type="text" id="nome" onKeyDown="buscaEscolasAulas(this)"  size="50" maxlength="50"></td>
                                        <td valign="bottom"> <button style="width: 200px;display: none;" id="btn_outra_escola" onclick="selecionarOutraEscolaAula()" type="button" class="bt">Selecionar outra escola</button> </td>

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

                                            <div id="buttons_opcoes_aula" style="display: none;">
                                                <div class="clear"><br></div>

                                                <button style="width: 200px; height: 40px;" id="btn_turmas" onclick="getAulas()" type="button" class="bt">
                                                    Visualizar Aulas
                                                </button>

                                                <button style="width: 200px; height: 40px;" id="btn_matricula" onclick="formAula()" type="button" class="bt">
                                                    Criar Aula
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

                            <div id="dialog_aluno"></div>


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