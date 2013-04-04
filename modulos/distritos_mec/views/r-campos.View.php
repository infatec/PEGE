<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Código</td>
    <td class='text_padrao'>
        <input name='codigo' type='text' class='<?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($distritos_mec->codigo)?>'  size='20' maxlength='20' onKeyUp="ContaCaracteresCampo('codigo', 'codigoT', 20);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao'>
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($distritos_mec->nome)?>'  size='100' maxlength='100' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 100);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>UF</td>
    <td class='text_padrao'>
        <input name='uf' type='text' class='<?=$erro['uf']?>' id='uf' value='<?=stripslashes($distritos_mec->uf)?>'  size='5' maxlength='5' onKeyUp="ContaCaracteresCampo('uf', 'ufT', 5);" />

    </td>
</tr>


