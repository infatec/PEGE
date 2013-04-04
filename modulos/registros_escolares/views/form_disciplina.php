<tr>

    <td colspan="2">
        <form id="form_disciplina">
            <table>
                <tr>
                    <td height='36' align='right' class='text_bold_preto'>Disciplina</td>
                    <td class='text_padrao' colspan="3">
                        <!--<input type="text" autocomplete="off" name="nome_disciplina" cod_disciplina="" class='k-textbox' id="suggest_disciplina" value="" size="60">-->
                        <?
                        $dados = array('primary_key' => 'id',
                            'nome' => 'nome',
                            'tabela' => 'disciplinas_mec',
                            'condicao' => ' where id in ( select disciplinas_mec_id from disciplinas_escola where escola_id='.$escola_id.' )
                             ORDER by nome ASC',
                            'nome_input' => 'cod_disciplina',
                            'id' => 'cod_disciplina',
                            'class' => $erro["cod_disciplina"],
                            'value' => '');

                        DAOFactory::getTurmaDAO()->geraSelect($dados);
                        ?>
                        <!--<input type="hidden" name="cod_disciplina" id="cod_disciplina" value="">-->
                        <div id="horarios_disciplina_selecionados"></div>

                    </td>
                </tr>
                <tr>
                    <td height='36' align='right' class='text_bold_preto'>Professor</td>
                    <td class='text_padrao' colspan="3">
                        <input type="text" autocomplete="off" name="nome_servidor" placeholder="Digite o nome do professor.." cod_servidor="" class='k-textbox' id="suggest_servidor" value="" size="60">
                        <input type="hidden" name="cod_servidor" id="cod_servidor" value="">
                    </td>
                </tr>

                <tr>

                    <td height='36' align='right' class='text_bold_preto'>Horas Aula 1º Semestre</td>
                    <td class='text_padrao'>
                        <input name='horas_aula_semestre1' type='text' class='k-textbox <?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($turma->codigo)?>'  size='13' maxlength='6' />

                    </td>

                    <td height='36' align='right' class='text_bold_preto'>Horas Aula 2º Semestre</td>
                    <td class='text_padrao'>
                        <input name='horas_aula_semestre2' type='text' class='k-textbox <?=$erro['num_max_aluno']?>' id='num_max_aluno' value='<?=stripslashes($turma->numMaxAluno)?>'  size='13' maxlength='6' />

                    </td>
                </tr>


            </table>
        </form>
    </td>
</tr>

</form>
<tr>
    <td colspan="2">
        <div style="padding: 10px 0 10px 10px;">

            <div class='topo_multi_select' >
                <p style="width: 350px !important;font-size: 14px;"> &raquo; Selecione os horários dessa disciplina</p>
            </div>

            <div class="clear"></div>
            <!-- TABELA DE HORÁRIO -->

                <table id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
                    <thead>
                    <tr>
                        <th style="width: 68px !important">HORÁRIO</th>
                        <th style="width: 75px !important">SEGUNDA</th>
                        <th style="width: 75px !important">TER&Ccedil;A</th>
                        <th style="width: 75px !important">QUARTA</th>
                        <th style="width: 75px !important">QUINTA</th>
                        <th style="width: 75px !important">SEXTA</th>
                        <th style="width: 75px !important">S&Aacute;BADO</th>
                    </tr>
                    </thead>
                    <? foreach($horarios as $horario): ?>

                        <tr>

                            <td style="height: 40px !important;"><b><?=substr($horario->horaInicio,0,5)?>/<?=substr($horario->horaFim,0,5)?></b></td>
                            <td>
                                <span id="<?=$horario->id?>_1_text_dialog">
                                    <? if($dados_grade_horario["nome_disciplina_horario"][$horario->id][1]): ?>

                                            <?=utf8_decode($dados_grade_horario["nome_disciplina_horario"][$horario->id][1])?>

                                    <? else: ?>

                                            <button class="bt" onclick="adicionarDisciplinaHorario($('#cod_disciplina').val(),<?=$horario->id?>,1)" style="width: 76px;height: 40px;">
                                                Adicionar Aqui
                                            </button>

                                    <? endif; ?>
                                </span>

                            </td>
                            <td>

                                <span id="<?=$horario->id?>_2_text_dialog">
                                    <? if($dados_grade_horario["nome_disciplina_horario"][$horario->id][2]): ?>

                                        <?=utf8_decode($dados_grade_horario["nome_disciplina_horario"][$horario->id][2])?>

                                    <? else: ?>

                                        <button class="bt" onclick="adicionarDisciplinaHorario($('#cod_disciplina').val(),<?=$horario->id?>,2)" style="width: 76px;height: 40px;">
                                            Adicionar Aqui
                                        </button>

                                    <? endif; ?>
                                </span>

                            </td>
                            <td>
                                <span id="<?=$horario->id?>_3_text_dialog">
                                    <? if($dados_grade_horario["nome_disciplina_horario"][$horario->id][3]): ?>

                                        <?=utf8_decode($dados_grade_horario["nome_disciplina_horario"][$horario->id][3])?>

                                    <? else: ?>

                                        <button class="bt" onclick="adicionarDisciplinaHorario($('#cod_disciplina').val(),<?=$horario->id?>,3)" style="width: 76px;height: 40px;">
                                            Adicionar Aqui
                                        </button>

                                    <? endif; ?>
                                </span>

                            </td>
                            <td>
                                <span id="<?=$horario->id?>_4_text_dialog">
                                    <? if($dados_grade_horario["nome_disciplina_horario"][$horario->id][4]): ?>

                                        <?=utf8_decode($dados_grade_horario["nome_disciplina_horario"][$horario->id][4])?>

                                    <? else: ?>

                                        <button class="bt" onclick="adicionarDisciplinaHorario($('#cod_disciplina').val(),<?=$horario->id?>,4)" style="width: 76px;height: 40px;">
                                            Adicionar Aqui
                                        </button>

                                    <? endif; ?>
                                </span>

                            </td>
                            <td>
                                <span id="<?=$horario->id?>_5_text_dialog">

                                    <? if($dados_grade_horario["nome_disciplina_horario"][$horario->id][5]): ?>

                                        <?=utf8_decode($dados_grade_horario["nome_disciplina_horario"][$horario->id][5])?>

                                    <? else: ?>

                                        <button class="bt" onclick="adicionarDisciplinaHorario($('#cod_disciplina').val(),<?=$horario->id?>,5)" style="width: 76px;height: 40px;">
                                            Adicionar Aqui
                                        </button>

                                    <? endif; ?>

                                </span>

                            </td>
                            <td>

                                <span id="<?=$horario->id?>_6_text_dialog">

                                    <? if($dados_grade_horario["nome_disciplina_horario"][$horario->id][6]): ?>

                                        <?=utf8_decode($dados_grade_horario["nome_disciplina_horario"][$horario->id][6])?>

                                    <? else: ?>

                                        <button class="bt" onclick="adicionarDisciplinaHorario($('#cod_disciplina').val(),<?=$horario->id?>,6)" style="width: 76px;height: 40px;">
                                            Adicionar Aqui
                                        </button>

                                    <? endif; ?>


                                </span>

                            </td>

                        </tr>

                    <? endforeach; ?>
                </table>

            <!------------------------------->

        </div>
    </td>

</tr>