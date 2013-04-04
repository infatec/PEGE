<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Escola</td>
                                    <td class='text_padrao'>
                                        <input type="text" id="escola_nome" value="<?=DAOFactory::getTurnoDAO()->toString("escola","nome",$turno->escolaId)?>" disabled="disabled" size="50" /> 
                                        <input type="hidden" value="<?=$turno->escolaId?>" name="escola_id" id="escola_id"/>
                                        <a href="../../includes/busca_registro.php?modulo=escola&tabela=escola&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome</td>
                                    <td class='text_padrao'>
                                        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($turno->nome)?>'  size='50' maxlength='50' />

                                    </td>
                                </tr>


