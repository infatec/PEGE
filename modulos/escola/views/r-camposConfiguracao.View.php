<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

<input name="configuracao_id" type="hidden" class="<?=$class_id?>" id="<?=$configuracao_id?>" value="<?=$configuracao_id?>"  size="3" maxlength="3" />

<tr>
    <td height='36' align='right' class='text_bold_preto'>Prédio Pesquisado</td>
    <td class='text_padrao'>
        <input name='pred_pesq' type='text' class='<?=$erro['pred_pesq']?>' id='pred_pesq' value='<?=stripslashes($configuracao_escola->predPesq)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('pred_pesq', 'pred_pesqT', 50);" />

    </td>


    <td height='36' align='right' class='text_bold_preto'>Situação da codificação</td>
    <td class='text_padrao'>

        <select id="status_codificacao" name="status_codificacao">
            <option value="Sem código" <? if($configuracao_escola->statusCodificacao=="Sem código") echo "selected" ?>>Escola nova, sem código</option>
            <option value="Codificada" <? if($configuracao_escola->statusCodificacao=="Codificada") echo "selected" ?>>Escola codificada</option>
            <option value="Código novo" <? if($configuracao_escola->statusCodificacao=="Código novo") echo "selected" ?>>Escola com código novo</option>
        </select>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Código SEEC A</td>
    <td class='text_padrao'>
        <input name='cod_seec_a' type='text' class='<?=$erro['cod_seec_a']?>' id='cod_seec_a' value='<?=stripslashes($configuracao_escola->codSeecA)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('cod_seec_a', 'cod_seec_aT', 50);" />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Código SEEC B</td>
    <td class='text_padrao'>
        <input name='cod_seec_b' type='text' class='<?=$erro['cod_seec_b']?>' id='cod_seec_b' value='<?=stripslashes($configuracao_escola->codSeecB)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('cod_seec_b', 'cod_seec_bT', 50);" />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Dependência Administrativa</td>
    <td class='text_padrao'>
        <select id="dependencia_administrativa" name="dependencia_administrativa">
            <option value="Nenhuma" <? if($configuracao_escola->dependenciaAdministrativa=="Nenhuma") echo "selected" ?>>Nenhuma</option>
            <option value="Municipal" <? if($configuracao_escola->dependenciaAdministrativa=="Municipal") echo "selected" ?>>Municipal</option>
            <option value="Outro" <? if($configuracao_escola->dependenciaAdministrativa=="Outro") echo "selected" ?>>Outro</option>
        </select>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Natureza de ocupação</td>
    <td class='text_padrao'>

        <select id="natureza_ocupacao" name="natureza_ocupacao">
            <option value="próprio" <? if($configuracao_escola->naturezaOcupacao=="próprio") echo "selected" ?>>Próprio</option>
            <option value="alugado" <? if($configuracao_escola->naturezaOcupacao=="alugado") echo "selected" ?>>Alugado</option>
            <option value="cedido" <? if($configuracao_escola->naturezaOcupacao=="cedido") echo "selected" ?>>Cedido</option>
            <option value="conveniado" <? if($configuracao_escola->naturezaOcupacao=="conveniado") echo "selected" ?>>Conveniado</option>
        </select>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Natureza de ocupação do prédio</td>
    <td class='text_padrao'>
        <select id="natureza_ocupacao_predrio" name="natureza_ocupacao_predrio">
            <option value="próprio" <? if($configuracao_escola->naturezaOcupacaoPredrio=="conveniado") echo "selected" ?>>Próprio</option>
            <option value="alugado" <? if($configuracao_escola->naturezaOcupacaoPredrio=="alugado") echo "selected" ?>>Alugado</option>
            <option value="cedido" <? if($configuracao_escola->naturezaOcupacaoPredrio=="cedido") echo "selected" ?>>Cedido</option>
            <option value="conveniado" <? if($configuracao_escola->naturezaOcupacaoPredrio=="conveniado") echo "selected" ?>>Conveniado</option>
        </select>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Propriedade do imóvel</td>
    <td class='text_padrao'>

        <select id="entidade_proprietaria_movel" name="entidade_proprietaria_movel">
            <option value="federal" <? if($configuracao_escola->entidadeProprietariaMovel=="federal") echo "selected" ?>>Federal</option>
            <option value="estadual" <? if($configuracao_escola->entidadeProprietariaMovel=="estadual") echo "selected" ?>>Estadual</option>
            <option value="municipal" <? if($configuracao_escola->entidadeProprietariaMovel=="municipal") echo "selected" ?>>Municipal</option>
            <option value="particular" <? if($configuracao_escola->entidadeProprietariaMovel=="particular") echo "selected" ?>>Particular</option>
        </select>

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Status Funcionamento</td>
    <td class='text_padrao' >
        <select id="status_funcionamento" name="status_funcionamento">
            <option value="Indefinido" <? if($configuracao_escola->statusFuncionamento=="Ativa") echo "selected" ?>>Ativa</option>
            <option value="Paralisada" <? if($configuracao_escola->statusFuncionamento=="Paralisada") echo "selected" ?>>Paralisada</option>
            <option value="Extinta" <? if($configuracao_escola->statusFuncionamento=="Extinta") echo "selected" ?>>Extinta</option>
            <option value="Fechada" <? if($configuracao_escola->statusFuncionamento=="Fechada") echo "selected" ?>>Fechada</option>
        </select>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Situação do Censo</td>
    <td class='text_padrao' >
        <select id="situacao_censo" name="situacao_censo">
            <option value="Não Enviado" <? if($configuracao_escola->situacaoCenso=="Não Enviado") echo "selected" ?>>Não Enviado</option>
            <option value="Enviado" <? if($configuracao_escola->situacaoCenso=="Enviado") echo "selected" ?>>Enviado</option>
        </select>

    </td>

