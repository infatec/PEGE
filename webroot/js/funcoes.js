function sair_tick()
{
	tb_remove();
	
}

function inserir(dados)
{
	$('#'+dados["campo_nome"]).val(dados["valor_nome"]);
	$('#'+dados["campo_id"]).val(dados["valor_id"]);
	tb_remove();
}

function buscaCidadeEstado(nome_cidade,estado_id,cidade_id,nome_input_cidade)
{
	var dados_string;
	$.ajax({
			method: "get",url: "../../includes/ajax/retorna_estado_id.php?nome_cidade="+nome_cidade,
			dataType: "html",
			beforeSend: function(){ 
						tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
						},
			complete:function()
			{
				tb_remove();
			}, 
			success:function(html){
				dados_string = html.split("|");//aqui eu separo o valor pra separa a descricao do id
				$("#"+estado_id).val(''+parseInt(dados_string[0])+''); 
				carregaCidade(estado_id,cidade_id,nome_input_cidade,parseInt(dados_string[1]));
				//setTimeout($('#'+nome_input_cidade).val(''+parseInt(dados_string[1])+''),1000);
				//$("#"+nome_input_cidade).val(''+parseInt(dados_string[1])+''); 
		 }
	 }); //close $.ajax(
}

function carregaCidade(estado_id,cidade,nome_input,cidade_id_valor)
{
	var estado;
	estado = $("#"+estado_id).val();
	$.ajax({
			method: "get",url: "../../includes/ajax/retorna_cidade.php?estado_id="+estado+"&nome_input="+nome_input+"&cidade_id_valor="+cidade_id_valor,
			dataType: "html",
			beforeSend: function(){ 
						tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
						},
			complete: function()
			{
				tb_remove();
			}, 
			success: function(html){ 
				$("#"+cidade).html("");
				$("#"+cidade).append(html);
				$("#"+cidade).show();
				$("#"+nome_input).focus();
		 }
	 });
}
function carregaCep(cep,endereco_id,bairro_id,estado_id,cidade_id,nome_input_cidade)
{
	var dados=new Array();	
	var dados_string;
	$.ajax({
			method: "get",url: "../../includes/ajax/retorna_cep.php?cep="+cep,
			dataType: "html",
			beforeSend:  function(){ 
						tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
						},
			complete: function()
			{
				tb_remove();
			}, 
			success: function(html){ 
				//alert(html);
				dados_string = html;
				if(dados_string!=0)
				{
					dados_string = dados_string.split("|");//aqui eu separo o valor pra separa a descricao do id	
					dados["estado"] = dados_string[2];
					dados["cidade"] = dados_string[3];
					dados["bairro"] = dados_string[4];
					dados["endereco"] = dados_string[5]+" "+dados_string[6];
					
					$("#"+endereco_id).val(dados["endereco"]);
					$("#"+bairro_id).val(dados["bairro"]);
					buscaCidadeEstado(dados["cidade"],estado_id,cidade_id,nome_input_cidade)
				}
				else
				{
					alert("CEP inválido");
					$("#"+endereco_id).val("");
					$("#"+bairro_id).val("");
					$("#"+estado_id).val("0");
					$("#"+cidade_id).html("<select disabled='disabled'><option>Selecione um estado..</option></select>");
					
				}
		 }
	 }); //close $.ajax(
}
function abasSimples()
{

	var abas = 'p#abas';
	var conteudos = 'ul#conteudos';

	$(conteudos + ' li').hide();

	$(conteudos + ' li:first-child').show();

	$(abas + ' a').click(function()
	{

		$(abas + ' a').removeClass('selected');
		$(this).addClass('selected');
		$(conteudos + ' li').hide();

		$(conteudos +  ' ' + $(this).attr('href')).show();

		return false;

	});

}

function ContaCaracteresCampo(c1, c2, quantidade)
{
    intCaracteres = quantidade - document.getElementById(''+c1+'').value.length;
    if (intCaracteres > 0) {
        document.getElementById(''+c2+'').value = intCaracteres;
        return true;
    }
    else
    {
        document.getElementById(''+c2+'').value= 0;
        document.getElementById(''+c1+'').value = document.getElementById(''+c1+'').value.substr(0,quantidade)
        return false;
    }
}

function existeElementoRegistro(elemento,msg){
    var verifica_elemento = $('#'+elemento).val();
    if(typeof verifica_elemento == 'undefined'){
        return false;
    }else{
        alert(msg);
        return true;
    }
}

function buildView(dados_build){
    $.post(dados_build.arquivo,dados_build.dados, function(resposta){
        $('#'+dados_build.elemento_append).append(resposta);

        if(typeof(dados_build.function_callback) != 'undefined'){
            eval(dados_build.function_callback);
        }
    });
}

function processaAjaxGetResposta(dados){

    var resposta;
    $.ajax({
        type: 'POST',
        url: dados.arquivo,
        data: dados.dados,
        success: function(retorno){
            resposta = retorno;
        },
        dataType: 'html',
        async:false
    });
    return resposta;

}

function buildViewOne(dados_build_one){
    $.post(dados_build_one.arquivo, dados_build_one.dados, function(resposta){
        if(typeof(dados_build_one.elemento) != 'undefined')
            $('#'+dados_build_one.elemento).html(resposta);

        if(typeof(dados_build_one.function_callback) != 'undefined'){
            eval(dados_build_one.function_callback);
        }
    });
}

