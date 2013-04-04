<?php
include("includes_ajax.php");

import("Turma");
import("Aluno");
import("Matricula");

$cod_aluno = (int)$_POST["cod_aluno"];
$escola_id = (int)$_POST["escola_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];

$aluno = DAOFactory::getAlunoDAO()->load($cod_aluno);

$matriculas = DAOFactory::getMatriculaDAO()->queryAll("*"," where aluno_id = ".$cod_aluno." and turma_id
in (select id from turma where ano_letivo_id=".$ano_letivo_id.") ");

$matricula = $matriculas[0];
$turma = DAOFactory::getTurmaDAO()->load($matricula->turmaId);

?>

    <table width="660" id="tablesorter-demo" style="float:left;margin-left: 5px;" cellspacing="1" cellpadding="0" class="tablesorter" >
        <tr>
            <td class="celulaTitle">Aluno:</td>
            <td style="text-align: left;" id="inep_escola"><?=$aluno->nome?></td>
        </tr>
        <tr>
            <td class="celulaTitle">Matricula:</td>
            <td style="text-align: left;"><?=$matricula->matricula?></td>
        </tr>
        <tr>

            <td class="celulaTitle">Turma Matriculado:</td>
            <td style="text-align: left;">

                <?=$turma->codigo?>

            </td>
        </tr>

    </table>

    <table width="800" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
        <thead>
            <tr>

                <th width="210">Tipo do Documento</th>
                <th width="47">Gerar</th>


            </tr>
        </thead>
         <tr bgcolor="">


            <td class='text_padrao'>Boletim Aluno</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('../registros_escolares/registros_escolares/boletim_aluno.php?aluno_id=<?=$cod_aluno?>&turma_id=<?=$turma->id?>&escola_id=<?=$escola_id?>',1090,500)" title="<b>Boletim Aluno</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>

        <tr bgcolor="">


            <td class='text_padrao'>Ficha Individual</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('../registros_escolares/registros_escolares/ficha_individual_aluno.php?aluno_id=<?=$cod_aluno?>&turma_id=<?=$turma->id?>&escola_id=<?=$escola_id?>',1090,500)" title="<b>Ficha Individual</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>

        <tr bgcolor="">


            <td class='text_padrao'>Ficha de Matricula</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('../registros_escolares/registros_escolares/ficha_matricula_individual_pt1.php?aluno_id=<?=$cod_aluno?>&turma_id=<?=$turma->id?>&escola_id=<?=$escola_id?>',1090,500)" title="<b>Ficha de Matricula</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>

        <tr bgcolor="">


            <td class='text_padrao'>Certificado de conclusão de Curso</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('../registros_escolares/registros_escolares/certificado_conclusao_curso_serie_ano_escolar_pt1.php?aluno_id=<?=$cod_aluno?>&turma_id=<?=$turma->id?>&escola_id=<?=$escola_id?>',1090,500)" title="<b>Ficha de Matricula</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>


    </table>

<script>
    $(document).ready(function(){
        tooltip();
    });
</script>