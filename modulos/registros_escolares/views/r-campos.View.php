<tr>

   <td colspan="2">
       <form id="form_turma">
        <table>
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

                        <? if($turma->anoId): ?>

                            <?
                            $dados = array('primary_key' => 'id',
                                'nome' => 'nome',
                                'tabela' => 'ano',
                                'condicao' => 'where nivel_ensino_mec_id='.$turma->nivelEnsinoMecId.' and id in (select ano_id from ano_escola where escola_id='.$escola_id.') order by nome asc',
                                'nome_input' => 'ano_id',
                                'id' => 'ano_id',
                                'class' => $erro["ano_id"],
                                'value' => $turma->anoId);

                            DAOFactory::getTurmaDAO()->geraSelect($dados);
                            ?>

                        <? else: ?>
                            <select disabled=""><option>Selecione um Nível de Ensino</option></select>
                        <? endif; ?>

                    </span>

                </td>
            </tr>


            <tr>
                <td height='36' align='right' class='text_bold_preto'>Sala</td>
                <td class='text_padrao'>
                    <?
                    $dados = array('primary_key' => 'id',
                        'nome' => 'nome',
                        'tabela' => 'sala',
                        'condicao' => ' where escola_id='.$escola_id.' order by nome asc',
                        'nome_input' => 'sala_id',
                        'id' => 'sala_id',
                        'class' => $erro["sala_id"],
                        'value' => $turma->salaId);

                    DAOFactory::getTurmaDAO()->geraSelect($dados);
                    ?>
                </td>
            </tr>

            <tr>
                <td height='36' align='right' class='text_bold_preto'>Código</td>
                <td class='text_padrao'>
                    <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$turma->id?>"  size="3" maxlength="3" />
                    <input name='codigo' type='text' class='k-textbox <?=$erro['codigo']?>' id='codigo' value='<?=stripslashes($turma->codigo)?>'  size='25' maxlength='25' />

                </td>
            </tr>


            <tr>
                <td height='36' align='right' class='text_bold_preto'>Número Maximo de Alunos</td>
                <td class='text_padrao'>
                    <input name='num_max_aluno' type='text' class='k-textbox <?=$erro['num_max_aluno']?>' id='num_max_aluno' value='<?=stripslashes($turma->numMaxAluno)?>'  size='11' maxlength='11' />

                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div style="padding: 10px 0 10px 50px;">
                        <div class='topo_multi_select'>
                            <p> &raquo; Disciplinas</p>
                        </div>
                        <div class="clear"></div>

                        <button onclick="formDisciplina()" type="button" class="bt" style="width: 200px;">Inserir Disciplina</button>
                        <div class="clear"></div>

                        <div id="disciplinas">

                            <?
                                if($disciplinas_turmas_edicao){
                                    foreach($disciplinas_turmas_edicao as $disciplina_obj){

                                        $disciplina_id = $disciplina_obj["disciplina"]["disciplina_med_id"];
                                        $nome_disciplina = $disciplina_obj["disciplina"]["nome_disciplina"];
                                        $nome_professor = $disciplina_obj["disciplina"]["nome_professor"];
                                        $servidor_id =  $disciplina_obj["disciplina"]["servidor_id"];
                                        $horas_aula_1_semestre = $disciplina_obj["disciplina"]["horas_aula_semestre1"];
                                        $horas_aula_2_semestre = $disciplina_obj["disciplina"]["horas_aula_semestre2"];

                                        $horarios = $disciplina_obj["horarios_hidden"];

                                        include(DOMAIN_PATH."modulos/turma/views/dados_disciplina_turma.php");
                                    }
                                }
                            ?>


                        </div>
                        <div id="dialog_disciplina"></div>

                    </div>

                </td>
            </tr>

        </table>
      </form>
   </td>
</tr>

