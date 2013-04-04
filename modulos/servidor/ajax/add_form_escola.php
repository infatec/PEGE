<?php

include("includes_ajax.php");
#### MODELS #########
import("Escola");

$escola_id = $_POST["escola_id"];
$inep = $_POST["inep"];
$nome_escola = utf8_decode($_POST["nome_escola"]);

include("../views/form_escola.php");

?>

<script>
    $(document).ready(function()
    {
        $('input[type="text"]').addClass('k-textbox');
        //$('select').addClass('select_form');

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

        $(".datepicker").removeClass("datepicker");


    });

</script>