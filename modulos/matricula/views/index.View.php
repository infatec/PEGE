<html>
<head>
    <title><?= $config["tituloPagina"]?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
    <script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
    <script src="<?=URL.'/webroot/js/'?>jquery.js"></script>

    <script>
        function buscaEscolasMatricula(campo){
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


        function selecionaEscolaMatricula(campo){

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


        function selecionarOutraEscolaMatricula(){
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

        function getAlunosMatriculados(){

            var dados_turma={
                turma_id : $("#turma_id").val(),
                escola_id: $("#escola_id").val()
            };
            var dados = {
                arquivo : 'ajax/alunos_matriculados.php',
                dados : dados_turma,
                elemento: 'conteudo'
            };

            buildViewOne(dados);

            $("#buttons_opcoes_turma").fadeIn();
            $("#conteudo").fadeIn();

        }

        function formMatriculaColetiva(){

            $("#conteudo").html('');
            $("#conteudo").hide();

            var dados_form={
                turma_id: $("#turma_id").val(),
                escola_id: $("#escola_id").val()
            };
            var dados = {
                arquivo : 'ajax/matricula_coletiva.php',
                dados : dados_form,
                elemento: 'conteudo'
            };

            buildViewOne(dados);

            $("#conteudo").fadeIn();

            $('html,body').animate({scrollTop: $('#conteudo').offset().top}, 1500);

        }

        function addAluno(aluno_id){

            var aluno = $("#cod_aluno_"+aluno_id).val();

            if(typeof(aluno)!='undefined'){
                alert("Esse aluno já foi adicionada.");
                return;
            }

            var dados_form={
                aluno_id: aluno_id
            };
            var dados = {
                arquivo : 'ajax/dados_aluno.php',
                dados : dados_form,
                elemento_append: 'alunos'
            };

            buildView(dados);
        }

        function matriculaAlunos(){

            block();

            var dados_alunos={
                dados_form: $('#form_matricula').serialize(),
                turma_id : $("#turma_id").val()
            };
            var dados={
                dados: dados_alunos,
                function_callback : "$.unblockUI();getAlunosMatriculados();$().toastmessage('showSuccessToast', 'Alunos matriculados com sucesso!');",
                arquivo : 'ajax/matricula_alunos.php'
            };

            processaAjax(dados);

        }

        function formAluno(aluno_id){
            var dados={
                referencia: 'aluno',
                aluno_id : aluno_id
            };

            var dados_dialog = {
                dados: dados,
                title : 'Cadastro Aluno',
                width : '890',
                height: '560',
                arquivo: 'ajax/form_aluno.php'
            }
            buildDialog(dados_dialog);
        }

        function salvaAluno(){
            block();

            var dados_aluno={
                dados_form: $('#form_aluno').serialize()
            };
            var dados={
                dados: dados_aluno,
                arquivo : 'ajax/salva_aluno.php'
            };

            retorno = getRegistrosJson(dados);
            if(retorno.erro=='1'){
                alert("Preencha todos os campos solicitados");
                $("#tr_mensagem_erro").fadeIn();
                $("#mensagem_erro").html(retorno.mensagem_erro);
                unblock();
                return false;
            }

            //getAlunosMatriculados();
            $("#dialog_aluno").dialog('close');
            $().toastmessage('showSuccessToast', "Aluno salvo com sucesso!");
            unblock();
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

                                                    <input name="nome" autocomplete="off" type="text" id="nome" onKeyDown="buscaEscolasMatricula(this)"  size="50" maxlength="50"></td>
                                                <td valign="bottom"> <button style="width: 200px;display: none;" id="btn_outra_escola" onclick="selecionarOutraEscolaMatricula()" type="button" class="bt">Selecionar outra escola</button> </td>

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

                                                        <button style="width: 200px; height: 40px;" id="btn_turmas" onclick="getAlunosMatriculados()" type="button" class="bt">
                                                            Alunos Matriculados
                                                        </button>

                                                        <button style="width: 200px; height: 40px;" id="btn_matricula" onclick="formMatriculaColetiva()" type="button" class="bt">
                                                            Matricula Coletiva
                                                        </button>

                                                        <button style="width: 200px; height: 40px;" id="btn_cadastrar_aluno" onclick="formAluno()" type="button" class="bt">
                                                            Cadastrar Aluno
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