<?php
include("includes_ajax.php");

import("Turma");

$escola_id = (int)$_POST["escola_id"];
$ano_letivo_id = (int)$_POST["ano_letivo_id"];

?>


    <table width="800" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
        <thead>
            <tr>

                <th width="210">Tipo do Documento</th>
                <th width="47">Gerar</th>


            </tr>
        </thead>
         <tr bgcolor="">


            <td class='text_padrao'>Movimento Bimestral</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('registros_escolares/movimento_bimestral.php?escola_id=<?=$escola_id?>&ano_letivo_id=<?=$ano_letivo_id?>',1090,500)" title="<b>Movimento Bimestral</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>

        <tr bgcolor="">


            <td class='text_padrao'>Movimento de Rendimento Final</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('registros_escolares/movimento_rendimento_final.php?escola_id=<?=$escola_id?>&ano_letivo_id=<?=$ano_letivo_id?>',1090,500)" title="<b>Movimento de Rendimento Final</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>

        <tr bgcolor="">


            <td class='text_padrao'>Rendimento Anual Ensino Fundamental - 1º ao 9º ano</td>
            <td class='text_padrao'>
                <a href="javascript:;" onclick="abrePopup('registros_escolares/rendimento_anual.php?escola_id=<?=$escola_id?>&ano_letivo_id=<?=$ano_letivo_id?>',1090,500)" title="<b>Movimento Bimestral</b>" class="tooltip"> <img src="../../webroot/img_sistema/document.png" border="0" alt="Ata de Resultados Finais" /> </a>

            </td>

        </tr>


    </table>

<script>
    $(document).ready(function(){
        tooltip();
    });
</script>