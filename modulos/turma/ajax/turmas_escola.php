<?php
include("includes_ajax.php");

import("Turma");

$escola_id = (int)$_POST["escola_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];

$turmas = DAOFactory::getTurmaDAO()->getTurmasByEscolaByAnoLetivo($escola_id,$ano_letivo_id);

?>

<? if(count($turmas)>0): ?>


        <table width="800" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
            <thead>
                <tr>

                    <th width="40">Ações</th>
                    <th width="110">Nível de Ensino</th>
                    <th width="47">Turno</th>
                    <th width="47">Ano</th>
                    <th width="47">Turma</th>
                    <th width="90">Registros Escolares</th>

                </tr>
            </thead>
            <? foreach($turmas as $turma):?>
                <tr bgcolor="">

                    <td align="center">
                        <a href="javascript:;" onclick="formTurma(<?=$turma["turma_id"]?>)"><img src="../../webroot/img_sistema/icon_editar.png" border="0" alt="Editar" title="Editar" width="23" /></a>
                    </td>

                    <td class='text_padrao'><?=$turma["nome_nivel_de_ensino"]?></td>
                    <td class='text_padrao'><?=$turma["nome_turno"]?></td>
                    <td class='text_padrao'><?=$turma["nome_ano"]?></td>
                    <td class='text_padrao'><?=$turma["codigo"]?></td>
                    <td class='text_padrao'>
                        <a href="javascript:;" onclick="abrePopup('../registros_escolares/registros_escolares/ata_resultado_final.php?escola_id=<?=$escola_id?>&turma_id=<?=$turma["turma_id"]?>',1090,500)" title="<b>Ata de Resultados Finais</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>
                        <span style="height: 15px;border-left:1px solid #bfc2c7;"></span>
                        <a href="javascript:;" onclick="abrePopup('../registros_escolares/registros_escolares/resultado_bimestral.php?escola_id=<?=$escola_id?>&turma_id=<?=$turma["turma_id"]?>',1090,500)" title="<b>Resultado Bimestral</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>
                    </td>

                </tr>
            <?endforeach;?>
        </table>


<? else:?>

    <table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
        <tr>
            <td>
                <div class="message tip" style="width: 97%;">
                    <p>Não existe nenhuma turma cadastrada.</p>
                </div>
            </td>
        </tr>
    </table>

<?endif;?>

<script>
    $(document).ready(function(){
        tooltip();
    });
</script>