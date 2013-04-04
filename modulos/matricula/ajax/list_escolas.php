<?php

include("includes_ajax.php");
#### MODELS #########

import("Escola");

$valor_digitado = AntiInjection::post("valor");

$valor_digitado = utf8_decode($valor_digitado);

$escolas = DAOFactory::getEscolaDAO()->queryAll(" *"," WHERE nome like '%".$valor_digitado."%' or inep like '%".$valor_digitado."%' ORDER BY nome ASC LIMIT 10 ");//PEGA TODOS OS REGISTROS COM O TOP

?>

<?if($escolas): ?>
<?foreach($escolas as $escola): ?>

    <table cellspacing="0" cellpadding="3" border="0" class="tableList" >
        <tbody>

        <tr>

            <td style="line-height: 10px;width: 600px;">

                <b>
                    <input type="hidden" colegio="<?=$escola->nome?>" inep="<?=$escola->inep?>" name="cod_escola_<?=$escola->id?>" value="<?=$escola->id?>" id="cod_escola_<?=$escola->id?>">
                    <?=$escola->nome?> / Inep: <?=$escola->inep?></b>

            </td>

            <td style="width: 80px;">

                <div style="float: right;">

                    <button onclick="selecionaEscolaMatricula(this)" colegio="<?=$escola->nome?>" inep="<?=$escola->inep?>" codigo="<?=$escola->id?>" type="button" class="bt">Selecionar</button>

                </div>
            </td>

        </tr>

        </tbody>
    </table>

    <div class="clear"></div>

    <?endforeach;?>
<?else:?>
<table cellspacing="0" cellpadding="3" border="0" class="tableList" >
    <tbody>

    <tr>

        <td style="line-height: 10px;width: 680px;">

            <b>Não existe nenhuma escola cadastrada com esse valor digitado : "<?=utf8_decode($_POST["valor"])?>"</b>

        </td>


    </tr>

    </tbody>
</table>

<div class="clear"></div>
<?endif;?>