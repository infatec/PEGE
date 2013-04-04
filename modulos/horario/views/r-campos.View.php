<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Hora Início</td>
    <td class='text_padrao'>
        <input name='hora_inicio' type='text' class='hora <?=$erro['hora_inicio']?>' id='hora_inicio' value='<?=stripslashes($horario->horaInicio)?>'  size='' maxlength='' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Hora Fim</td>
    <td class='text_padrao'>
        <input name='hora_fim' type='text' class='hora <?=$erro['hora_fim']?>' id='hora_fim' value='<?=stripslashes($horario->horaFim)?>'  size='' maxlength='' />

    </td>
</tr>


