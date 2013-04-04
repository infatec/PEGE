<?php
include("includes_ajax.php");

import("Turma");
import("Horario");
import("TurmaDisciplinaHorario");

$escola_id = (int)$_POST["escola_id"];
$turma_id = (int)$_POST["turma_id"];

?>
<fieldset style="width: 790px;">
    <legend>Matricula Coletiva</legend>
    <form id="form_matricula" onsubmit="return false;">
    <table width="780" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

        <tr>
            <td colspan="2">

                Nome ou Inep do aluno <br />

                <input name="nome" autocomplete="off" type="text" class="k-textbox" id="suggest_aluno" size="50" >
            </td>

        </tr>

        <tr>
            <td colspan="2">
                <div style="padding: 10px 0 10px 0px;">
                    <div class='topo_multi_select'>
                        <p> &raquo; Alunos Selecionados</p>
                    </div>
                    <div class="clear"></div>

                    <div id="alunos">

                    </div>

                </div>

            </td>
        </tr>

        <tr>
            <td height="50" align="left" class="text_bold_preto"><button class="bt botao_branco" onclick="matriculaAlunos()">Matricular Alunos</button></td>
            <td class="text_padrao"><input name="acao" type="hidden" id="acao" value="1"></td>
        </tr>
    </table>
    </form>
</fieldset>

<script>
    $(function() {

        var turma_id = $("#ano_letivo_id").val();
        var escola_id = $("#escola_id").val();
        var ano_letivo_id = $("#ano_letivo_id").val();

        $( "#suggest_aluno" ).autocomplete({
            source: "ajax/suggest_aluno.php?turma_id="+turma_id+"&ano_letivo_id="+ano_letivo_id,
            minLength: 3,
            select: function( event, ui ) {
                $(this).val('');
                $(this).focus();
                addAluno(ui.item.id);
            }
        });

        $( "#suggest_aluno" ).focus();

    });

</script>