</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Total de salas</td>
    <td class='text_padrao'>
        <input name='total_salas_aula' type='text' class='<?=$erro['total_salas_aula']?>' id='total_salas_aula' value='<?=stripslashes($configuracao_escola->totalSalasAula)?>'  size='11' maxlength='11' onKeyUp="ContaCaracteresCampo('total_salas_aula', 'total_salas_aulaT', 11);" />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Total de salas Levantadas</td>
    <td class='text_padrao'>
        <input name='total_salas_levantada' type='text' class='<?=$erro['total_salas_levantada']?>' id='total_salas_levantada' value='<?=stripslashes($configuracao_escola->totalSalasLevantada)?>'  size='11' maxlength='11' onKeyUp="ContaCaracteresCampo('total_salas_levantada', 'total_salas_levantadaT', 11);" />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Unidade Executora</td>
    <td class='text_padrao'>

        <select id="unidade_executora" name="unidade_executora">
            <option value="associação de pais e mestres" <? if($configuracao_escola->unidadeExecutora=="associação de pais e mestres") echo "selected" ?>>Associação de Pais e Mestres</option>
            <option value="conselho de escola" <? if($configuracao_escola->unidadeExecutora=="conselho de escola") echo "selected" ?>>Conselho de escola</option>
            <option value="caixa escolar" <? if($configuracao_escola->unidadeExecutora=="caixa escolar") echo "selected" ?>>Caixa escolar</option>
            <option value="outra" <? if($configuracao_escola->unidadeExecutora=="outra") echo "selected" ?>>Outra</option>
            <option value="não existe" <? if($configuracao_escola->unidadeExecutora=="não existe") echo "selected" ?>>Não existe</option>
        </select>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Outras atividades do prédio</td>
    <td class='text_padrao' >

        <select id="identificacao_outras_atividades_predio" name="identificacao_outras_atividades_predio">
            <option value="ensino fundamental regular" <? if($configuracao_escola->identificacaoOutrasAtividadesPredio=="outra") echo "selected" ?>>Ensino fundamental regular</option>
            <option value="outras atividades educacionais" <? if($configuracao_escola->identificacaoOutrasAtividadesPredio=="outra") echo "selected" ?>>Outras atividades educacionais</option>
            <option value="atividades-não-educacionais" <? if($configuracao_escola->identificacaoOutrasAtividadesPredio=="outra") echo "selected" ?>>Atividades -não-educacionais</option>
        </select>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Docência?</td>
    <td class='text_padrao'>
        <?=checkboxString("docencia","S",trim($configuracao_escola->docencia))?>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Promoção de acesso à informação?</td>
    <td class='text_padrao'>
        <?=checkboxString("promocao_acesso_informacao","S",trim($configuracao_escola->promocaoAcessoInformacao))?>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Apoio educacional?</td>
    <td class='text_padrao'>
        <?=checkboxString("apoio_educacional","S",trim($configuracao_escola->apoioEducacional))?>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Alimentação?</td>
    <td class='text_padrao'>

        <?=checkboxString("alimentacao","S",trim($configuracao_escola->alimentacao))?>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Saúde e higiene?</td>
    <td class='text_padrao'>
        <?=checkboxString("saude_e_higiene","S",trim($configuracao_escola->saudeEHigiene))?>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Promoção da convivência? </td>
    <td class='text_padrao'>

        <?=checkboxString("promocao_convivencia","S",trim($configuracao_escola->promocaoConvivencia))?>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Suporte pedagógico à docência?</td>
    <td class='text_padrao'>
        <?=checkboxString("suporte_pedagogico_docencia","S",trim($configuracao_escola->suportePedagogicoDocencia))?>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Administração? </td>
    <td class='text_padrao'>
        <?=checkboxString("administracao","S",trim($configuracao_escola->administracao))?>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Manutenção, conservação e segurança?</td>
    <td class='text_padrao'>
        <?=checkboxString("manutencao_conservacao_seguranca","S",trim($configuracao_escola->manutencaoConservacaoSeguranca))?>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Assentamento? </td>
    <td class='text_padrao'>
        <?=checkboxString("assentamento","S",trim($configuracao_escola->assentamento))?>

    </td>
</tr>
</table>