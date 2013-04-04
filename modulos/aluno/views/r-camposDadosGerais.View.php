<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao' colspan="3">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($aluno->nome)?>'  size='80' maxlength='100' />

    </td>
</tr>


<tr>

    <td height='36' align='right' class='text_bold_preto'>Data de nascimento</td>
    <td class='text_padrao'>
        <input name='data_nascimento' type='text' class='data <?=$erro['data_nascimento']?>' id='data_nascimento' value='<?=geradatabr1($aluno->dataNascimento)?>'  size='' maxlength='' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>CPF </td>
    <td class='text_padrao'>
        <input name='cpf_aluno' type='text' class='cpf <?=$erro['cpf_aluno']?>' id='cpf_aluno' value='<?=stripslashes($aluno->cpfAluno)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Inep</td>
    <td class='text_padrao'>
        <input name='inep' type='text' class='<?=$erro['inep']?>' id='inep' value='<?=stripslashes($aluno->inep)?>'  size='30' maxlength='30' />

    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Endereço</td>
    <td class='text_padrao' colspan="3">
        <input name='endereco' type='text' class='<?=$erro['endereco']?>' id='endereco' value='<?=stripslashes($aluno->endereco)?>'  size='100' maxlength='100' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Número</td>
    <td class='text_padrao'>
        <input name='numero' type='text' class='<?=$erro['numero']?>' id='numero' value='<?=stripslashes($aluno->numero)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Bairro</td>
    <td class='text_padrao'>
        <input name='bairro' type='text' class='<?=$erro['bairro']?>' id='bairro' value='<?=stripslashes($aluno->bairro)?>'  size='40' maxlength='100' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Cep</td>
    <td class='text_padrao'>
        <input name='cep' type='text' class='cep <?=$erro['cep']?>' id='cep' value='<?=stripslashes($aluno->cep)?>'  size='20' maxlength='20' />

    </td>


    <td height='36' align='right' class='text_bold_preto'>Nacionalidade</td>
    <td class='text_padrao'>
        <input name='nacionalidade' type='text' class='<?=$erro['nacionalidade']?>' id='nacionalidade' value='<?=stripslashes($aluno->nacionalidade)?>'  size='10' maxlength='10' />

    </td>


</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Cidade</td>
    <td class='text_padrao' >
        <input name='cidade' type='text' class='<?=$erro['cidade']?>' id='cidade' value='<?=stripslashes($aluno->cidade)?>'  size='40' maxlength='100' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>UF</td>
    <td class='text_padrao'>
        <input name='uf' type='text' class='<?=$erro['uf']?>' id='uf' value='<?=stripslashes($aluno->uf)?>'  size='5' maxlength='5' />

    </td>



</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Complemento</td>
    <td class='text_padrao' colspan="3">
        <input name='complemento' type='text' class='<?=$erro['complemento']?>' id='complemento' value='<?=stripslashes($aluno->complemento)?>'  size='100' maxlength='100' />

    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Uf registro </td>
    <td class='text_padrao'>
        <input name='uf_reg_comarca' type='text' class='<?=$erro['uf_reg_comarca']?>' id='uf_reg_comarca' value='<?=stripslashes($aluno->ufRegComarca)?>'  size='5' maxlength='5' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Zona</td>
    <td class='text_padrao'>
        <input name='local' type='text' class='<?=$erro['local']?>' id='local' value='<?=stripslashes($aluno->local)?>'  size='10' maxlength='10' />

    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Nis</td>
    <td class='text_padrao' colspan="3">
        <input name='nis' type='text' class='<?=$erro['nis']?>' id='nis' value='<?=stripslashes($aluno->ni)?>'  size='30' maxlength='30' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Telefone</td>
    <td class='text_padrao'>
        <input name='telefone' type='text' class='telefone <?=$erro['telefone']?>' id='telefone' value='<?=stripslashes($aluno->telefone)?>'  size='20' maxlength='50' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Celular</td>
    <td class='text_padrao'>
        <input name='celular' type='text' class='telefone <?=$erro['celular']?>' id='celular' value='<?=stripslashes($aluno->celular)?>'  size='20' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Email</td>
    <td class='text_padrao' colspan="3">
        <input name='email' type='text' class='<?=$erro['email']?>' id='email' value='<?=stripslashes($aluno->email)?>'  size='80' maxlength='100' />

    </td>
