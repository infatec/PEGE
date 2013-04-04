<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

<tr>
    <td height='36' align='right' class='text_bold_preto'>Mãe viva?</td>
    <td class='text_padrao' colspan="3">
        <input name='mae_viva' type='text' class='<?=$erro['mae_viva']?>' id='mae_viva' value='<?=stripslashes($aluno->maeViva)?>'  size='5' maxlength='5' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome mãe</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_mae' type='text' class='<?=$erro['nome_mae']?>' id='nome_mae' value='<?=stripslashes($aluno->nomeMae)?>'  size='80' maxlength='100' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>CPF mãe</td>
    <td class='text_padrao'>
        <input name='cpf_mae' type='text' class='cpf <?=$erro['cpf_mae']?>' id='cpf_mae' value='<?=stripslashes($aluno->cpfMae)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Mãe Nacionalidade</td>
    <td class='text_padrao'>
        <input name='mae_nacionalidade' type='text' class='<?=$erro['mae_nacionalidade']?>' id='mae_nacionalidade' value='<?=stripslashes($aluno->maeNacionalidade)?>'  size='40' maxlength='40' />

    </td>
</tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Mãe uf</td>
        <td class='text_padrao' colspan="3">
            <input name='mae_uf' type='text' class='<?=$erro['mae_uf']?>' id='mae_uf' value='<?=stripslashes($aluno->maeUf)?>'  size='5' maxlength='5' />

        </td>
    </tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Mãe Naturalidade</td>
    <td class='text_padrao'>
        <input name='mae_naturalidade' type='text' class='<?=$erro['mae_naturalidade']?>' id='mae_naturalidade' value='<?=stripslashes($aluno->maeNaturalidade)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Nível escolar mãe</td>
    <td class='text_padrao'>
        <input name='mae_niv_escolar' type='text' class='<?=$erro['mae_niv_escolar']?>' id='mae_niv_escolar' value='<?=stripslashes($aluno->maeNivEscolar)?>'  size='40' maxlength='40' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Religião mãe</td>
    <td class='text_padrao'>
        <input name='mae_religiao' type='text' class='<?=$erro['mae_religiao']?>' id='mae_religiao' value='<?=stripslashes($aluno->maeReligiao)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Profissão mãe</td>
    <td class='text_padrao'>
        <input name='mae_profissao' type='text' class='<?=$erro['mae_profissao']?>' id='mae_profissao' value='<?=stripslashes($aluno->maeProfissao)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Endereço de trabalho mãe</td>
    <td class='text_padrao' colspan="3">
        <input name='mae_ender_trab' type='text' class='<?=$erro['mae_ender_trab']?>' id='mae_ender_trab' value='<?=stripslashes($aluno->maeEnderTrab)?>'  size='80' maxlength='40' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Telefone mãe</td>
    <td class='text_padrao'>
        <input name='mae_telefone' type='text' class='telefone <?=$erro['mae_telefone']?>' id='mae_telefone' value='<?=stripslashes($aluno->maeTelefone)?>'  size='20' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Email mãe</td>
    <td class='text_padrao'>
        <input name='mae_email' type='text' class='<?=$erro['mae_email']?>' id='mae_email' value='<?=stripslashes($aluno->maeEmail)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Titulo mãe</td>
    <td class='text_padrao'>
        <input name='mae_titulo' type='text' class='<?=$erro['mae_titulo']?>' id='mae_titulo' value='<?=stripslashes($aluno->maeTitulo)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Titulo zona mãe</td>
    <td class='text_padrao'>
        <input name='mae_titulo_zona' type='text' class='<?=$erro['mae_titulo_zona']?>' id='mae_titulo_zona' value='<?=stripslashes($aluno->maeTituloZona)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Seção titulo mãe </td>
    <td class='text_padrao'>
        <input name='mae_titulo_secao' type='text' class='<?=$erro['mae_titulo_secao']?>' id='mae_titulo_secao' value='<?=stripslashes($aluno->maeTituloSecao)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>NIS mãe</td>
    <td class='text_padrao'>
        <input name='mae_nis' type='text' class='<?=$erro['mae_nis']?>' id='mae_nis' value='<?=stripslashes($aluno->maeNi)?>'  size='40' maxlength='40' />

    </td>
</tr>


</table>

