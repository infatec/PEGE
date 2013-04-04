<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao' colspan="3">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($servidor->nome)?>'  size='50' maxlength='50' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Professor?</td>
    <td class='text_padrao' colspan="3">
        <?=checkboxString("professor","S",trim($servidor->professor))?>
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>RG</td>
    <td class='text_padrao'>
        <input name='rg' type='text' class='rg <?=$erro['rg']?>' id='rg' value='<?=stripslashes($servidor->rg)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Org. Emissor</td>
    <td class='text_padrao'>
        <input name='orgao_emissor' type='text' class='<?=$erro['orgao_emissor']?>' id='orgao_emissor' value='<?=stripslashes($servidor->orgaoEmissor)?>'  size='8' maxlength='8' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Estado Emissor</td>
    <td class='text_padrao'>
        <input name='estado_emissor' type='text' class='estado_emissor <?=$erro['estado_emissor']?>' id='estado_emissor' value='<?=stripslashes($servidor->estadoEmissor)?>'  size='5' maxlength='5' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Pis</td>
    <td class='text_padrao'>
        <input name='pis' type='text' class='<?=$erro['pis']?>' id='pis' value='<?=stripslashes($servidor->pis)?>'  size='40' maxlength='40' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Pasep</td>
    <td class='text_padrao'>
        <input name='pis_pasep' type='text' class='<?=$erro['pis_pasep']?>' id='pis_pasep' value='<?=stripslashes($servidor->pisPasep)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Carteira de Trabalho</td>
    <td class='text_padrao'>
        <input name='carteira_trab' type='text' class='carteira_trab <?=$erro['carteira_trab']?>' id='carteira_trab' value='<?=stripslashes($servidor->carteiraTrab)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Série carteira de Trabalho</td>
    <td class='text_padrao'>
        <input name='carteira_serie' type='text' class='<?=$erro['carteira_serie']?>' id='carteira_serie' value='<?=stripslashes($servidor->carteiraSerie)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Data de Nascimento</td>
    <td class='text_padrao' colspan="3">
        <input name='data_nascimento' type='text' class='data <?=$erro['data_nascimento']?>' id='data_nascimento' value='<?=geradatabr1($servidor->dataNascimento)?>'  size='20' maxlength='20' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Cpf</td>
    <td class='text_padrao'>
        <input name='cpf' type='text' class='cpf <?=$erro['cpf']?>' id='cpf' value='<?=stripslashes($servidor->cpf)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Inep</td>
    <td class='text_padrao'>
        <input name='inep' type='text' class='<?=$erro['inep']?>' id='inep' value='<?=stripslashes($servidor->inep)?>'  size='40' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nº Titulo de Eleitor</td>
    <td class='text_padrao'>
        <input name='titulo_eleitor_numero' type='text' class='<?=$erro['titulo_eleitor_numero']?>' id='titulo_eleitor_numero' value='<?=stripslashes($servidor->tituloEleitorNumero)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Zona</td>
    <td class='text_padrao'>
        <input name='zona' type='text' class='<?=$erro['zona']?>' id='zona' value='<?=stripslashes($servidor->zona)?>'  size='40' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Seção</td>
    <td class='text_padrao'>
        <input name='secao' type='text' class='<?=$erro['secao']?>' id='secao' value='<?=stripslashes($servidor->secao)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Município</td>
    <td class='text_padrao'>
        <input name='municipio_titulo' type='text' class='<?=$erro['municipio_titulo']?>' id='municipio_titulo' value='<?=stripslashes($servidor->municipioTitulo)?>'  size='40' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nº Certidão de nascimento</td>
    <td class='text_padrao'>
        <input name='numero_certidao_nascimento' type='text' class='<?=$erro['numero_certidao_nascimento']?>' id='numero_certidao_nascimento' value='<?=stripslashes($servidor->numeroCertidaoNascimento)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Livro</td>
    <td class='text_padrao'>
        <input name='livro' type='text' class='<?=$erro['livro']?>' id='livro' value='<?=stripslashes($servidor->livro)?>'  size='30' maxlength='30' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>FL</td>
    <td class='text_padrao'>
        <input name='certidao_fl' type='text' class='<?=$erro['certidao_fl']?>' id='certidao_fl' value='<?=stripslashes($servidor->certidaoFl)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Cartório</td>
    <td class='text_padrao'>
        <input name='cartorio' type='text' class='<?=$erro['cartorio']?>' id='cartorio' value='<?=stripslashes($servidor->cartorio)?>'  size='40' maxlength='40' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome Mãe</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_mae' type='text' class='<?=$erro['nome_mae']?>' id='nome_mae' value='<?=stripslashes($servidor->nomeMae)?>'  size='50' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome Pai</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_pai' type='text' class='<?=$erro['nome_pai']?>' id='nome_pai' value='<?=stripslashes($servidor->nomePai)?>'  size='50' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome do Conjugue</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_conjuge' type='text' class='<?=$erro['nome_conjuge']?>' id='nome_conjuge' value='<?=stripslashes($servidor->nomeConjuge)?>'  size='50' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nº Certidão de casamento</td>
    <td class='text_padrao'>
        <input name='certidao_casamento_numero' type='text' class='<?=$erro['certidao_casamento_numero']?>' id='certidao_casamento_numero' value='<?=stripslashes($servidor->certidaoCasamentoNumero)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Livro de casamento</td>
    <td class='text_padrao'>
        <input name='livro_casamento' type='text' class='<?=$erro['livro_casamento']?>' id='livro_casamento' value='<?=stripslashes($servidor->livroCasamento)?>'  size='30' maxlength='30' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>FL de casamento</td>
    <td class='text_padrao'>
        <input name='certidao_fl' type='text' class='<?=$erro['certidao_fl']?>' id='certidao_fl' value='<?=stripslashes($servidor->certidaoFl)?>'  size='30' maxlength='30' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Cartório de casamento</td>
    <td class='text_padrao'>
        <input name='cartorio_casamento' type='text' class='<?=$erro['cartorio_casamento']?>' id='cartorio_casamento' value='<?=stripslashes($servidor->cartorioCasamento)?>'  size='40' maxlength='40' />

    </td>
