<fieldset style="width: 560px ;" id="disciplina_<?=$disciplina_id?>">
    <legend>Disciplina</legend>
    <input type="hidden" value="<?=$disciplina_id?>" id="disciplina_<?=$disciplina_id?>" name="disciplinas[]">
    <input type="hidden" value="<?=$servidor_id?>" name="servidor[<?=$disciplina_id?>]">
    <input type="hidden" value="<?=$horas_aula_1_semestre?>" name="horas_aula_semestre1[<?=$disciplina_id?>]">
    <input type="hidden" value="<?=$horas_aula_2_semestre?>" name="horas_aula_semestre2[<?=$disciplina_id?>]">
    <div id="horarios_inseridos_<?=$disciplina_id?>">
    <?
        if(!is_array($horarios)) $horarios=array();
        foreach($horarios as $horario):

        $ar_hor = explode("_",$horario);
        $cod_horario = $ar_hor[0];
        $dia_semana = $ar_hor[1];

    ?>
        <input type="hidden" value="<?=$horario?>" name="horarios[<?=$disciplina_id?>][]">
        <?
            //caso não estiver editando a turma, chama esse js para preenchcer o horário selecionado
            if (!$turma->id) :?>
            <script>

                $("#<?=$cod_horario?>_<?=$dia_semana?>_text").html('<?=$nome_disciplina?>');
                $("#nomeDisc_<?=$cod_horario?>_<?=$dia_semana?>").val('<?=$nome_disciplina?>');
                $("#idDisc_<?=$cod_horario?>_<?=$dia_semana?>").val(<?=$disciplina_id?>);

            </script>
        <? endif;?>
    <? endforeach;?>
    </div>
    <table width="560" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
        <tr>
            <td class="celulaTitle">Disciplina:</td>
            <td style="text-align: left;" id="inep_escola"><?=$nome_disciplina?></td>
        </tr>
        <tr>
            <td class="celulaTitle">Professor:</td>
            <td style="text-align: left;"><?=$nome_professor?></td>
        </tr>
        <tr>

            <td class="celulaTitle">Horas Aula 1º Semestre:</td>
            <td style="text-align: left;">

                <?=$horas_aula_1_semestre?>

            </td>
        </tr>
        <tr>
            <td class="celulaTitle">Horas Aula 2º Semestre:</td>
            <td style="text-align: left;">

                <?=$horas_aula_2_semestre?>

            </td>

        </tr>

    </table>

    <button onclick="removeDisciplinaAdicionada(<?=$disciplina_id?>)" type="button" class="bt" style="width: 200px;">Remover Disciplina</button>
    <div class="clear"></div>

</fieldset>