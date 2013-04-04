<?php
include("includes_ajax.php");

import("Turma");
import("Horario");
import("TurmaDisciplinaHorario");

$escola_id = (int)$_POST["escola_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];
$turma_id = (int)$_POST["turma_id"];

if($turma_id){
    $turma = DAOFactory::getTurmaDAO()->load($turma_id);
    $disciplinas_turma = DAOFactory::getTurmaDAO()->getDisciplinasByTurma($turma_id);
    $grade_horario = $disciplinas_turma["grade_horario"];
    $disciplinas_turmas_edicao = $disciplinas_turma["disciplinas"];
}

$horarios_aula = DAOFactory::getHorarioDAO()->queryAll("*"," ORDER BY hora_inicio ASC");

?>
<fieldset style="width: 790px;">
<legend>Dados Turma</legend>
    <table width="780" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

        <tr>
            <td width="22%" height="20" align="center" class="text_bold_preto"><div id="msgUpload" style="text-align:center"><?=$msgUpload?></div></td>
            <td width="78%" class="text_padrao">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="right" class="text_bold_preto">
                <?php include(DOMAIN_PATH."modulos/turma/views/r-campos.View.php")?>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="right" class="text_bold_preto">&nbsp;</td>
        </tr>
        <tr>
            <td height="50" align="right" class="text_bold_preto"><button type="submit" class="bt botao_branco" onclick="salvarTurma()">Salvar Turma</button></td>
            <td class="text_padrao"><input name="acao" type="hidden" id="acao" value="1"></td>
        </tr>
    </table>
</fieldset>
