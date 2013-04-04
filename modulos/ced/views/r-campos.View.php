<tr>
<td height="5" align="right" class="text_bold_preto">&nbsp;</td>
<td class="text_padrao">
<input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
</td>
</tr>

<tr>
        <td height='36' align='right' class='text_bold_preto'>Documento</td>
        <td class='text_padrao'>
            <input name='descricao' type='text' class='<?=$erro['descricao']?>' id='descricao' value='<?=stripslashes($ced->descricao)?>'  size='80' maxlength='80' />

        </td>
    </tr>
<tr>
        <td height='36' align='right' class='text_bold_preto'>Escola</td>
        <td class='text_padrao'>
            <input type="text" id="escola_nome" value="<?=DAOFactory::getCedDAO()->toString("escola","nome",$ced->escolaId)?>" disabled="disabled" size="50" />
            <input type="hidden" value="<?=$ced->escolaId?>" name="escola_id" id="escola_id"/>
            <a href="../../includes/busca_registro.php?modulo=escola&tabela=escola&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
        </td>
    </tr>


<tr>
        <td height='36' align='right' class='text_bold_preto'>Aluno</td>
        <td class='text_padrao'>
            <input type="text" id="aluno_nome" value="<?=DAOFactory::getCedDAO()->toString("aluno","nome",$ced->alunoId)?>" disabled="disabled" size="50" />
            <input type="hidden" value="<?=$ced->alunoId?>" name="aluno_id" id="aluno_id"/>
            <a href="../../includes/busca_registro.php?modulo=aluno&tabela=aluno&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
        </td>
    </tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Servidor</td>
    <td class='text_padrao'>
        <input type="text" id="servidor_nome" value="<?=DAOFactory::getCedDAO()->toString("servidor","nome",$ced->servidorId)?>" disabled="disabled" size="50" />
        <input type="hidden" value="<?=$ced->servidorId?>" name="servidor_id" id="servidor_id"/>
        <a href="../../includes/busca_registro.php?modulo=servidor&tabela=servidor&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
    </td>
</tr>
<tr>
    <td colspan="2">

        <div style="width:211px; height:205px; float:left;padding: 50px;"><img src="CED_Scanner_.png"></div>

        <div style="width:211px; height:205px; float:right;margin-top:20px;padding: 50px;"><img width="150" height="150" src="livrosCed.jpg"></div>


    </td>

</tr>


