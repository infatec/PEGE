<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Código</td>
    <td class='text_padrao'>
        <input name='codigo' type='text' class='<?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($tipos_frequencia_mec->codigo)?>'  size='20' maxlength='20' onKeyUp="ContaCaracteresCampo('codigo', 'codigoT', 20);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao'>
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($tipos_frequencia_mec->nome)?>'  size='60' maxlength='60' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 60);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Individual da escola?</td>
    <td class='text_padrao'>
        <?=checkboxString("individual_escola","S",trim($tipos_frequencia_mec->individualEscola))?>
    </td>
</tr>


