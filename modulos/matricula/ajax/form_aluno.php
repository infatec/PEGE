<?php
include("includes_ajax.php");

import("Aluno");

$id = $_POST["aluno_id"];

if($id) $aluno = DAOFactory::getAlunoDAO()->load($id);

?>
<fieldset style="width: 840px;">
    <legend>Cadastro Aluno</legend>

    <form id="form_aluno">
        <table width="830" border="0" cellspacing="2" cellpadding="0" class="borda" style="margin:5px" >

            <tr>
                <td width="22%" height="20" align="center" class="text_bold_preto"><div id="msgUpload" style="text-align:center"><?=$msgUpload?></div></td>
                <td width="78%" class="text_padrao">&nbsp;</td>
            </tr>

            <tr align="center" id="tr_mensagem_erro" style="display: none;">
                <td colspan="2" width="330" >
                    <div class="message error" id="mensagem_erro">

                    </div>
                </td>
            </tr>


            <?php include(DOMAIN_PATH."modulos/aluno/views/r-campos.View.php")?>
            <tr>
                <td colspan="2" align="right" class="text_bold_preto">&nbsp;</td>
            </tr>
            <tr>
                <td height="50" align="right" class="text_bold_preto"><button type="button" onclick="salvaAluno()" class="botao_branco">Salvar</button></td>
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


    });

</script>