</tr>



<tr>
    <td height='36' align='right' class='text_bold_preto'>Tipo de transporte escolar</td>
    <td class='text_padrao'>
        <input name='tipo_transp_escolar' type='text' class='<?=$erro['tipo_transp_escolar']?>' id='tipo_transp_escolar' value='<?=stripslashes($aluno->tipoTranspEscolar)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Tipo de uso de internet</td>
    <td class='text_padrao'>
        <input name='tipo_uso_internet' type='text' class='<?=$erro['tipo_uso_internet']?>' id='tipo_uso_internet' value='<?=stripslashes($aluno->tipoUsoInternet)?>'  size='30' maxlength='30' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Sexo</td>
    <td class='text_padrao'>

      <select name="sexo">
        <option value=""></option>
        <option value="M" <? if($aluno->sexo=="M") echo "selected" ?>>Masculino</option>
        <option value="F" <? if($aluno->sexo=="F") echo "selected" ?>>Feminino</option>
      </select>
    </td>

    <td height='36' align='right' class='text_bold_preto'>Registro Nascimento</td>
    <td class='text_padrao'>
        <input name='reg_nascimento' type='text' class='<?=$erro['reg_nascimento']?>' id='reg_nascimento' value='<?=stripslashes($aluno->regNascimento)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Número do livro de registro</td>
    <td class='text_padrao'>
        <input name='reg_livro_num' type='text' class='<?=$erro['reg_livro_num']?>' id='reg_livro_num' value='<?=stripslashes($aluno->regLivroNum)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Número da folha do registro</td>
    <td class='text_padrao'>
        <input name='reg_folha_num' type='text' class='<?=$erro['reg_folha_num']?>' id='reg_folha_num' value='<?=stripslashes($aluno->regFolhaNum)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Comarca do Registro</td>
    <td class='text_padrao' colspan="3">
        <input name='reg_comarca' type='text' class='<?=$erro['reg_comarca']?>' id='reg_comarca' value='<?=stripslashes($aluno->regComarca)?>'  size='50' maxlength='50' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Rg</td>
    <td class='text_padrao'>
        <input name='rg' type='text' class='<?=$erro['rg']?>' id='rg' value='<?=stripslashes($aluno->rg)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Rg orgão</td>
    <td class='text_padrao'>
        <input name='rg_orgao' type='text' class='<?=$erro['rg_orgao']?>' id='rg_orgao' value='<?=stripslashes($aluno->rgOrgao)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Rg data expedição</td>
    <td class='text_padrao'>
        <input name='rg_data_expedicao' type='text' class='<?=$erro['rg_data_expedicao']?>' id='rg_data_expedicao' value='<?=stripslashes($aluno->rgDataExpedicao)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Titulo</td>
    <td class='text_padrao'>
        <input name='titulo' type='text' class='<?=$erro['titulo']?>' id='titulo' value='<?=stripslashes($aluno->titulo)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Zona do título</td>
    <td class='text_padrao'>
        <input name='titulo_zona' type='text' class='<?=$erro['titulo_zona']?>' id='titulo_zona' value='<?=stripslashes($aluno->tituloZona)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Seção do titulo</td>
    <td class='text_padrao'>
        <input name='titulo_secao' type='text' class='<?=$erro['titulo_secao']?>' id='titulo_secao' value='<?=stripslashes($aluno->tituloSecao)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Carteira reservista</td>
    <td class='text_padrao'>
        <input name='reservista' type='text' class='<?=$erro['reservista']?>' id='reservista' value='<?=stripslashes($aluno->reservista)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Serie do reservista</td>
    <td class='text_padrao'>
        <input name='reservista_serie' type='text' class='<?=$erro['reservista_serie']?>' id='reservista_serie' value='<?=stripslashes($aluno->reservistaSerie)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Número da reservista</td>
    <td class='text_padrao'>
        <input name='reservista_numero' type='text' class='<?=$erro['reservista_numero']?>' id='reservista_numero' value='<?=stripslashes($aluno->reservistaNumero)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Número da categoria do reservista</td>
    <td class='text_padrao'>
        <input name='reservista_categ_num' type='text' class='<?=$erro['reservista_categ_num']?>' id='reservista_categ_num' value='<?=stripslashes($aluno->reservistaCategNum)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>CSM Reservista</td>
    <td class='text_padrao'>
        <input name='reservista_csm' type='text' class='<?=$erro['reservista_csm']?>' id='reservista_csm' value='<?=stripslashes($aluno->reservistaCsm)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Carteira Profissonal</td>
    <td class='text_padrao'>
        <input name='cart_prof' type='text' class='<?=$erro['cart_prof']?>' id='cart_prof' value='<?=stripslashes($aluno->cartProf)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>


    <td height='36' align='right' class='text_bold_preto'>Qtd. pessoas família</td>
    <td class='text_padrao'>
        <input name='familia_composta' type='text' class='<?=$erro['familia_composta']?>' id='familia_composta' value='<?=stripslashes($aluno->familiaComposta)?>'  size='5' maxlength='5' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Estado Civil</td>
    <td class='text_padrao'>
        <input name='estado_civil' type='text' class='<?=$erro['estado_civil']?>' id='estado_civil' value='<?=stripslashes($aluno->estadoCivil)?>'  size='15' maxlength='15' />

    </td>

