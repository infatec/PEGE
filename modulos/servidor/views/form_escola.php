<fieldset style="width: 560px ;" id="escola_<?=$escola_id?>">
    <legend>Escola</legend>
    <input type="hidden" value="<?=$escola_id?>" id="escola_<?=$escola_id?>" name="escola[]">
    <input type="hidden" value="<?=$servidor_cargo_escola_id[$escola_id]?>"  name="servidor_cargo_escola_id[<?=$escola_id?>]">

    <table width="540" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
        <tr>
            <td class="celulaTitle">Inep:</td>
            <td style="text-align: left;" id="inep_escola"><?=$inep?></td>
        </tr>
        <tr>
            <td class="celulaTitle">Escola:</td>
            <td style="text-align: left;" id="nome_escola"><?=$nome_escola?></td>
        </tr>

    </table>

    <table width="540">
        <tr>
            <td height='36' align='right' class='text_bold_preto'>Cargo</td>
            <td class='text_padrao'>
                <?
                $dados = array('primary_key' => 'id',
                    'nome' => 'nome',
                    'tabela' => 'cargos_mec',
                    'condicao' => ' where id in ( select cargos_mec_id from cargos_escola where escola_id = '.$escola_id.') order by nome asc',
                    'nome_input' => 'cargos_mec_id['.$escola_id.']',
                    'id' => 'cargos_mec_id',
                    'class' => $erro["cargos_mec_id"],
                    'value' => $cargos_mec_id[$escola_id]
                );

                DAOFactory::getServidorDAO()->geraSelect($dados);
                ?>

            </td>
        </tr>
        <tr>
            <td height='36' align='right' class='text_bold_preto'>Função</td>
            <td class='text_padrao'>
                <?
                $dados = array('primary_key' => 'id',
                    'nome' => 'nome',
                    'tabela' => 'funcoes_mec',
                    'condicao' => ' where id in ( select funcoes_mec_id from funcoes_escola where escola_id = '.$escola_id.') order by nome asc',
                    'nome_input' => 'funcoes_mec_id['.$escola_id.']',
                    'id' => 'funcoes_mec_id',
                    'class' => $erro["funcoes_mec_id"],
                    'value' => $funcoes_mec_id[$escola_id]
                );

                DAOFactory::getServidorDAO()->geraSelect($dados);
                ?>

            </td>
        </tr>
       <tr>
        <td height='36' align='right' class='text_bold_preto'>Data de Admissão</td>
            <td class='text_padrao'>
                <input name='data_admissao[<?=$escola_id?>]' type='text' class='data <?=$erro['data_admissao']?>' id='data_admissao' value='<?=geradatabr1($data_admissao[$escola_id])?>'  size='15'  />

            </td>

        </tr>
        <tr>
            <td height='36' align='right' class='text_bold_preto'>Decreto Nº</td>
            <td class='text_padrao'>
                <input name='num_decreto[<?=$escola_id?>]' type='text' class='<?=$erro['num_decreto']?>' id='num_decreto' value='<?=$num_decreto[$escola_id]?>'  size='30'  />

            </td>

        </tr>

        <tr>
            <td height='36' align='right' class='text_bold_preto'>Data entrada exercício</td>
            <td class='text_padrao'>
                <input name='data_entrada_exercicio[<?=$escola_id?>]' type='text' class='data <?=$erro['data_entrada_exercicio']?>' id='data_entrada_exercicio' value='<?=geradatabr1($data_entrada_exercicio[$escola_id])?>'  size='15'  />

            </td>

        </tr>
        <tr>
            <td height='36' align='right' class='text_bold_preto'>Matrícula</td>
            <td class='text_padrao'>
                <input name='matricula[<?=$escola_id?>]' type='text' class='<?=$erro['matricula']?>' id='matricula' value='<?=$matricula[$escola_id]?>'  size='30'  />

            </td>

        </tr>

        <tr>
            <td height='36' align='right' class='text_bold_preto'>Vínculo</td>
            <td class='text_padrao'>
                <select name="vinculo[<?=$escola_id?>]">
                    <option value="EFETIVO" <? if($vinculo[$escola_id]=="EFETIVO") echo "selected" ?>>EFETIVO</option>
                    <option value="CONTRATADO" <? if($vinculo[$escola_id]=="CONTRATADO") echo "selected" ?>>CONTRATADO</option>
                </select>
            </td>

        </tr>
    </table>
    <button onclick="removeElemento('escola_<?=$escola_id?>','Desejar remover essa escola desse servidor?')" type="button" class="bt" style="width: 200px;">Remover Escola</button>
    <div class="clear"></div>

</fieldset>