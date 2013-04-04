<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Servidor</td>
                                    <td class='text_padrao'>
                                        <input type="text" id="servidor_nome" value="<?=DAOFactory::getPortariaDAO()->toString("servidor","nome",$portaria->servidorId)?>" disabled="disabled" size="50" /> 
                                        <input type="hidden" value="<?=$portaria->servidorId?>" name="servidor_id" id="servidor_id"/>
                                        <a href="../../includes/busca_registro.php?modulo=servidor&tabela=servidor&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Data Entrada</td>
                                    <td class='text_padrao'>
                                        <input name='data_entrada' type='text' class='<?=$erro['data_entrada']?>' id='data_entrada' value='<?=stripslashes($portaria->dataEntrada)?>'  size='' maxlength='' />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Hora Entrada</td>
                                    <td class='text_padrao'>
                                        <input name='hora_entrada' type='text' class='<?=$erro['hora_entrada']?>' id='hora_entrada' value='<?=stripslashes($portaria->horaEntrada)?>'  size='5' maxlength='5' />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>RG</td>
                                    <td class='text_padrao'>
                                        <input name='rg' type='text' class='<?=$erro['rg']?>' id='rg' value='<?=stripslashes($portaria->rg)?>'  size='20' maxlength='20' />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Aluno</td>
                                    <td class='text_padrao'>
                                        <input type="text" id="aluno_nome" value="<?=DAOFactory::getPortariaDAO()->toString("aluno","nome",$portaria->alunoId)?>" disabled="disabled" size="50" /> 
                                        <input type="hidden" value="<?=$portaria->alunoId?>" name="aluno_id" id="aluno_id"/>
                                        <a href="../../includes/busca_registro.php?modulo=aluno&tabela=aluno&campo=nome&height=520&width=560&keepThis=true&TB_iframe=true" title="Busca Registro" class="thickbox"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0"></a>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Modalidade</td>
                                    <td class='text_padrao'>
                                        <input name='modalidade' type='text' class='<?=$erro['modalidade']?>' id='modalidade' value='<?=stripslashes($portaria->modalidade)?>'  size='30' maxlength='30' />

                                    </td>
                                </tr>

    <tr>
        <td colspan="2">
            <div align="center" style="position:relative">
                <div align="left" style="float:left; width:150px; height:150px; margin-left:100px;">
                    <img width="100px" height="100px" src="cameraPortaria.jpg"></div>
                <div style="float:left; margin-left:100px;"><img width="150px" height="150px" src="Cont)Port_Catraca.png"></div>
                <div style="float:left; margin-left:100px;"><img width="200px" height="150px" src="carteira_estudantil.png"></div>
                <div></div>

                <div class="clear"></div>

            </div>


        </td>

    </tr>