</tr>


<tr>

    <td height='36' align='right' class='text_bold_preto'>Qtd Dependentes</td>
    <td class='text_padrao' colspan="3">
        <select name="qtd_dependente">
            <option>Nenhum</option>
            <option value="1" <? if($servidor->qtdDependente=="1") echo "selected" ?>>1 Dependente</option>
            <option value="2" <? if($servidor->qtdDependente=="2") echo "selected" ?>>2 Dependentes</option>
            <option value="3" <? if($servidor->qtdDependente=="3") echo "selected" ?>>3 Dependentes</option>
        </select>
    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>E-mail</td>
    <td class='text_padrao' colspan="3">
        <input name='email' type='text' class='<?=$erro['email']?>' id='email' value='<?=stripslashes($servidor->email)?>'  size='40' maxlength='50' />

    </td>
</tr>
<tr>

    <td height='36' align='right' class='text_bold_preto'>Cidade</td>
    <td class='text_padrao'>
        <input name='cidade' type='text' class='<?=$erro['cidade']?>' id='cidade' value='<?=stripslashes($servidor->cidade)?>'  size='40' maxlength='50' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Uf</td>
    <td class='text_padrao'>
        <input name='uf' type='text' class='<?=$erro['uf']?>' id='uf' value='<?=stripslashes($servidor->uf)?>'  size='10' maxlength='10' />

    </td>

