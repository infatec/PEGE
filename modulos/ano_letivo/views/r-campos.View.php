<tr>
    <td height='36' align='right' class='text_bold_preto'>Escola</td>
    <td class='text_padrao' colspan="3">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
        <input type="text" id="escola_nome" value="<?=DAOFactory::getAnoLetivoDAO()->toString("escola","nome",$ano_letivo->escolaId)?>" disabled="disabled" size="50" />
        <input type="hidden" value="<?=$ano_letivo->escolaId?>" name="escola_id" id="escola_id"/>
        <a href="../../includes/busca_registro.php?modulo=escola&tabela=escola&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Ano Corrente</td>
    <td class='text_padrao' style="width: 100px;">
        <input name='identificacao' type='text' class='<?=$erro['identificacao']?>' id='identificacao' value='<?=stripslashes($ano_letivo->identificacao)?>'  size='20' maxlength='50' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Situação</td>
    <td class='text_padrao'>
        <select name="situacao">
            <option value="Aberto">Aberto</option>
            <option value="Fechado">Fechado</option>
        </select>
    </td>

</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Data Início Matricula</td>
    <td class='text_padrao'>
        <input name='data_inicio_matricula' type='text' class='datepicker <?=$erro['data_inicio_matricula']?>' id='data_inicio_matricula' value='<?=geradatabr1($ano_letivo->dataInicioMatricula)?>'  size='' maxlength='' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Data Fim Matricula</td>
    <td class='text_padrao'>
        <input name='data_fim_matricula' type='text' class='datepicker <?=$erro['data_fim_matricula']?>' id='data_fim_matricula' value='<?=geradatabr1($ano_letivo->dataFimMatricula)?>'  size='' maxlength='' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Data Inicio aulas 1º semestre</td>
    <td class='text_padrao'>
        <input name='data_inicio_aulas' type='text' class='datepicker <?=$erro['data_inicio_aulas']?>' id='data_inicio_aulas' value='<?=geradatabr1($ano_letivo->dataInicioAula)?>'  size='' maxlength='' />

    </td>
    <td height='36' align='right' class='text_bold_preto'>Data Fim aulas 1º semestre</td>
    <td class='text_padrao'>
        <input name='data_fim_primeiro_semestre' type='text' class='datepicker <?=$erro['data_fim_primeiro_semestre']?>' id='data_fim_primeiro_semestre' value='<?=geradatabr1($ano_letivo->dataFimPrimeiroSemestre)?>'  size='' maxlength='' />

    </td>
</tr>
<tr>

</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Data Inicio aulas 2º semestre</td>
    <td class='text_padrao'>
        <input name='data_inicio_segundo_semestre' type='text' class=' datepicker<?=$erro['data_inicio_segundo_semestre']?>' id='data_inicio_segundo_semestre' value='<?=geradatabr1($ano_letivo->dataInicioSegundoSemestre)?>'  size='' maxlength='' />

    </td>
    <td height='36' align='right' class='text_bold_preto'>Data Fim aulas 2º semestre</td>
    <td class='text_padrao'>
        <input name='data_fim_aulas' type='text' class='datepicker <?=$erro['data_fim_aulas']?>' id='data_fim_aulas' value='<?=geradatabr1($ano_letivo->dataFimAula)?>'  size='' maxlength='' />

    </td>
</tr>



