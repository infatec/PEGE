<form action="<?=$GLOBALS["paginaAtual"]?>"  name="form" method="get">
    <table width="830" border="0" style="padding: 20px;" cellspacing="0" cellpadding="0" class="filtro">
        <tr>

            <td width="120">
                <input type="hidden" value="" id="escola_id">
                Nome ou Inep da Escola <br /><input name="nome" autocomplete="off" type="text" id="nome" onKeyDown="buscaEscolas(this)"  size="50" maxlength="50"></td>
            <td valign="bottom"> <button style="width: 200px;display: none;" id="btn_outra_escola" onclick="selecionarOutraEscola()" type="button" class="bt">Selecionar outra escola</button> </td>

        </tr>

        <tr id="dados_escola" style="display: none;">
            <td colspan="2">
                <fieldset style="width: 700px;">
                    <legend>Escola selecionada</legend>
                    <table width="640" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
                        <tr>
                            <td class="celulaTitle">Inep:</td>
                            <td style="text-align: left;" id="inep_escola"></td>
                        </tr>
                        <tr>
                            <td class="celulaTitle">Escola:</td>
                            <td style="text-align: left;" id="nome_escola"></td>
                        </tr>

                    </table>
                </fieldset>
            </td>
        </tr>

    </table>
</form>

<div id="lista_dados" class="borda" style="width: 810;padding: 10px;display: none;">


</div>

<div id="lista_escolas" class="borda" style="width: 810;padding: 10px;display: none;">

</div>


<table id="msg_digite" width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
    <tr>
        <td>
            <div class="message tip">
                <p>Digite o nome de uma escola.</p>
            </div>
        </td>
    </tr>
</table>