<?php
include("includes_ajax.php");

import("Turma");
import("Horario");

$escola_id = (int)$_POST["escola_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];

parse_str($_POST["dados_grade_horario"],$dados_grade_horario);

$horarios = DAOFactory::getHorarioDAO()->queryAll("*"," ORDER BY hora_inicio ASC");

?>
<fieldset style="width: 740px;">
    <legend>Dados Disciplina</legend>
    <table width="730" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

        <tr>
            <td colspan="2" align="right" class="text_bold_preto">
                <?php include(DOMAIN_PATH."modulos/turma/views/form_disciplina.php")?>
            </td>
        </tr>

        <tr>
            <td height="50" align="left" class="text_bold_preto"><button type="submit" onclick="addDisciplina()" class="bt botao_branco">Inserir Disciplina</button></td>
            <td class="text_padrao"><input name="acao" type="hidden" id="acao" value="1"></td>
        </tr>
    </table>
</fieldset>

<script>
    $(function() {

        var ano_letivo_id = $("#ano_letivo_id").val();
        var escola_id = $("#escola_id").val();

        $( "#suggest_disciplina" ).autocomplete({
            source: "ajax/suggest_disciplina.php?escola_id="+escola_id,
            minLength: 2,
            select: function( event, ui ) {
                $(this).attr('cod_disciplina',ui.item.id);
                $("#cod_disciplina").val(ui.item.id);
            }
        });

        $('#suggest_disciplina').blur(function(){
            if($(this).attr('cod_disciplina') && !$(this).val())
                $(this).attr('cod_disciplina','');

            if(!$(this).attr('cod_disciplina'))
                $(this).val('');

        });

        $( "#suggest_servidor" ).autocomplete({
            source: "ajax/suggest_servidor.php?escola_id="+escola_id,
            minLength: 2,
            select: function( event, ui ) {
                $(this).attr('cod_servidor',ui.item.id);
                $("#cod_servidor").val(ui.item.id);
            }
        });

        $('#suggest_servidor').blur(function(){
            if($(this).attr('cod_servidor') && !$(this).val())
                $(this).attr('cod_servidor','');

            if(!$(this).attr('cod_servidor'))
                $(this).val('');

        });

    });

</script>