function removeElemento(elemento,msg_confirmacao){
    var confirma_removocao = confirm(msg_confirmacao);
    if(confirma_removocao){
        $('#'+elemento).remove();
        return true;
    }else{
        return false;
    }
}
function removeAjax(dados){
    var dados_array = [];
    $.ajax({
        type: 'POST',
        url: dados.arquivo,
        data: dados.dados,
        success: function(dados_retorno){
            if(!dados_retorno){
                dados_array = [];
            }else{
                dados_array = dados_retorno;
            }
        },
        dataType: 'json',
        async:false
    });
    return dados_array;
}

function processaAjax(dados){
    $.post(dados.arquivo,dados.dados, function(){
        if(typeof(dados.function_callback) != 'undefined'){
            eval(dados.function_callback);
        }
    });
}

function getRegistrosJson(dados){
    var dados_array = [];
    $.ajax({
        type: 'POST',
        url: dados.arquivo,
        data: dados.dados,
        success: function(dados_retorno){
            dados_array = dados_retorno;
        },
        dataType: 'json',
        async:false
    });
    return dados_array;
}


function percorreArray(array_json,name_elemento){
    $.each(array_json, function(key, value) {
        alert(key+'-'+value);
    });

    var elemento = $("input[name^='name_elemento']");
    elemento.each(function(){
        alert($(this).val());
    });
}

function selecionaTudoCheckBox(name_elemento){
    $("input[name='"+name_elemento+"[]']").each(function(){
        if(!this.checked){
            $(this).attr("checked", "checked");
            $("#"+name_elemento+"_check").text("Desmarcar todos");
        }else{
            $(this).removeAttr("checked");
            $("#"+name_elemento+"_check").text("Marcar todos");
        }
    })
}

function selecionaTudoCheckBoxByIdDiv(name_id){
    $('#'+name_id+' input').each(function(){
        if(!this.checked){
            $(this).attr("checked", "checked");
            $("#"+name_id+"_check").text("Desmarcar todos");
        }else{
            $(this).removeAttr("checked");
            $("#"+name_id+"_check").text("Marcar todos");
        }
    })
}

function buildDialog(obj){

    var dialog = $('#dialog_'+obj.dados.referencia);
    //dialog.dialog( "close" );
    dialog.html('').attr('title',obj.title);

    $.post(obj.arquivo, obj.dados , function(html){
        dialog.html(html).dialog({
            width: obj.width,
            height: obj.height ,
            modal: true,
            close: function(ev, ui) { }
        });
    });

}

function block(){
    $.blockUI({
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '6px',
            '-moz-border-radius': '6px',
            'border-radius': '6px',
            opacity: .5,
            color: '#fff',
            fontSize: '13px',
            width: '180px',
            left: '43%'
        },
        message: $('#splash'),
        centerY: 0
    });
}

function unblock(){
    $.unblockUI();
}

function textInline($text) {

    $text = str_replace("\n","",$text);
    $text = str_replace("\r","",$text);
    $text = addslashes($text);

    return $text;

}


function buscaEscolas(campo){
    var letras_digitadas = $(campo).val().length;

    if(letras_digitadas>2){

        $("#msg_digite").hide();

        var dados_escola={
            'valor' :  $(campo).val()
        };
        var dados = {
            arquivo : '../escola/ajax/list_escolas.php',
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
function selecionaEscola(campo){

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
        arquivo : 'ajax/list_dados.php',
        dados : dados_escola,
        elemento: 'lista_dados'
    };

    buildViewOne(dados);

    $("#lista_dados").fadeIn();
    $("#dados_escola").fadeIn();

}

function selecionarOutraEscola(){
    $("#nome").val("");
    $("#escola_id").val('');
    $("#nome").removeAttr("disabled");
    $("#msg_digite").fadeIn();
    $("#lista_dados").hide();
    $("#btn_outra_escola").hide();
    $("#dados_escola").hide();
    $("#nome").focus();

}

function vinculaMecEscola(escola_id,dado_mec_id,action){
    block();

    var dados = {
        escola_id:   escola_id,
        dado_mec_id: dado_mec_id,
        action:action
    };

    var dados_processa = {
        dados: dados,
        arquivo: 'ajax/vincula_mec.php'
    }

    processaAjax(dados_processa);

    unblock();
}
function carregaFoto(valor)
{
    $("#foto").val(valor);
}

function abrePopup(caminho,largura,altura){

    //pega a resolução do visitante

    w = screen.width;
    h = screen.height;

    //divide a resolução por 2, obtendo o centro do monitor
    meio_w = w/2;
    meio_h = h/2;

    //diminui o valor da metade da resolução pelo tamanho da janela, fazendo com q ela fique centralizada
    altura2 = altura/2;
    largura2 = largura/2;
    meio1 = meio_h-altura2;
    meio2 = meio_w-largura2;

    window.open(caminho,'','toolbar=no,scrollbars=yes, location=no,directories=no, status=no, menubar=no, height=' + altura + ', width=' + largura + ', top='+meio1+', left='+meio2+' resizeable=yes');
}




