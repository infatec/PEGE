<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao'>
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($grupo_usuarios->nome)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 50);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Descrição</td>
    <td class='text_padrao'>
        <input name='descricao' type='text' class='<?=$erro['descricao']?>' id='descricao' value='<?=stripslashes($grupo_usuarios->descricao)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('descricao', 'descricaoT', 50);" />

    </td>
</tr>
<tr>
    <td height="36" align="right" class="text_bold_preto">Administrador</td>
    <td class="text_padrao">
        <?=checkbox('tipo',$grupo_usuarios->tipo)?>
    </td>
</tr>