</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Cep</td>
    <td class='text_padrao' colspan="3">
        <input name='cep' type='text' class='cep <?=$erro['cep']?>' id='cep' value='<?=stripslashes($servidor->cep)?>'  size='40' maxlength='50' />

    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Endereço</td>
    <td class='text_padrao' colspan="3">
        <input name='endereco' type='text' class='<?=$erro['endereco']?>' id='endereco' value='<?=stripslashes($servidor->endereco)?>'  size='80' maxlength='80' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Número</td>
    <td class='text_padrao'>
        <input name='numero' type='text' class='<?=$erro['numero']?>' id='numero' value='<?=stripslashes($servidor->numero)?>'  size='20' maxlength='20' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Bairro</td>
    <td class='text_padrao'>
        <input name='bairro' type='text' class='<?=$erro['bairro']?>' id='bairro' value='<?=stripslashes($servidor->bairro)?>'  size='40' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Local</td>
    <td class='text_padrao' colspan="3">
        <input name='local' type='text' class='<?=$erro['local']?>' id='local' value='<?=stripslashes($servidor->local)?>'  size='40' maxlength='50' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Nível de escolaridade</td>
    <td class='text_padrao'>
        <select name="niv_escola">
            <option value=""></option>
            <option value="NA" <? if($servidor->nivEscola=="NA") echo "selected" ?>>Não Alfabetivado</option>
            <option value="A" <? if($servidor->nivEscola=="A") echo "selected" ?>>Alfabetivado</option>
            <option value="EFII" <? if($servidor->nivEscola=="EFII") echo "selected" ?>>Ens. Fundamental I Incompleto</option>
            <option value="EFIC" <? if($servidor->nivEscola=="EFIC") echo "selected" ?>>Ens. Fundamental I Completo</option>
            <option value="EFIII" <? if($servidor->nivEscola=="EFIII") echo "selected" ?>>Ens. Fundamental II Incompleto</option>
            <option value="EFIIC" <? if($servidor->nivEscola=="EFIIC") echo "selected" ?>>Ens. Fundamental II Completo</option>
            <option value="EMI" <? if($servidor->nivEscola=="EMI") echo "selected" ?>>Ens. Médio Incompleto</option>
            <option value="EMC" <? if($servidor->nivEscola=="EMC") echo "selected" ?>>Ens. Médio Completo</option>
            <option value="G" <? if($servidor->nivEscola=="G") echo "selected" ?>>Gradução</option>
            <option value="E" <? if($servidor->nivEscola=="E") echo "selected" ?>>Especialização</option>
            <option value="M" <? if($servidor->nivEscola=="M") echo "selected" ?>>Mestrado</option>
            <option value="D" <? if($servidor->nivEscola=="D") echo "selected" ?>>Doutorado</option>
            <option value="PD" <? if($servidor->nivEscola=="PD") echo "selected" ?>>Pós-Doutorado</option>

        </select>

    </td>

    <td height='36' align='right' class='text_bold_preto'>Qual?</td>
    <td class='text_padrao'>
        <input name='qual_escolaridade' type='text' class='<?=$erro['qual_escolaridade']?>' id='qual_escolaridade' value='<?=stripslashes($servidor->qualEscolaridade)?>'  size='40' maxlength='50' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Formação</td>
    <td class='text_padrao' colspan="3">
        <input name='formacao' type='text' class='<?=$erro['formacao']?>' id='formacao' value='<?=stripslashes($servidor->formacao)?>'  size='40' maxlength='50' />

    </td>

