<tr>
<td height="5" align="right" class="text_bold_preto">&nbsp;</td>
<td class="text_padrao">
<input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
</td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nivel de Ensino</td>
    <td class='text_padrao'>
    <?
    $dados = array('primary_key' => 'id',
                    'nome' => 'nome',
                    'tabela' => 'nivel_ensino_mec',
                    'condicao' => ' order by nome asc',
                    'nome_input' => 'nivel_ensino_mec_id',
                    'id' => 'nivel_ensino_mec_id',
                    'class' => $erro["nivel_ensino_mec_id"],
                    'value' => $ano->nivelEnsinoMecId);

    DAOFactory::getAnoDAO()->geraSelect($dados);
    ?>
    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Código</td>
    <td class='text_padrao'>
        <input name='codigo' type='text' class='<?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($ano->codigo)?>'  size='20' maxlength='20' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao'>
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($ano->nome)?>'  size='50' maxlength='50' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Idade Correta</td>
    <td class='text_padrao'>
        <input name='idade_correta' type='text' class='<?=$erro['nome']?>' id='idade_correta' value='<?=stripslashes($ano->idadeCorreta)?>'  size='5' maxlength='5' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Individual da escola?</td>
    <td class='text_padrao'>
        <?=checkboxString("individual_escola","S",trim($ano->individualEscola))?>

    </td>
</tr>


