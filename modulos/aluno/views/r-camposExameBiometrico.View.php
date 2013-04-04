<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Peso</td>
        <td class='text_padrao'>
            <input name='peso' type='text' class='<?=$erro['peso']?>' id='peso' value='<?=stripslashes($aluno->peso)?>'  size='15' maxlength='15' />

        </td>

        <td height='36' align='right' class='text_bold_preto'>Altura</td>
        <td class='text_padrao'>
            <input name='altura' type='text' class='<?=$erro['altura']?>' id='altura' value='<?=stripslashes($aluno->altura)?>'  size='15' maxlength='15' />

        </td>
    </tr>


    <tr>
        <td height='36' align='right' class='text_bold_preto'>Cor</td>
        <td class='text_padrao'>

            <select name="raca">
                <option value=""></option>
                <option value="Negro" <? if($aluno->raca=="Negro") echo "selected" ?>>Negro</option>
                <option value="Mulato escuro" <? if($aluno->raca=="Mulato escuro") echo "selected" ?>>Mulato escuro</option>
                <option value="Mulato médio" <? if($aluno->raca=="Mulato médio") echo "selected" ?>>Mulato médio</option>
                <option value="Mulato claro" <? if($aluno->raca=="Mulato claro") echo "selected" ?>>Mulato claro</option>
                <option value="Branco" <? if($aluno->raca=="Branco") echo "selected" ?>>Branco</option>
            </select>

        </td>

        <td height='36' align='right' class='text_bold_preto'>Tipo de deficiência</td>
        <td class='text_padrao'>
            <select name="tipo_defic">
                <option value=""></option>
                <option value="VISUAL" <? if($aluno->tipoDefic=="VISUAL") echo "selected" ?>>Deficiência visual</option>
                <option value="MOTORA" <? if($aluno->tipoDefic=="MOTORA") echo "selected" ?>>Deficiência motora</option>
                <option value="MENTAL" <? if($aluno->tipoDefic=="MENTAL") echo "selected" ?>>Deficiência mental</option>
                <option value="AUDITIVA" <? if($aluno->tipoDefic=="AUDITIVA") echo "selected" ?>>Deficiência auditiva</option>
            </select>
        </td>
    </tr>


    <tr>
        <td height='36' align='right' class='text_bold_preto'>Grupo sanguineo</td>
        <td class='text_padrao'>

            <select name="grupo_sangue">
                <option value=""></option>
                <option value="O+" <? if($aluno->grupoSangue=="O+") echo "selected" ?>>O+</option>
                <option value="O-" <? if($aluno->grupoSangue=="O?") echo "selected" ?>>O-</option>
                <option value="A+" <? if($aluno->grupoSangue=="A+") echo "selected" ?>>A+</option>
                <option value="A-" <? if($aluno->grupoSangue=="A?</") echo "selected" ?>>A-</option>
                <option value="B+" <? if($aluno->grupoSangue=="B+") echo "selected" ?>>B+</option>
                <option value="AB+" <? if($aluno->grupoSangue=="AB++") echo "selected" ?>>AB+</option>
                <option value="AB-" <? if($aluno->grupoSangue=="AB++") echo "selected" ?>>AB-</option>
            </select>

        </td>

        <td height='36' align='right' class='text_bold_preto'>Fator RH</td>
        <td class='text_padrao'>
            <select name="grupo_sangue_rh">
                <option value=""></option>
                <option value="RH positivo (+)" <? if($aluno->grupoSangueRh=="RH positivo (+)") echo "selected" ?>>RH positivo (+)</option>
                <option value="RH negativo (-)" <? if($aluno->grupoSangueRh=="RH negativo (-)") echo "selected" ?>>RH negativo (-)</option>
            </select>
        </td>
    </tr>


    <tr>
        <td height='36' align='right' class='text_bold_preto'>Alergia no sangue</td>
        <td class='text_padrao'>
            <select name="grupo_sangue_alergia">
                <option value="N" >Não</option>
                <option value="S" <? if($aluno->grupoSangueAlergia=="S") echo "selected" ?>>Sim</option>
            </select>
        </td>

        <td height='36' align='right' class='text_bold_preto'>Diabético</td>
        <td class='text_padrao'>
            <select name="grupo_sangue_diabetico">
                <option value="N" >Não</option>
                <option value="S" <? if($aluno->grupoSangueDiabetico=="S") echo "selected" ?>>Sim</option>
            </select>
        </td>
    </tr>


    <tr>
        <td height='36' align='right' class='text_bold_preto'>Outra doença</td>
        <td class='text_padrao'>
            <input name='outra_doenca' type='text' class='<?=$erro['outra_doenca']?>' id='outra_doenca' value='<?=stripslashes($aluno->outraDoenca)?>'  size='20' maxlength='20' />

        </td>


        <td height='36' align='right' class='text_bold_preto'>Usa óculos</td>
        <td class='text_padrao'>
            <select name="usa_oculos">
                <option value="N" >Não</option>
                <option value="S" <? if($aluno->usaOculo=="S") echo "selected" ?>>Sim</option>
            </select>
        </td>

    </tr>
    <tr>

        <td height='36' align='right' class='text_bold_preto'>Destro</td>
        <td class='text_padrao' colspan="3">
            <select name="destro">
                <option value="N" >Não</option>
                <option value="S" <? if($aluno->destro=="S") echo "selected" ?>>Sim</option>
            </select>
        </td>

    </tr>



</table>