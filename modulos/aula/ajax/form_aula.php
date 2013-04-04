<?php
include("includes_ajax.php");

import("Aula");
import("Aluno");
import("FaltaAluno");

$turma_disciplina_id = (int)$_POST["turma_disciplina_id"];
$aula_id = (int)$_POST["aula_id"];

if($aula_id){
    $aula = DAOFactory::getAulaDAO()->load($aula_id);

    $faltas_aluno = DAOFactory::getFaltaAlunoDAO()->queryAll("*","WHERE aula_id = ".$aula_id."");

    $falta_ar=array();
    foreach($faltas_aluno as $falta){
        $falta_ar[$falta->matriculaId][$falta->aula] = "checked";
    }
}

$alunos = DAOFactory::getAlunoDAO()->getAlunosByDisciplina($turma_disciplina_id);

?>
<fieldset style="width: 790px;">
    <legend>Dados Aula</legend>
    <form id="form_aula">
    <table width="780" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

        <tr>
            <td colspan="2" align="right" class="text_bold_preto">

                <tr>

                    <td colspan="2">

                            <table>
                                <tr>
                                    <td height='36' align='right' class='text_bold_preto'>Data da aula:</td>
                                    <td class='text_padrao' colspan="3">
                                        <input type="hidden" name="id" value="<?=$aula->id?>">
                                        <input type="hidden" name="turma_disciplina_id" value="<?=$turma_disciplina_id?>">
                                        <input name='data_aula' ref="form_aula" campo="Data da aula" type='text' class='datepicker' value='<?=geradatabr1($aula->dataAula)?>'  size='15' maxlength='10' />
                                    </td>
                                </tr>
                                <tr>
                                    <td height='36' align='right' class='text_bold_preto'>Hora inicio</td>
                                    <td class='text_padrao'>
                                        <input name='hora_inicio' ref="form_aula" type='text' class='hora' value='<?=$aula->horaInicio?>'  size='10' maxlength='10' />
                                    </td>

                                    <td height='36' align='right' class='text_bold_preto'>Hora Fim</td>
                                    <td class='text_padrao'>
                                        <input name='hora_fim' ref="form_aula" type='text' class='hora' value='<?=$aula->horaFim?>'   size='10' maxlength='10' />
                                    </td>
                                </tr>

                                <tr>
                                    <td height='36' align='right' class='text_bold_preto'>Atividade:</td>
                                    <td class='text_padrao' colspan="3">
                                         <textarea ref="form_aula" class="k-textbox" style="width: 450px;height: 130px !important;" name="atividade"><?=$aula->atividade?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td height='36' align='right' class='text_bold_preto'>Qtd Aulas</td>
                                    <td class='text_padrao' colspan="3">
                                        <select name="qtd_aula" onchange="setQtdAulas(this.value)">
                                            <option value="1">1</option>
                                            <option value="2" <? if($aula->qtdAula=="2") echo "selected" ?>>2</option>
                                            <option value="3" <? if($aula->qtdAula=="3") echo "selected" ?>>3</option>
                                            <option value="4" <? if($aula->qtdAula=="4") echo "selected" ?>>4</option>
                                            <option value="5" <? if($aula->qtdAula=="5") echo "selected" ?>>5</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>

                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <div style="padding: 0px 0 10px 50px;">

                            <div class='topo_multi_select'>
                                <p> &raquo; Faltas</p>
                            </div>

                            <div class="clear"></div>
                            <!-- TABELA DE ALUNOS COM SUAS FALTAS -->
                            <form id="form_grade_horario">
                                <table id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
                                    <thead>
                                        <tr>
                                            <th style="width: 400px;">Aluno</th>
                                            <th>Aulas</th>
                                        </tr>
                                    </thead>
                                    <? foreach($alunos as $aluno): ?>

                                        <tr>
                                            <td style="text-align: left;">
                                               <?=$aluno["nome"]?>
                                            </td>
                                            <td>

                                                <? for($i=1;$i<=5;$i++): ?>

                                                  <span class="aula<?=$i?>">
                                                     Aula<?=$i?> <input type="checkbox" <?=$falta_ar[$aluno["matricula_id"]][$i]?>  name="faltas[<?=$aluno["matricula_id"]?>]" value="<?=$i?>">
                                                  </span>

                                                <? endfor; ?>

                                            </td>
                                        </tr>

                                    <? endforeach; ?>
                                </table>
                            </form>
                            <!------------------------------->

                        </div>
                    </td>

                </tr>
        </td>
        </tr>

        <tr>
            <td colspan="2" align="right" class="text_bold_preto">&nbsp;</td>
        </tr>
        <tr>
            <td height="50" align="left" class="text_bold_preto"><button type="button" class="bt botao_branco" onclick="salvarAula()">Salvar Aula</button></td>
            <td class="text_padrao"><input name="acao" type="hidden" id="acao" value="1"></td>
        </tr>
    </table>
    </form>
</fieldset>
    <script>
        $(document).ready(function()
        {
            $('input[type="text"]').addClass('k-textbox');
            //$('select').addClass('select_form');
            $('input[type="button"]').addClass('bt');
            $('input[type="submit"]').addClass('bt');
            $('button').addClass('bt');

            $(".data").mask("99/99/9999");
            $(".telefone").mask("(99)9999-9999");
            $(".cpf").mask("999.999.999-99");
            $(".cep").mask("99999-999");
            $(".hora").mask("99:99");

            $( ".datepicker" ).datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });

            <? for($i=1;$i<=5;$i++): ?>
                $(".aula<?=$i?>").hide();
            <? endfor; ?>

            <? if(!$aula_id): ?>
                $(".aula1").show();
            <? else: ?>

                <? for($i=1;$i<=5;$i++): ?>
                    <? if($aula->qtdAula>=$i): ?> $(".aula<?=$i?>").show(); <? endif; ?>
                <? endfor; ?>

            <? endif; ?>
        });


    </script>