</form>
<tr>
    <td colspan="2">
        <div style="padding: 10px 0 10px 50px;">

            <div class='topo_multi_select'>
                <p> &raquo; Grade de Horários Aula</p>
            </div>

            <div class="clear"></div>
            <!-- TABELA DE HORÁRIO -->
            <form id="form_grade_horario">
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
                <? foreach($horarios_aula as $horario): ?>

                    <tr>

                        <td style="height: 40px !important;"><b><?=substr($horario->horaInicio,0,5)?>/<?=substr($horario->horaFim,0,5)?></b></td>
                        <td>
                            <span id="<?=$horario->id?>_1_text">
                                <?=$grade_horario[$horario->id][1]["nome_disciplina"]?>
                            </span>
                            <input type="hidden" id="nomeDisc_<?=$horario->id?>_1" value="<?=$grade_horario[$horario->id][1]["nome_disciplina"]?>" name="nome_disciplina_horario[<?=$horario->id?>][1]">
                            <input type="hidden" id="idDisc_<?=$horario->id?>_1" value="<?=$grade_horario[$horario->id][1]["disciplina_mec_id"]?>" name="turma_disciplina_horario[<?=$horario->id?>][1]">
                        </td>
                        <td>
                            <span id="<?=$horario->id?>_2_text">
                            <?=$grade_horario[$horario->id][2]["nome_disciplina"]?>
                            </span>
                            <input type="hidden" id="nomeDisc_<?=$horario->id?>_2" value="<?=$grade_horario[$horario->id][2]["nome_disciplina"]?>" name="nome_disciplina_horario[<?=$horario->id?>][2]">
                            <input type="hidden" id="idDisc_<?=$horario->id?>_2" value="<?=$grade_horario[$horario->id][2]["disciplina_mec_id"]?>" name="turma_disciplina_horario[<?=$horario->id?>][2]">
                        </td>
                        <td>
                            <span id="<?=$horario->id?>_3_text">
                            <?=$grade_horario[$horario->id][3]["nome_disciplina"]?>
                            </span>
                            <input type="hidden" id="nomeDisc_<?=$horario->id?>_3" value="<?=$grade_horario[$horario->id][3]["nome_disciplina"]?>" name="nome_disciplina_horario[<?=$horario->id?>][3]">
                            <input type="hidden" id="idDisc_<?=$horario->id?>_3" value="<?=$grade_horario[$horario->id][3]["disciplina_mec_id"]?>" name="turma_disciplina_horario[<?=$horario->id?>][3]">
                        </td>
                        <td>
                            <span id="<?=$horario->id?>_4_text">
                            <?=$grade_horario[$horario->id][4]["nome_disciplina"]?>
                            </span>
                            <input type="hidden" id="nomeDisc_<?=$horario->id?>_4" value="<?=$grade_horario[$horario->id][4]["nome_disciplina"]?>" name="nome_disciplina_horario[<?=$horario->id?>][4]">
                            <input type="hidden" id="idDisc_<?=$horario->id?>_4" value="<?=$grade_horario[$horario->id][4]["disciplina_mec_id"]?>" name="turma_disciplina_horario[<?=$horario->id?>][4]">
                        </td>
                        <td>
                            <span id="<?=$horario->id?>_5_text">
                            <?=$grade_horario[$horario->id][5]["nome_disciplina"]?>
                            </span>
                            <input type="hidden" id="nomeDisc_<?=$horario->id?>_5" value="<?=$grade_horario[$horario->id][5]["nome_disciplina"]?>" name="nome_disciplina_horario[<?=$horario->id?>][5]">
                            <input type="hidden" id="idDisc_<?=$horario->id?>_5" value="<?=$grade_horario[$horario->id][5]["disciplina_mec_id"]?>" name="turma_disciplina_horario[<?=$horario->id?>][5]">
                        </td>
                        <td>
                            <span id="<?=$horario->id?>_6_text">
                            <?=$grade_horario[$horario->id][6]["nome_disciplina"]?>
                            </span>
                            <input type="hidden" id="nomeDisc_<?=$horario->id?>_6" value="<?=$grade_horario[$horario->id][6]["nome_disciplina"]?>" name="nome_disciplina_horario[<?=$horario->id?>][6]">
                            <input type="hidden" id="idDisc_<?=$horario->id?>_6" value="<?=$grade_horario[$horario->id][6]["disciplina_mec_id"]?>" name="turma_disciplina_horario[<?=$horario->id?>][6]">
                        </td>

                    </tr>

                <? endforeach; ?>
            </table>
            </form>
            <!------------------------------->

        </div>
    </td>

</tr>


