<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome responsável</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_responsavel' type='text' class='<?=$erro['nome_responsavel']?>' id='nome_responsavel' value='<?=stripslashes($aluno->nomeResponsavel)?>'  size='80' maxlength='100' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Parentesco responsável</td>
    <td class='text_padrao'>
        <input name='parentesco_responsavel' type='text' class='<?=$erro['parentesco_responsavel']?>' id='parentesco_responsavel' value='<?=stripslashes($aluno->parentescoResponsavel)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Nacionalidade responsável</td>
    <td class='text_padrao'>
        <input name='nacional_responsavel' type='text' class='<?=$erro['nacional_responsavel']?>' id='nacional_responsavel' value='<?=stripslashes($aluno->nacionalResponsavel)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Naturalidade responsável</td>
    <td class='text_padrao'>
        <input name='natural_responsavel' type='text' class='<?=$erro['natural_responsavel']?>' id='natural_responsavel' value='<?=stripslashes($aluno->naturalResponsavel)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Nível escolar responsável</td>
    <td class='text_padrao'>
        <input name='niv_escolar_responsavel' type='text' class='<?=$erro['niv_escolar_responsavel']?>' id='niv_escolar_responsavel' value='<?=stripslashes($aluno->nivEscolarResponsavel)?>'  size='40' maxlength='40' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Religião responsável</td>
    <td class='text_padrao'>
        <input name='religiao_responsavel' type='text' class='<?=$erro['religiao_responsavel']?>' id='religiao_responsavel' value='<?=stripslashes($aluno->religiaoResponsavel)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Profissão responsável</td>
    <td class='text_padrao'>
        <input name='profissao_responsavel' type='text' class='<?=$erro['profissao_responsavel']?>' id='profissao_responsavel' value='<?=stripslashes($aluno->profissaoResponsavel)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Endereço trabalho responsável</td>
    <td class='text_padrao'>
        <input name='ender_trab_responsavel' type='text' class='<?=$erro['ender_trab_responsavel']?>' id='ender_trab_responsavel' value='<?=stripslashes($aluno->enderTrabResponsavel)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Telefone responsável</td>
    <td class='text_padrao'>
        <input name='telef_responsavel' type='text' class='telefone <?=$erro['telef_responsavel']?>' id='telef_responsavel' value='<?=stripslashes($aluno->telefResponsavel)?>'  size='40' maxlength='40' />

    </td>
</tr>
<tr>

</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Email responsável</td>
    <td class='text_padrao'>
        <input name='email_responsavel' type='text' class='<?=$erro['email_responsavel']?>' id='email_responsavel' value='<?=stripslashes($aluno->emailResponsavel)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Titulo responsável</td>
    <td class='text_padrao'>
        <input name='titulo_responsavel' type='text' class='<?=$erro['titulo_responsavel']?>' id='titulo_responsavel' value='<?=stripslashes($aluno->tituloResponsavel)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Titulo zona responsável</td>
    <td class='text_padrao'>
        <input name='titulo_zona_responsavel' type='text' class='<?=$erro['titulo_zona_responsavel']?>' id='titulo_zona_responsavel' value='<?=stripslashes($aluno->tituloZonaResponsavel)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Titulo seção responsável</td>
    <td class='text_padrao'>
        <input name='titulo_secao_responsavel' type='text' class='<?=$erro['titulo_secao_responsavel']?>' id='titulo_secao_responsavel' value='<?=stripslashes($aluno->tituloSecaoResponsavel)?>'  size='20' maxlength='20' />

    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Responsável Uf</td>
    <td class='text_padrao'>
        <input name='responsavel_uf' type='text' class='<?=$erro['responsavel_uf']?>' id='responsavel_uf' value='<?=stripslashes($aluno->responsavelUf)?>'  size='5' maxlength='5' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>CPF responsável</td>
    <td class='text_padrao'>
        <input name='cpf_responsavel' type='text' class='cpf <?=$erro['cpf_responsavel']?>' id='cpf_responsavel' value='<?=stripslashes($aluno->cpfResponsavel)?>'  size='20' maxlength='20' />

    </td>
</tr>



</table>

