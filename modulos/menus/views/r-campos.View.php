<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome</td>
                                    <td class='text_padrao'>
                                        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($menus->nome)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 50);" />
                                        <input name='nomeT' type='text' disabled class='input_caracteres' id='nomeT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Tipo</td>
                                    <td class='text_padrao'>
                                        <input name='tipo' type='text' class='<?=$erro['tipo']?>' id='tipo' value='<?=stripslashes($menus->tipo)?>'  size='10) unsigne' maxlength='10) unsigne' onKeyUp="ContaCaracteresCampo('tipo', 'tipoT', 10) unsigne);" />
                                        <input name='tipoT' type='text' disabled class='input_caracteres' id='tipoT' value='10) unsigne' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Ordem</td>
                                    <td class='text_padrao'>
                                        <input name='ordem' type='text' class='<?=$erro['ordem']?>' id='ordem' value='<?=stripslashes($menus->ordem)?>'  size='10) unsigne' maxlength='10) unsigne' onKeyUp="ContaCaracteresCampo('ordem', 'ordemT', 10) unsigne);" />
                                        <input name='ordemT' type='text' disabled class='input_caracteres' id='ordemT' value='10) unsigne' size='1' style='width:20px' />
                                    </td>
                                </tr>


