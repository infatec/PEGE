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
            dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
            monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Pr�ximo',
            prevText: 'Anterior'
        });

        $(".datepicker").removeClass("datepicker");


    });

</script>