</tr>

<tr>

    <td height='36' align='right' class='text_bold_preto'>Convênio</td>
    <td class='text_padrao' colspan="3">
        <input name='convenio' type='text' class='<?=$erro['convenio']?>' id='convenio' value='<?=stripslashes($aluno->convenio)?>'  size='15' maxlength='15' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Tipo de transporte escolar</td>
    <td class='text_padrao'>
        <input name='descri_transp_escolar' type='text' class='<?=$erro['descri_transp_escolar']?>' id='descri_transp_escolar' value='<?=stripslashes($aluno->descriTranspEscolar)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Senha</td>
    <td class='text_padrao'>
        <input name='senha' type='password' class='k-textbox <?=$erro['descri_transp_escolar']?>' id='senha' size='30' maxlength='30' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Colabora com a renda familiar?</td>
    <td class='text_padrao' colspan="3">
        <select name="colabora_renda_familiar">
            <option value="N">Não</option>
            <option value="S" <? if($aluno->colaboraRendaFamiliar=="S") echo 'selected'?>>Sim</option>

        </select>
    </td>

</tr>


<tr>

    <td colspan="4">

        <fieldset style="width:780px;margin:0 auto;padding:10px">
            <legend class="bordaPesquisa"><b>Foto</b></legend>
            <table>
                <tr>
                    <td height="36" align="right" class="text_bold_preto"></td>
                    <td class="text_padrao">
                        <object height="400" width="700" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" style="width: 710px; height: 400px;">
                            <param value="<?=URL.'/modulos/aluno/'?>webcam/bin-debug/webcam.swf" name="src"/>
                            <embed height="400" width="700" src="<?=URL.'/modulos/aluno/'?>webcam/bin-debug/webcam.swf" type="application/x-shockwave-flash" style="width: 710px; height: 400px;"/>
                        </object>
                        <input type="hidden" value="" name="foto" id="foto" />

                    </td>
                </tr>
                <? if(!empty($aluno->foto)): ?>
                <tr>
                    <td height="36" align="right" class="text_bold_preto">Foto atual:</td>
                    <td>
                        <img src="<?=URL?>/fotos/alunos/<?=$aluno->foto?>" />
                        <input type="hidden" value="<?=$aluno->foto?>" name="foto_salva" />
                    </td>
                </tr>
                <? endif; ?>
            </table>
        </fieldset>

    </td>

</tr>


</table>

