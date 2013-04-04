<?php
include("includes_ajax.php");
import("AnoLetivo");
import("Turma");

$escola_id = (int)$_POST["escola_id"];

$anos_letivo = DAOFactory::getAnoLetivoDAO()->queryAll("*"," where situacao='Aberto' and escola_id=".$escola_id." ");

$ano_letivo = $anos_letivo[0];

?>

<table width="380" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >
    <tr>
        <td height='36' align='right' class='text_bold_preto'>Ano Letivo Ativo:</td>
        <td class='text_padrao'>
            <?=$ano_letivo->identificacao?>
            <input type="hidden" value="<?=$ano_letivo->id?>" id="ano_letivo_id">
        </td>
    </tr>
    <tr>
        <td height='36' align='right' class='text_bold_preto'>Turno</td>
        <td class='text_padrao'>
            <?
            $dados = array('primary_key' => 'id',
                'nome' => 'nome',
                'tabela' => 'turno',
                'condicao' => ' where escola_id='.$escola_id.' order by nome asc',
                'nome_input' => 'turno_id',
                'id' => 'turno_id',
                'class' => $erro["turno_id"],
                'value' => $turma->turnoId);

            DAOFactory::getTurmaDAO()->geraSelect($dados);
            ?>

        </td>
    </tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Nivel de ensino</td>
        <td class='text_padrao'>
            <?
            $dados = array('primary_key' => 'id',
                'nome' => 'nome',
                'tabela' => 'nivel_ensino_mec',
                'condicao' => ' where id in (select nivel_ensino_mec_id from nivel_ensino_escola where escola_id='.$escola_id.') order by nome asc',
                'nome_input' => 'nivel_ensino_mec_id',
                'id' => 'nivel_ensino_mec_id',
                'onchange'=>'getAnos(this.value)',
                'class' => $erro["nivel_ensino_mec_id"],
                'value' => $turma->nivelEnsinoMecId);

            DAOFactory::getTurmaDAO()->geraSelect($dados);
            ?>
        </td>
    </tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Ano</td>
        <td class='text_padrao'>
            <span id="ano_turma">

                <select disabled=""><option>Selecione um Nível de Ensino</option></select>

            </span>

        </td>
    </tr>
    <tr>
        <td height='36' align='right' class='text_bold_preto'>Turma</td>
        <td class='text_padrao'>
            <span id="turma">

                <select disabled=""><option>Selecione um ano</option></select>

            </span>

        </td>
    </tr>

</table>