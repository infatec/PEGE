<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Escola</td>
                                    <td class='text_padrao'>
                                        <input type="text" id="escola_nome" value="<?=DAOFactory::getCarteiraEstudantilDAO()->toString("escola","nome",$carteira_estudantil->escolaId)?>" disabled="disabled" size="50" /> 
                                        <input type="hidden" value="<?=$carteira_estudantil->escolaId?>" name="escola_id" id="escola_id"/>
                                        <a href="../../includes/busca_registro.php?modulo=escola&tabela=escola&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Aluno</td>
                                    <td class='text_padrao'>
                                        <input type="text" id="aluno_nome" value="<?=DAOFactory::getCarteiraEstudantilDAO()->toString("aluno","nome",$carteira_estudantil->alunoId)?>" disabled="disabled" size="50" /> 
                                        <input type="hidden" value="<?=$carteira_estudantil->alunoId?>" name="aluno_id" id="aluno_id"/>
                                        <a href="../../includes/busca_registro.php?modulo=aluno&tabela=aluno&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Turma</td>
                                    <td class='text_padrao'>
                                        <input name='turma' type='text' class='<?=$erro['turma']?>' id='turma' value='<?=stripslashes($carteira_estudantil->turma)?>'  size='20' maxlength='20' />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Turno</td>
                                    <td class='text_padrao'>
                                        <input name='turno' type='text' class='<?=$erro['turno']?>' id='turno' value='<?=stripslashes($carteira_estudantil->turno)?>'  size='20' maxlength='20' />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Matricula</td>
                                    <td class='text_padrao'>
                                        <input name='matricula' type='text' class='<?=$erro['matricula']?>' id='matricula' value='<?=stripslashes($carteira_estudantil->matricula)?>'  size='20' maxlength='20' />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Foto</td>
                                    <td class='text_padrao'>
                                        <input name='foto' type='text' class='<?=$erro['foto']?>' id='foto' value='<?=stripslashes($carteira_estudantil->foto)?>'  size='20' maxlength='20' />

                                    </td>
                                </tr>

    <tr>
        <td colspan="2">

            <div align="center">
                <img width="500" height="300" src="carteira_estudantil.png">
            </div>

        </td>

    </tr>


