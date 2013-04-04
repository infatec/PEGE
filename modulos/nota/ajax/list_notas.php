<?php
include("includes_ajax.php");

import("Nota");
import("Aluno");

$turma_disciplina_id = (int)$_POST["turma_disciplina_id"];

$alunos = DAOFactory::getAlunoDAO()->getAlunosByDisciplina($turma_disciplina_id);

?>

<? if(count($alunos)>0): ?>

    <fieldset style="width: 800px;">
        <legend>Notas</legend>
        <table width="790" id="table_notas" cellspacing="1" cellpadding="0" class="tablesorter" >
            <thead>
            <tr>
                <th rowspan="2" width="250px">Aluno</th>
                <th colspan="2">1°Bimestre</th>
                <th colspan="2">2°Bimestre</th>
                <th colspan="2">3°Bimestre</th>
                <th colspan="2">4°Bimestre</th>
                <th rowspan="2">Méd.Final</th>
            </tr>
            <tr>
                <th>N1</th>
                <th>N2</th>
                <th>N3</th>
                <th>N4</th>
                <th>N5</th>
                <th>N6</th>
                <th>N7</th>
                <th>N8</th>
            </tr>
            </thead>
            <? foreach($alunos as $aluno):?>
                <tr>

                    <td style="text-align: left;">
                        <?=$aluno["nome"]?>
                    </td>
                    <? for($i=1;$i<=9;$i++): ?>
                        <td style="text-align: left;">
                           <input type="text" size="5" value="10" >
                        </td>
                    <? endfor; ?>
                </tr>
            <? endforeach; ?>
        </table>
    </fieldset>

<? else:?>

    <table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
        <tr>
            <td>
                <div class="message tip" style="width: 97%;">
                    <p>Não existe aluno para essa disciplina.</p>
                </div>
            </td>
        </tr>
    </table>

<?endif;?>

<script>
    $(document).ready(function()
    {
        $('input[type="text"]').addClass('k-textbox');

        $('table#table_notas').find('tr').each(function () {
            var index = $(this).index();
            if (index % 2 != 0) {

                $(this).find('td').css("background-color","#F0F0F0");
            }
        });
    });


</script>
