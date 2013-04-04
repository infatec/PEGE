<fieldset style="width: 790px;">
    <legend style="margin-right:585px;">Vínculo <?=$nome_vinculo?></legend>

    <div class="clear"></div>

    <div>
        <select id='searchable' multiple='multiple'>

            <? foreach($list_select as $opcao): ?>
            <option value="<?=$opcao["value"]?>"><?=$opcao["nome"]?></option>
            <? endforeach; ?>

        </select>
    </div>
</fieldset>

<div class="clear"></div>

<input type="hidden" id="msg_sucess" value="<?=$nome_vinculo?> carregas com sucesso.">


<script>
    $(document).ready(function()
    {
        $('#searchable').multiSelect({
            selectableHeader: "<div class='topo_multi_select'>" +
                    "<p> &raquo; <?=$nome_vinculo?> do MEC</p> " +
                    "<input type='text' id='search' size='40' class='k-textbox' placeholder='Busque aqui pelo nome..'> " +
                    "</div>",
            selectionHeader: "<div class='topo_multi_selected'>" +
                    "<p> &raquo; <?=$nome_vinculo?> da Escola</p> " +
                    "</div>",
            afterSelect: function(value, text){
                vinculaMecEscola(<?=$escola_id?>,value,'insert');
                $().toastmessage('showSuccessToast',$("#msg_sucess").val());
                $("#msg_sucess").val("<?=$nome_vinculo?> vinculada a escola.");
                //alert("Select value: "+value);
            },
            afterDeselect: function(value, text){
                vinculaMecEscola(<?=$escola_id?>,value,'remove');
                $().toastmessage('showSuccessToast', "<?=$nome_vinculo?> desvinculada a escola.");
                //alert("Deselect value: "+value);
            }
        });

        $('#search').quicksearch(

                $('.ms-elem-selectable', '#ms-searchable' )).on('keydown', function(e){
                    if (e.keyCode == 40){
                        $(this).trigger('focusout');
                        $('#search').focus();
                        return false;
                    }
                }

        );
        //AQUI VOU MARCAR OS DADOS QUE ESTÃO SALVAS
    <? if($marcadas_string): ?>
        // aqui vai receber as marcadas assim =>  '1','2','3'
        $('#searchable').multiSelect('select', [<?=$marcadas_string?>]);
        <? else: ?>
        $("#msg_sucess").val("<?=$nome_vinculo?> vinculada a escola.");
        <? endif; ?>
    });
</script>