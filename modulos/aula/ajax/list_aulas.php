<?php
include("includes_ajax.php");

import("Turma");

$escola_id = (int)$_POST["escola_id"];
$turma_disciplina_id = (int)$_POST["turma_disciplina_id"];

$aulas_disciplina = DAOFactory::getTurmaDAO()->getAulasDisciplina($turma_disciplina_id);

?>

<? if(count($aulas_disciplina)>0): ?>

    <fieldset style="width: 800px;">
        <legend>Aulas</legend>
        <table width="790" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
            <thead>
            <tr>

                <th width="57">Ações</th>
                <th width="80">Data</th>
                <th width="150">Hora Início / Hora Fim</th>
                <th>Atividade</th>

            </tr>
            </thead>
            <? foreach($aulas_disciplina as $aula):?>
                <tr bgcolor="">

                    <td align="center">
                        <a href="javascript:;" onclick="formAula(<?=$aula["id"]?>)"><img src="../../webroot/img_sistema/icon_editar.png" border="0" alt="Editar" title="Editar" width="23" /></a>
                    </td>

                    <td class='text_padrao'><?=geradatabr1($aula["data_aula"])?></td>
                    <td class='text_padrao'><?=$aula["hora_inicio"]."/".$aula["hora_fim"]?></td>
                    <td class='text_padrao'><?=$aula["atividade"]?></td>

                </tr>
            <? endforeach; ?>
        </table>
    </fieldset>

<? else:?>

    <table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
        <tr>
            <td>
                <div class="message tip" style="width: 97%;">
                    <p>Não existe nenhuma aula para essa disciplina.</p>
                </div>
            </td>
        </tr>
    </table>

<?endif;?>