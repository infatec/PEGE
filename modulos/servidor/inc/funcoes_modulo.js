function listEscolas(){

    var dados = {
        referencia: 'escolas'
    };
    var dados_dialog = {
        dados: dados,
        title : 'Seleção de Escolas',
        width : '620',
        height: '480',
        arquivo: 'ajax/busca_escolas.php'
    }
    buildDialog(dados_dialog);

}


function buscaEscolasServidor(campo){
    var letras_digitadas = $(campo).val().length;

    if(letras_digitadas>2){

        $("#msg_digite").hide();

        var dados_escola={
            valor :  $(campo).val()
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

function adicionaEscola(campo){
    var escola_id = $(campo).attr("codigo");

    var escola = $("#escola_"+escola_id).val();

    if(typeof(escola)!='undefined'){
        alert("Escola já foi adicionada.");
        $(campo).text("Escola já adicionada");
        $(campo).attr("disabled",true);
        return;
    }

    var dados_escola={
        nome_escola :  $(campo).attr("colegio"),
        escola_id : escola_id,
        inep : $(campo).attr("inep")

    };
    var dados = {
        arquivo : 'ajax/add_form_escola.php',
        dados : dados_escola,
        elemento_append: 'escolas'
    };

    buildView(dados);

    $(campo).text("Escola Adicionada");
    $(campo).attr("disabled",true);

    $().toastmessage('showSuccessToast', "Escola adicionada com sucesso!");
    $("#dialog_escolas").dialog("close");

}