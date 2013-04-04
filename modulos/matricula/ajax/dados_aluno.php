<?php
include("includes_ajax.php");

import("Aluno");

$aluno_id = $_POST["aluno_id"];

$aluno = DAOFactory::getAlunoDAO()->load($aluno_id);

?>
<span id="aluno_<?=$aluno->id?>">
    <table cellspacing="0" cellpadding="3" border="0" class="tableList" >
        <tbody>

        <tr>

            <td style="line-height: 10px;width: 600px;">

                <b>
                    <input type="hidden" aluno="<?=$aluno->nome?>" inep="<?=$aluno->inep?>" name="alunos[]" value="<?=$aluno->id?>" id="cod_aluno_<?=$aluno->id?>">
                    <?=$aluno->nome?> / Inep: <?=$aluno->inep?></b>

            </td>

            <td style="width: 185px;">

                <div style="float: right;">

                    <button onclick="formAluno(<?=$aluno->id?>)" type="button" style="width: 85px;" class="bt">Editar</button>

                    <button onclick="removeElemento('aluno_<?=$aluno->id?>','Deseja remover essa aluno da matricula?')" type="button" style="width: 85px;" class="bt">Remover</button>

                </div>
            </td>

        </tr>

        </tbody>
    </table>

    <div class="clear"></div>
</span>