/**
 * ARQUIVO QUE CONTEM AS FUNÇÕES JS 
 */
function refresh(){window.location.reload();}

function excluir_escola(id,nome_escola){		
	if(confirm('Deseja excluir a escola \''+nome_escola+'\'')){
		$.ajax({
			  url: "/excluirEscola.php",	
			  cache: false,
			  context: document.body,
			  data: {id : id},
			  dataType: "html",		  
			  type: "POST",
			  success: function(result){
				  var r = result.split('|');
				  alert(r[2]);
				  if(r[1] == "SUCESSO"){						  
					  refresh();
				  }				  
			  },
			  error: function(){
				  alerta('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
			  }
		});
	}	
}

function excluir_professor(id,nome_professor){		
	if(confirm('Deseja excluir o professor \''+nome_professor+'\'')){
		$.ajax({
			  url: "/excluirProfessor.php",	
			  cache: false,
			  context: document.body,
			  data: {id : id},
			  dataType: "html",		  
			  type: "POST",
			  success: function(result){
				  var r = result.split('|');
				  alert(r[2]);
				  if(r[1] == "SUCESSO"){						  
					  refresh();
				  }				  
			  },
			  error: function(){
				  alert('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
			  }
		});
	}	
}

function excluir_aluno(id,nome_aluno){
	if(confirm('Deseja excluir o Aluno \''+nome_aluno+'\'')){
		$.ajax({
			  url: "/excluirAluno.php",	
			  cache: false,
			  context: document.body,
			  data: {id : id},
			  dataType: "html",		  
			  type: "POST",
			  success: function(result){
				  var r = result.split('|');
				  alert(r[2]);
				  if(r[1] == "SUCESSO"){						  
					  refresh();
				  }				  
			  },
			  error: function(){
				  alert('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
			  }
		});
	}
}

function carregar_edicao_escola(id){
	$.ajax({
		  url: "/FormEdicaoEscola.php",	
		  cache: false,
		  context: document.body,
		  data: {id : id},
		  dataType: "html",		  
		  type: "POST",
		  success: function(result){
			  $("#div_cadastro_edicao").fadeIn("slow");
			  $("#div_cadastro_edicao").html(result);  
		  },
		  error: function(){
			  alert('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
		  }
	});
}

function carregar_edicao_professor(id){
	$.ajax({
		  url: "/FormEdicaoProfessor.php",	
		  cache: false,
		  context: document.body,
		  data: {id : id},
		  dataType: "html",		  
		  type: "POST",
		  success: function(result){
			  $("#div_cadastro_edicao").fadeIn("slow");
			  $("#div_cadastro_edicao").html(result);  
		  },
		  error: function(){
			  alert('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
		  }
	});
}

function carregar_edicao_aluno(id){
	$.ajax({
		  url: "/FormEdicaoAluno.php",	
		  cache: false,
		  context: document.body,
		  data: {id : id},
		  dataType: "html",		  
		  type: "POST",
		  success: function(result){
			  $("#div_cadastro_edicao").fadeIn("slow");
			  $("#div_cadastro_edicao").html(result);  
		  },
		  error: function(){
			  alert('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
		  }
	});
}

function atualizar_escola(){
	var id_escola	 	= $("#id_escola").val();
	var escola_nome 	= $("#escola_nome").val();
	var cod_escola 		= $("#cod_escola").val();
	var endereco 		= $("#endereco").val();
	var numero 			= $("#numero").val();
	var bairro 			= $("#bairro").val();
	var cidade 			= $("#cidade").val();
	var uf	 			= $("#uf").val();
	var cep 			= $("#cep").val();
	var quant_aluno 	= $("#quant_aluno").val();
	var quant_prof 		= $("#quant_prof").val();
	var quant_aux 		= $("#quant_aux").val();
	var quant_monitores = $("#quant_monitores").val();
	var funciona 		= $("#funciona").val();
	var local 			= $("#local").val();
	var sit_censo 		= $("#sit_censo").val();
	var ddd 			= $("#ddd").val();
	var telefone 		= $("#telefone").val();
	var email 			= $("#email").val();
	var quant_tradut_libras = $("#quant_tradut_libras").val();
	
	if(confirm("Deseja Atualizar a Escola "+ escola_nome+ "?")){
		$("#div_cadastro_edicao").fadeOut("slow");
		$("#status_processo").fadeIn("slow");
		$("#status_processo").html("Atualizando...<br> <img src='/images/loader.gif' alt='carregando'/>")		
		$.ajax({
			  url: "/editarEscola.php",	
			  cache: false,
			  context: document.body,
			  data: {
				  		id_escola : id_escola,
					  	  escola_nome : escola_nome,
						  cod_escola : cod_escola,
						  endereco : endereco,
						  numero : numero,
						  bairro : bairro,
						  cidade : cidade,
						  uf : uf,
						  cep : cep,
						  quant_aluno : quant_aluno,
						  quant_prof : quant_prof,
						  quant_aux : quant_aux,
						  quant_monitores : quant_monitores,
						  quant_tradut_libras : quant_tradut_libras,
						  funciona : funciona,
						  local : local,
						  sit_censo : sit_censo,
						  ddd : ddd,
						  telefone : telefone,
						  email : email
					},
			  dataType: "html",		  
			  type: "POST",
			  success: function(result){
//				  alert(result);
				  r = result.split('|');
				  alert(r[2]);
				  if(r[1] == "SUCESSO"){						  
					  refresh();
				  }				  
			  },
			  error: function(){
				  alerta('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
			  }
		});
	}
}

function atualizar_professor(){
	var id_servidor = $("#id_servidor").val();	
	var nome = $("#nome").val();
	var matricula = $("#matricula").val();
	var cpf = $("#cpf").val();
	var data_nascimento = $("#data_nascimento").val();	
	var funcao = $("#funcao").val();
	var data_admissao = $("#data_admissao").val();
	var cod_lotado = $("#cod_lotado").val();
	var descric_lotado = $("#descric_lotado").val();
	var rg = $("#rg").val();
	var pis = $("#pis").val();
	var carteira_trab = $("#carteira_trab").val();
	var carteira_serie = $("#carteira_serie").val();
	var hora_trabalho = $("#hora_trabalho").val();
	var situacao = $("#situacao").val();
	var endereco = $("#endereco").val();
	var bairro = $("#bairro").val();
	var cidade = $("#cidade").val();
	var uf = $("#uf").val();var cargo = $("#cargo").val();
	
	if(confirm("Deseja Atualizar o Servidor "+ nome+ "?")){
		$("#div_cadastro_edicao").fadeOut("slow");
		$("#status_processo").fadeIn("slow");
		$("#status_processo").html("Atualizando...<br> <img src='/images/loader.gif' alt='carregando'/>")		
		$.ajax({
			  url: "/editarProfessor.php",	
			  cache: false,
			  context: document.body,
			  data: {
				  		id_servidor : id_servidor,
				  		nome : nome,
				  		matricula : matricula,
				  		cpf : cpf,
				  		data_nascimento : data_nascimento,				  		
				  		funcao : funcao,
				  		data_admissao : data_admissao,
				  		cod_lotado : cod_lotado,
				  		descric_lotado : descric_lotado,
				  		rg : rg,
				  		pis : pis,
				  		carteira_trab : carteira_trab,
				  		carteira_serie : carteira_serie,
				  		hora_trabalho : hora_trabalho,
				  		situacao : situacao,
				  		endereco : endereco,
				  		bairro : bairro,
				  		cidade : cidade,
				  		uf : uf
					},
			  dataType: "html",		  
			  type: "POST",
			  success: function(result){
//				  alert(result);
				  $("#status_processo").fadeOut("fast");
				  r = result.split('|');
				  alert(r[2]);
				  if(r[1] == "SUCESSO"){						  
					  refresh();
				  }			  
			  },
			  error: function(){
				  alerta('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
			  }
		});
	}
}

function atualizar_aluno(){
	var id_aluno = $("#id_aluno").val();
	var aluno_nome = $("#aluno_nome").val();
	var endereco = $("#endereco").val();
	var numero = $("#numero").val();
	var bairro = $("#bairro").val();
	var cidade = $("#cidade").val();
	var uf = $("#uf").val();
	var inep = $("#inep").val();
	var nis = $("#nis").val();
	var telefone = $("#telefone").val();
	var celular = $("#celular").val();
	var email = $("#email").val();
	var peso = $("#peso").val();
	var altura = $("#altura").val();
	var data_grav = $("#data_grav").val();
	var raca = $("#raca").val();
	var tipo_defic = $("#tipo_defic").val();
	var tipo_transp_escolar = $("#tipo_transp_escolar").val();
	var id_educ_censo = $("#id_educ_censo").val();
	var tipo_uso_internet = $("#tipo_uso_internet").val();
	var sexo = $("#sexo").val();
	var reg_nascimento = $("#reg_nascimento").val();
	var reg_livro_num = $("#reg_livro_num").val();
	var reg_folha_num = $("#reg_folha_num").val();
	var reg_comarca = $("#reg_comarca").val();
	var rg = $("#rg").val();
	var rg_orgao = $("#rg_orgao").val();
	var rg_data_expedicao = $("#rg_data_expedicao").val();
	var titulo = $("#titulo").val();
	var titulo_zona = $("#titulo_zona").val();
	var titulo_secao = $("#titulo_secao").val();
	var reservista = $("#reservista").val();
	var reservista_serie = $("#reservista_serie").val();
	var reservista_numero = $("#reservista_numero").val();
	var reservista_categ_num = $("#reservista_categ_num").val();
	var reservista_csm = $("#reservista_csm").val();
	var cart_prof = $("#cart_prof").val();
	var grupo_sangue = $("#grupo_sangue").val();
	var grupo_sangue_rh = $("#grupo_sangue_rh").val();
	var grupo_sangue_alergia = $("#grupo_sangue_alergia").val();
	var grupo_sangue_diabetico = $("#grupo_sangue_diabetico").val();
	var outra_doenca = $("#outra_doenca").val();
	var familia_composta = $("#familia_composta").val();
	var estado_civil = $("#estado_civil").val();
	var usa_oculos = $("#usa_oculos").val();
	var destro = $("#destro").val();
	var convenio = $("#convenio").val();
	var nome_pai = $("#nome_pai").val();
	var pai_vivo = $("#pai_vivo").val();
	var pai_nacionalidade = $("#pai_nacionalidade").val();
	var pai_naturalidade = $("#pai_naturalidade").val();
	var pai_niv_escolar = $("#pai_niv_escolar").val();
	var pai_religiao = $("#pai_religiao").val();
	var pai_profissao = $("#pai_profissao").val();
	var pai_ender_trab = $("#pai_ender_trab").val();
	var pai_telefone = $("#pai_telefone").val();
	var pai_email = $("#pai_email").val();
	var pai_titulo = $("#pai_titulo").val();
	var pai_titulo_zona = $("#pai_titulo_zona").val();
	var pai_titulo_secao = $("#pai_titulo_secao").val();
	var nome_mae = $("#nome_mae").val();
	var mae_viva = $("#mae_viva").val();
	var mae_nacionalidade = $("#mae_nacionalidade").val();
	var mae_naturalidade = $("#mae_naturalidade").val();
	var mae_niv_escolar = $("#mae_niv_escolar").val();
	var mae_religiao = $("#mae_religiao").val();
	var mae_profissao = $("#mae_profissao").val();
	var mae_ender_trab = $("#mae_ender_trab").val();
	var mae_telefone = $("#mae_telefone").val();
	var mae_email = $("#mae_email").val();
	var mae_titulo = $("#mae_titulo").val();
	var mae_titulo_zona = $("#mae_titulo_zona").val();
	var mae_titulo_secao = $("#mae_titulo_secao").val();
	var mae_nis = $("#mae_nis").val();
	var pai_nis = $("#pai_nis").val();
	var nome_responsavel = $("#nome_responsavel").val();
	var parentesco_responsavel = $("#parentesco_responsavel").val();
	var nacional_responsavel = $("#nacional_responsavel").val();
	var natural_responsavel = $("#natural_responsavel").val();
	var niv_escolar_responsavel = $("#niv_escolar_responsavel").val();
	var religiao_responsavel = $("#religiao_responsavel").val();
	var profissao_responsavel = $("#profissao_responsavel").val();
	var ender_trab_responsavel = $("#ender_trab_responsavel").val();
	var telef_responsavel = $("#telef_responsavel").val();
	var email_responsavel = $("#email_responsavel").val();
	var titulo_responsavel = $("#titulo_responsavel").val();
	var titulo_zona_responsavel = $("#titulo_zona_responsavel").val();
	var titulo_secao_responsavel = $("#titulo_secao_responsavel").val();
	var descri_transp_escolar = $("#descri_transp_escolar").val();
	var pai_uf = $("#pai_uf").val();
	var mae_uf = $("#mae_uf").val();
	var responsavel_uf = $("#responsavel_uf").val();
	var data_nascim = $("#data_nascim").val();
	var uf_reg_comarca = $("#uf_reg_comarca").val();
	var cpf_aluno = $("#cpf_aluno").val();
	var cpf_pai = $("#cpf_pai").val();
	var cpf_mae = $("#cpf_mae").val();
	var cpf_responsavel = $("#cpf_responsavel").val();
	
	if(confirm("Deseja Atualizar o Aluno "+ aluno_nome+ "?")){
		$("#div_cadastro_edicao").fadeOut("slow");
		$("#status_processo").fadeIn("slow");
		$("#status_processo").html("Atualizando...<br> <img src='/images/loader.gif' alt='carregando'/>")		
		$.ajax({
			  url: "/editarAluno.php",	
			  cache: false,
			  context: document.body,
			  data: {
					  id_aluno : id_aluno,
					  aluno_nome : aluno_nome,
					  endereco : endereco,
					  numero : numero,
					  bairro : bairro,
					  cidade : cidade,
					  uf : uf,
					  inep : inep,
					  nis : nis,
					  telefone : telefone,
					  celular : celular,
					  email : email,
					  peso : peso,
					  altura : altura,
					  data_grav : data_grav,
					  raca : raca,
					  tipo_defic : tipo_defic,
					  tipo_transp_escolar : tipo_transp_escolar,
					  id_educ_censo : id_educ_censo,
					  tipo_uso_internet : tipo_uso_internet,
					  sexo : sexo,
					  reg_nascimento : reg_nascimento,
					  reg_livro_num : reg_livro_num,
					  reg_folha_num : reg_folha_num,
					  reg_comarca : reg_comarca,
					  rg : rg,
					  rg_orgao : rg_orgao,
					  rg_data_expedicao : rg_data_expedicao,
					  titulo : titulo,
					  titulo_zona : titulo_zona,
					  titulo_secao : titulo_secao,
					  reservista : reservista,
					  reservista_serie : reservista_serie,
					  reservista_numero : reservista_numero,
					  reservista_categ_num : reservista_categ_num,
					  reservista_csm : reservista_csm,
					  cart_prof : cart_prof,
					  grupo_sangue : grupo_sangue,
					  grupo_sangue_rh : grupo_sangue_rh,
					  grupo_sangue_alergia : grupo_sangue_alergia,
					  grupo_sangue_diabetico : grupo_sangue_diabetico,
					  outra_doenca : outra_doenca,
					  familia_composta : familia_composta,
					  estado_civil : estado_civil,
					  usa_oculos : usa_oculos,
					  destro : destro,
					  convenio : convenio,
					  nome_pai : nome_pai,
					  pai_vivo : pai_vivo,
					  pai_nacionalidade : pai_nacionalidade,
					  pai_naturalidade : pai_naturalidade,
					  pai_niv_escolar : pai_niv_escolar,
					  pai_religiao : pai_religiao,
					  pai_profissao : pai_profissao,
					  pai_ender_trab : pai_ender_trab,
					  pai_telefone : pai_telefone,
					  pai_email : pai_email,
					  pai_titulo : pai_titulo,
					  pai_titulo_zona : pai_titulo_zona,
					  pai_titulo_secao : pai_titulo_secao,
					  nome_mae : nome_mae,
					  mae_viva : mae_viva,
					  mae_nacionalidade : mae_nacionalidade,
					  mae_naturalidade : mae_naturalidade,
					  mae_niv_escolar : mae_niv_escolar,
					  mae_religiao : mae_religiao,
					  mae_profissao : mae_profissao,
					  mae_ender_trab : mae_ender_trab,
					  mae_telefone : mae_telefone,
					  mae_email : mae_email,
					  mae_titulo : mae_titulo,
					  mae_titulo_zona : mae_titulo_zona,
					  mae_titulo_secao : mae_titulo_secao,
					  mae_nis : mae_nis,
					  pai_nis : pai_nis,
					  nome_responsavel : nome_responsavel,
					  parentesco_responsavel : parentesco_responsavel,
					  nacional_responsavel : nacional_responsavel,
					  natural_responsavel : natural_responsavel,
					  niv_escolar_responsavel : niv_escolar_responsavel,
					  religiao_responsavel : religiao_responsavel,
					  profissao_responsavel : profissao_responsavel,
					  ender_trab_responsavel : ender_trab_responsavel,
					  telef_responsavel : telef_responsavel,
					  email_responsavel : email_responsavel,
					  titulo_responsavel : titulo_responsavel,
					  titulo_zona_responsavel : titulo_zona_responsavel,
					  titulo_secao_responsavel : titulo_secao_responsavel,
					  descri_transp_escolar : descri_transp_escolar,
					  pai_uf : pai_uf,
					  mae_uf : mae_uf,
					  responsavel_uf : responsavel_uf,
					  data_nascim : data_nascim,
					  uf_reg_comarca : uf_reg_comarca,
					  cpf_aluno : cpf_aluno,
					  cpf_pai : cpf_pai,
					  cpf_mae : cpf_mae,
					  cpf_responsavel : cpf_responsavel
					},
			  dataType: "html",		  
			  type: "POST",
			  success: function(result){
//				  alert(result);
				  r = result.split('|');
				  alert(r[2]);
				  if(r[1] == "SUCESSO"){						  
					  refresh();
				  }				  
			  },
			  error: function(){
				  alerta('N\u00E3o foi poss\u00EDvel completar a requisi\u00E7\u00E3o');
			  }
		});
	}
}

function cancelar_edicao(){
	$("#div_cadastro_edicao").html('');
	$("#div_cadastro_edicao").fadeOut("slow");
	$("#status_processo").html('');
	$("#status_processo").fadeOut("slow");
}

function verifica_selecao_filtro(){
	if($("#campo_busca").val() == '0'){
		alert('Selecione um Filtro!');
		$("#campo_busca").focus();
		return false;
	}
}

function gerar_relatorio_pdf_escola(){
	if($("#campo_busca").val() == '0'){
		alert('Selecione um Filtro!');
		$("#campo_busca").focus();
		return false;
	}
	if($("#valor_busca").val()== '' && $("#campo_busca").val() != 'T'){
		alert("Informe o conteudo do Filtro!");
		$("#valor_busca").focus();
		return false;
	}	
	abrir_janela("/relatorioEscolaPdf.php?campo_busca="+$("#campo_busca").val()+"&valor_busca="+$("#valor_busca").val(),'Relatorio_Escola_PDF');
}

function gerar_relatorio_pdf_professor(){
	if($("#campo_busca").val() == '0'){
		alert('Selecione um Filtro!');
		$("#campo_busca").focus();
		return false;
	}
	if($("#valor_busca").val()== '' && $("#campo_busca").val() != 'T'){
		alert("Informe o conteudo do Filtro!");
		$("#valor_busca").focus();
		return false;
	}
	
	abrir_janela("/relatorioProfessorPdf.php?campo_busca="+$("#campo_busca").val()+"&valor_busca="+$("#valor_busca").val(),'Relatorio_Escola_PDF');
}

function gerar_relatorio_pdf_aluno(){
	if($("#campo_busca").val() == '0'){
		alert('Selecione um Filtro!');
		$("#campo_busca").focus();
		return false;
	}
	if($("#valor_busca").val()== '' && $("#campo_busca").val() != 'T'){
		alert("Informe o conteudo do Filtro!");
		$("#valor_busca").focus();
		return false;
	}
	
	abrir_janela("/relatorioAlunoPdf.php?campo_busca="+$("#campo_busca").val()+"&valor_busca="+$("#valor_busca").val(),'Relatorio_Escola_PDF');
}

function abrir_janela(pagina,titulo){window.open(pagina,titulo);}

function open_modal(id_div){
	$('#mask').fadeIn(500);
	$('#mask').fadeTo("slow",0.9);
	
	var h = $(document).height();
	var w = $(document).width();
	 
//	var fh = h / 2 - $('#'+id_div).height() / 2;
//	var fw = w / 2 - $('#'+id_div).width() / 2;
	var top = '10%';
	var left = '15%';
	var width = '70%';
	var height = '70%';
	
	$('#'+id_div).css('top', top);
	$('#'+id_div).css('left', left);
	$('#'+id_div).css('width', width);
	$('#'+id_div).css('height', height);	
	
	$('#'+id_div).fadeIn(1000);
	$('html, body').animate({scrollTop:0}, 'slow');
	$('#mask').click(function() {
		close_modal(id_div);				 
	});
}

function open_modal_2(id_div,top,left,width){
	$('#mask').fadeIn(500);
	$('#mask').fadeTo("slow",0.8);
	
	var h = $(document).height();
	var w = $(document).width();	
	
	$('#'+id_div).css('top', top);
	$('#'+id_div).css('left', left);
	$('#'+id_div).css('width', width);		
	
	$('#'+id_div).fadeIn(1000);
	$('html, body').animate({scrollTop:0}, 'slow');
	$('#mask').click(function() {
		close_modal(id_div);				 
	});
}

function close_modal(id_div){
	$('#mask').hide('slow');
	$('#'+id_div).hide('slow');
}

function close_modal_2(id_div){
//	$('#mask').hide('slow');
	$('#'+id_div).hide('slow');
}
