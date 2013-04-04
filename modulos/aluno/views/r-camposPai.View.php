<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

<tr>
    <td height='36' align='right' class='text_bold_preto'>Pai vivo?</td>
    <td class='text_padrao' colspan="3">
        <input name='pai_vivo' type='text' class='<?=$erro['pai_vivo']?>' id='pai_vivo' value='<?=stripslashes($aluno->paiVivo)?>'  size='5' maxlength='5' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome pai</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_pai' type='text' class='<?=$erro['nome_pai']?>' id='nome_pai' value='<?=stripslashes($aluno->nomePai)?>'  size='100' maxlength='100' />

    </td>
</tr>



<tr>
<td height='36' align='right' class='text_bold_preto'>CPF pai</td>
<td class='text_padrao' colspan="3">
    <input name='cpf_pai' type='text' class='cpf <?=$erro['cpf_pai']?>' id='cpf_pai' value='<?=stripslashes($aluno->cpfPai)?>'  size='20' maxlength='20' />

</td>
</tr>


    <tr>
    <td height='36' align='right' class='text_bold_preto'>Nacionalidade pai</td>
    <td class='text_padrao'>
        <input name='pai_nacionalidade' type='text' class='<?=$erro['pai_nacionalidade']?>' id='pai_nacionalidade' value='<?=stripslashes($aluno->paiNacionalidade)?>'  size='40' maxlength='40' />

    </td>
    <td height='36' align='right' class='text_bold_preto'>Naturalidade pai</td>
    <td class='text_padrao'>
        <input name='pai_naturalidade' type='text' class='<?=$erro['pai_naturalidade']?>' id='pai_naturalidade' value='<?=stripslashes($aluno->paiNaturalidade)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nível escolar pai</td>
    <td class='text_padrao'>
        <input name='pai_niv_escolar' type='text' class='<?=$erro['pai_niv_escolar']?>' id='pai_niv_escolar' value='<?=stripslashes($aluno->paiNivEscolar)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Religião pai</td>
    <td class='text_padrao'>
        <input name='pai_religiao' type='text' class='<?=$erro['pai_religiao']?>' id='pai_religiao' value='<?=stripslashes($aluno->paiReligiao)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Profissão pai</td>
    <td class='text_padrao'>
        <input name='pai_profissao' type='text' class='<?=$erro['pai_profissao']?>' id='pai_profissao' value='<?=stripslashes($aluno->paiProfissao)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Endereço de trabalho pai</td>
    <td class='text_padrao'>
        <input name='pai_ender_trab' type='text' class='<?=$erro['pai_ender_trab']?>' id='pai_ender_trab' value='<?=stripslashes($aluno->paiEnderTrab)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Telefone pai</td>
    <td class='text_padrao'>
        <input name='pai_telefone' type='text' class='telefone <?=$erro['pai_telefone']?>' id='pai_telefone' value='<?=stripslashes($aluno->paiTelefone)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Email pai</td>
    <td class='text_padrao'>
        <input name='pai_email' type='text' class='<?=$erro['pai_email']?>' id='pai_email' value='<?=stripslashes($aluno->paiEmail)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Titulo pai</td>
    <td class='text_padrao'>
        <input name='pai_titulo' type='text' class='<?=$erro['pai_titulo']?>' id='pai_titulo' value='<?=stripslashes($aluno->paiTitulo)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Titulo zona pai</td>
    <td class='text_padrao'>
        <input name='pai_titulo_zona' type='text' class='<?=$erro['pai_titulo_zona']?>' id='pai_titulo_zona' value='<?=stripslashes($aluno->paiTituloZona)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Seção titulo pai</td>
    <td class='text_padrao'>
        <input name='pai_titulo_secao' type='text' class='<?=$erro['pai_titulo_secao']?>' id='pai_titulo_secao' value='<?=stripslashes($aluno->paiTituloSecao)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>NIS pai</td>
    <td class='text_padrao'>
        <input name='pai_nis' type='text' class='<?=$erro['pai_nis']?>' id='pai_nis' value='<?=stripslashes($aluno->paiNi)?>'  size='40' maxlength='40' />

    </td>
</tr>

</table>

