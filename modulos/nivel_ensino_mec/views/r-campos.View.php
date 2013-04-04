<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Modalidade de Ensino</td>
    <td class='text_padrao'>
    <?
    $dados = array('primary_key' => 'id',
                    'nome' => 'nome',
                    'tabela' => 'modalidade_ensino_mec',
                    'condicao' => ' order by nome asc',
                    'nome_input' => 'modalidade_ensino_mec_id',
                    'id' => 'modalidade_ensino_mec_id',
                    'class' => $erro["modalidade_ensino_mec_id"],
                    'value' => $nivel_ensino_mec->modalidadeEnsinoMecId);

    DAOFactory::getNivelEnsinoMecDAO()->geraSelect($dados);
    ?>
    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Código</td>
    <td class='text_padrao'>
        <input name='codigo' type='text' class='<?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($nivel_ensino_mec->codigo)?>'  size='25' maxlength='25' onKeyUp="ContaCaracteresCampo('codigo', 'codigoT', 25);" />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao'>
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($nivel_ensino_mec->nome)?>'  size='60' maxlength='60' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 60);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Individual da escola?</td>
    <td class='text_padrao'>
        <?=checkboxString("individual_escola","S",trim($nivel_ensino_mec->individualEscola))?>
    </td>
</tr>