</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Telefone</td>
    <td class='text_padrao'>
        <input name='telefone' type='text' class='telefone <?=$erro['telefone']?>' id='telefone' value='<?=stripslashes($servidor->telefone)?>'  size='40' maxlength='50' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Celular</td>
    <td class='text_padrao'>
        <input name='celular' type='text' class='telefone <?=$erro['celular']?>' id='celular' value='<?=stripslashes($servidor->celular)?>'  size='40' maxlength='50' />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Senha</td>
    <td class='text_padrao' colspan="3">
        <input name='senha' type='password' class='k-textbox <?=$erro['senha']?>' id='senha' size='40' maxlength='50' />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Disposição Outro Orgão?</td>
    <td class='text_padrao' colspan="3">
        <select name="disposicao_outro_orgao">
            <option value="N" >Não</option>
            <option value="S" <? if($servidor->disposicaoOutroOrgao=="S") echo "selected" ?>>Sim</option>
        </select>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome Orgão</td>
    <td class='text_padrao' colspan="3">
        <input name='nome_outro_orgao' type='text' class='<?=$erro['nome_outro_orgao']?>' id='nome_outro_orgao' value='<?=stripslashes($servidor->nomeOutroOrgao)?>'  size='50' maxlength='50' />

    </td>
</tr>


<tr>
    <td height='36' align='right' class='text_bold_preto'>Periodo</td>
    <td class='text_padrao'>
        <input name='periodo' type='text' class='<?=$erro['telefone']?>' id='periodo' value='<?=stripslashes($servidor->periodo)?>'  size='40' maxlength='50' />

    </td>

    <td height='36' align='right' class='text_bold_preto'>Tipo</td>
    <td class='text_padrao'>
        <select name="tipo_recebimento_outro_orgao">
            <option></option>
            <option value="CO" <? if($servidor->tipoRecebimentoOutroOrgao=="CO") echo "selected" ?> >Com Ônus</option>
            <option value="SO" <? if($servidor->tipoRecebimentoOutroOrgao=="SO") echo "selected" ?>>Sem Ônus</option>
        </select>

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Função Principal</td>
    <td class='text_padrao' colspan="3">
        <input name='funcao_principal' type='text' class='<?=$erro['funcao_principal']?>' id='funcao_principal' value='<?=stripslashes($servidor->funcaoPrincipal)?>'  size='50' maxlength='50' />

    </td>
</tr>

<tr>
    <td colspan="4">
        <div style="padding: 10px 0 10px 90px;">
            <div class='topo_multi_select'>
                <p> &raquo; Escolas</p>
            </div>
            <div class="clear"></div>

            <button onclick="listEscolas()" type="button" class="bt" style="width: 200px;">Selecionar Escolas</button>
            <div class="clear"></div>

            <div id="escolas">

                <?
                foreach($escolas_selecionadas as $escola):
                    $escola_id = $escola["escola_id"];
                    $inep = $escola["inep"];
                    $nome_escola = $escola["nome_escola"];

                    include("form_escola.php");
                endforeach;
                ?>
            </div>
            <div id="dialog_escolas"></div>

        </div>

    </td>
</tr>
<tr>

    <td colspan="4">

        <fieldset style="width:780px;margin:0 auto;padding:10px">
            <legend class="bordaPesquisa"><b>Foto</b></legend>
            <table>
                <tr>
                    <td height="36" align="right" class="text_bold_preto"></td>
                    <td class="text_padrao">
                        <object height="400" width="700" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" style="width: 710px; height: 400px;">
                            <param value="<?=URL.'/modulos/servidor/'?>webcam/bin-debug/webcam.swf" name="src"/>
                            <embed height="400" width="700" src="<?=URL.'/modulos/aluno/'?>webcam/bin-debug/webcam.swf" type="application/x-shockwave-flash" style="width: 710px; height: 400px;"/>
                        </object>
                        <input type="hidden" value="" name="foto" id="foto" />

                    </td>
                </tr>
                <? if(!empty($servidor->foto)): ?>
                <tr>
                    <td height="36" align="right" class="text_bold_preto">Foto atual:</td>
                    <td>
                        <img src="<?=URL?>/fotos/servidores/<?=$servidor->foto?>" />
                        <input type="hidden" value="<?=$servidor->foto?>" name="foto_salva" />
                    </td>
                </tr>
                <? endif; ?>
            </table>
        </fieldset>

    </td>

</tr>


