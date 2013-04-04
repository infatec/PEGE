<?php
include("includes_ajax.php");

import("Turma");

$escola_id = (int)$_POST["escola_id"];
$turma_id = (int)$_POST["turma_id"];

$alunos_matriculados = DAOFactory::getTurmaDAO()->getAlunosMatriculados($turma_id);

?>

<? if(count($alunos_matriculados)>0): ?>

    <fieldset style="width: 800px;">
        <legend>Alunos Matriculados</legend>

            <p style="float: left;margin:15px 0 10px 10px;">Quantidade matriculados: <?=count($alunos_matriculados)?> </p>

            <table width="790" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
                <thead>
                <tr>

                    <th width="57">Ações</th>
                    <th >Nome</th>
                    <th width="57">Idade</th>
                    <th width="80">Matricula</th>
                    <th width="100">Inep</th>

                </tr>
                </thead>
                <? foreach($alunos_matriculados as $aluno):?>
                <tr bgcolor="">

                    <td align="center">
                        <a href="javascript:;" onclick="formAluno(<?=$aluno["id"]?>)"><img src="../../webroot/img_sistema/icon_editar.png" border="0" alt="Editar" title="Editar" width="23" /></a>
                    </td>

                    <td class='text_padrao'><?=$aluno["nome"]?></td>
                    <td class='text_padrao'><?=CalcularIdade($aluno["data_nascimento"],"amd","-");?></td>
                    <td class='text_padrao'><?=$aluno["matricula"]?></td>
                    <td class='text_padrao'><?=$aluno["inep"]?></td>

                </tr>
                <?endforeach;?>
            </table>
    </fieldset>

<? else:?>

    <table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
        <tr>
            <td>
                <div class="message tip" style="width: 97%;">
                    <p>Não existe nenhum aluno matriculado para essa turma.</p>
                </div>
            </td>
        </tr>
    </table>

<?endif;?>