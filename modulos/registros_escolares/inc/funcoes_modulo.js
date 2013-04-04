
function buscaEscolasTurma(campo){
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

function selecionarOutraEscolaTurma(){
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

function selecionaEscolaTurma(campo){

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

function getTurmas(){

    var dados_anoletivo={
        ano_letivo_id : $("#ano_letivo_id").val(),
        escola_id: $("#escola_id").val()
    };
    var dados = {
        arquivo : 'ajax/turmas_escola.php',
        dados : dados_anoletivo,
        elemento: 'conteudo'
    };

    buildViewOne(dados);

    $("#buttons_opcoes_turma").fadeIn();
    $("#conteudo").fadeIn();

}

function formTurma(turma_id){

    $("#conteudo").html('');
    $("#conteudo").hide();

    var dados_form={
        turma_id: turma_id,
        ano_letivo_id : $("#ano_letivo_id").val(),
        escola_id: $("#escola_id").val()
    };
    var dados = {
        arquivo : 'ajax/form_turma.php',
        dados : dados_form,
        elemento: 'conteudo'
    };

    buildViewOne(dados);

    $("#conteudo").fadeIn();

    $('html,body').animate({scrollTop: $('#conteudo').offset().top}, 1500);

}

function formDisciplina(){
    var dados_form={
        referencia: 'disciplina',
        dados_grade_horario: $('#form_grade_horario').serialize(),
        ano_letivo_id : $("#ano_letivo_id").val(),
        escola_id: $("#escola_id").val()
    };

    var dados_dialog = {
        dados: dados_form,
        title : 'Inserir Disciplina',
        width : '790',
        height: '595',
        arquivo: 'ajax/form_disciplina.php'
    }
    buildDialog(dados_dialog);
}

function adicionarDisciplinaHorario(cod_disciplina,cod_horario,dia_semana){
    if(cod_disciplina==""){
        alert("Selecione uma disciplina");
        return;
    }
    var nome_disciplina = $('#cod_disciplina option:selected').text();   //$("#suggest_disciplina").val();

    var text_horario_dialog = nome_disciplina+' <a href="javascript:;" onclick="removerDisciplinaHorario('+cod_horario+','+dia_semana+')";> &raquo;Remover</a>';

    $("#"+cod_horario+"_"+dia_semana+"_text_dialog").html(text_horario_dialog);

    $("#horarios_disciplina_selecionados").append('<input type="hidden" value="'+cod_horario+'_'+dia_semana+'" name="horarios_disciplina[]" id="horario_disciplina_'+cod_horario+'_'+dia_semana+'" >');

}
function removerDisciplinaHorario(cod_horario,dia_semana){

    var text_horario_dialog = '<button class="bt" onclick="adicionarDisciplinaHorario($(\'#suggest_disciplina\').attr(\'cod_disciplina\'),'+cod_horario+','+dia_semana+')" style="width: 76px;height: 40px;"> Adicionar Aqui</button>';

    $("#"+cod_horario+"_"+dia_semana+"_text_dialog").html(text_horario_dialog);

    $("#horario_disciplina_"+cod_horario+"_"+dia_semana).remove();

}

function addDisciplina(){
    var disciplina_id = $("#cod_disciplina").val();

    var disciplina = $("#disciplina_"+disciplina_id).val();

    if(typeof(disciplina)!='undefined'){
        alert("Essa disciplina já foi adicionada.");
        return;
    }

    var dados_form={

        dados_disciplina: $('#form_disciplina').serialize(),
        nome_disciplina : $('#cod_disciplina option:selected').text()

    };
    var dados = {
        arquivo : 'ajax/add_disciplina.php',
        dados : dados_form,
        elemento_append: 'disciplinas'
    };

    buildView(dados);

    $("#dialog_disciplina").dialog("close");
}

function removeDisciplinaAdicionada(cod_disciplina){

    var confirma_removocao = confirm('Desejar remover essa disciplina?');
    if(confirma_removocao){

        $('#horarios_inseridos_'+cod_disciplina+' > input[type=hidden]').each(function() {

            cod_horario_diasemana = $(this).val();
            //alert("#"+cod_horario_diasemana+"_text");
            $("#"+cod_horario_diasemana+"_text").html('');
            $("#nomeDisc_"+cod_horario_diasemana).val('');
            $("#idDisc_"+cod_horario_diasemana).val('');

        });

        $('#disciplina_'+cod_disciplina).remove();

        return true;
    }else{
        return false;
    }

    var cod_horario_diasemana;

}

function getAnos(nivel_ensino_mec_id){
    var escola_id = $("#escola_id").val();

    var dados_escola={
        escola_id :  escola_id,
        nivel_ensino_mec_id:nivel_ensino_mec_id
    };
    var dados = {
        arquivo : 'ajax/select_ano.php',
        dados : dados_escola,
        elemento: 'ano_turma'
    };

    buildViewOne(dados);
}

function salvarTurma(){
    block();

    var dados_turma={
        dados_form: $('#form_turma').serialize(),
        ano_letivo_id : $("#ano_letivo_id").val(),
        escola_id: $("#escola_id").val()
    };
    var dados={
        dados: dados_turma,
        function_callback : "$.unblockUI();getTurmas();$().toastmessage('showSuccessToast', 'Turma inserida com sucesso!');",
        arquivo : 'ajax/salva_turma.php'
    };

    processaAjax(dados);

}
