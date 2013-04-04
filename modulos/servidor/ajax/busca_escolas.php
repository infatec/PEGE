<?php

include("includes_ajax.php");
#### MODELS #########

?>
<form action="<?=$GLOBALS["paginaAtual"]?>"  name="form" method="get">
    <table width="590" border="0" style="padding: 20px;" cellspacing="0" cellpadding="0" class="filtro">
        <tr>

            <td width="120">
                <input type="hidden" value="" id="escola_id">
                Nome ou Inep da Escola <br /><input autocomplete="off" name="nome" type="text" class="k-textbox" id="campo_text_escola" onKeyDown="buscaEscolasServidor(this)"  size="50" maxlength="50"></td>
            <td valign="bottom"></td>

        </tr>

    </table>
</form>

<div id="lista_escolas" class="borda" style="width: 565;padding: 10px;display: none;">

</div>

<table id="msg_digite" width="590" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
    <tr>
        <td>
            <div class="message tip">
                <p>Digite o nome de uma escola.</p>
            </div>
        </td>
    </tr>
</table>