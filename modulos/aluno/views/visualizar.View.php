<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>mascaras.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
</head>
<body>
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr><td height="80" valign="top" bgcolor="#FFFFFF"><? include(DOMAIN_PATH.'includes/topo.php') ?></td></tr>
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
                                    <td align="center" valign="top">  <? include(DOMAIN_PATH."includes/barra.php")?></td>
                                </tr>
                                <tr> 
                                    <td align="center" valign="top">
                                         <table width="830" border="0" cellspacing="2" cellpadding="0" class="borda" style="margin:5px" >
                                           
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nome)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Endere�o:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->endereco)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�mero:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->numero)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Bairro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->bairro)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Cidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nacionalidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nacionalidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Cep:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cep)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>UF:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->uf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Local:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->local)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Complemento:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->complemento)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Inep:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->inep)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nis:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->ni)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->telefone)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Celular:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->celular)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Email:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->email)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Peso:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->peso)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Altura:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->altura)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Ra�a:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->raca)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Tipo de defici�ncia:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tipoDefic)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Tipo de transporte escolar:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tipoTranspEscolar)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Tipo de uso de internet:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tipoUsoInternet)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Sexo:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->sexo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Registro Nascimento:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->regNascimento)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�mero do livro de registro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->regLivroNum)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�mero da folha do registro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->regFolhaNum)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Comarca do Registro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->regComarca)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Rg:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->rg)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Rg org�o:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->rgOrgao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Rg data expedi��o:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->rgDataExpedicao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->titulo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Zona do t�tulo:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tituloZona)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Se��o do titulo:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tituloSecao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Carteira reservista:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->reservista)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Serie do reservista:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->reservistaSerie)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�mero da reservista:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->reservistaNumero)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�mero da categoria do reservista:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->reservistaCategNum)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CSM Reservista:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->reservistaCsm)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Carteira Profissonal:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cartProf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Grupo sanguineo:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->grupoSangue)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Fator RH:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->grupoSangueRh)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Al�gia no sangue:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->grupoSangueAlergia)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Di�betico:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->grupoSangueDiabetico)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Outra doen�a:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->outraDoenca)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Qtd. pessoas fam�lia:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->familiaComposta)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Estado Civil:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->estadoCivil)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Usa �culos:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->usaOculo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Destro:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->destro)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Conv�nio:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->convenio)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nomePai)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Pai vivo?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiVivo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nacionalidade pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiNacionalidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Naturalidade pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiNaturalidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�vel escolar pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiNivEscolar)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Religi�o pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiReligiao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Profiss�o pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiProfissao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Endere�o de trabalho pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiEnderTrab)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiTelefone)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Email pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiEmail)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiTitulo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo zona pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiTituloZona)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Se��o titulo pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiTituloSecao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nomeMae)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>M�e viva?:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeViva)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>M�e Nacionalidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeNacionalidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>M�e Naturalidade:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeNaturalidade)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�vel escolar m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeNivEscolar)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Religi�o m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeReligiao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Profiss�o m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeProfissao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Endere�o de trabalho m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeEnderTrab)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeTelefone)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Email m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeEmail)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeTitulo)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo zona m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeTituloZona)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Se��o titulo m�e :</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeTituloSecao)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>NIS m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeNi)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>NIS pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiNi)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nomeResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Parentesco respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->parentescoResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nacionalidade respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nacionalResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Naturalidade respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->naturalResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>N�vel escolar respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->nivEscolarResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Religi�o respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->religiaoResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Profiss�o respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->profissaoResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Endere�o trabalho respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->enderTrabResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->telefResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Email respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->emailResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tituloResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo zona respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tituloZonaResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Titulo se��o respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->tituloSecaoResponsavel)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Tipo de transporte escolar:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->descriTranspEscolar)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Pai uf:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->paiUf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>M�e uf:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->maeUf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Respons�vel Uf:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->responsavelUf)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Data de nascimento:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->dataNascimento)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Uf registro :</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->ufRegComarca)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CPF :</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cpfAluno)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CPF pai:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cpfPai)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CPF m�e:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cpfMae)?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>CPF respons�vel:</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($aluno->cpfResponsavel)?>
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
