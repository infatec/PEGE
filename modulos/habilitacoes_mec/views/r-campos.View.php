<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>C�digo</td>
    <td class='text_padrao'>
        <input name='codigo' type='text' class='<?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($habilitacoes_mec->codigo)?>'  size='10' maxlength='10' onKeyUp="ContaCaracteresCampo('codigo', 'codigoT', 10);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao'>
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($habilitacoes_mec->nome)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 50);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Individual da escola?</td>
    <td class='text_padrao'>
        <?=checkboxString("individual_escola","S",trim($habilitacoes_mec->individualEscola))?>
    </td>
</tr>


