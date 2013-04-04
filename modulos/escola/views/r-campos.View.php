<table width="830" border="0" cellspacing="2" cellpadding="0" style="margin:5px" >

<input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />

<tr>
    <td height='36' align='right' class='text_bold_preto'>Nome</td>
    <td class='text_padrao' colspan="3">
        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($escola->nome)?>'  size='100' maxlength='100' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 100);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Inep</td>
    <td class='text_padrao' colspan="3">
        <input name='inep' type='text' class='<?=$erro['inep']?>' id='inep' value='<?=stripslashes($escola->inep)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('inep', 'inepT', 50);" />

    </td>
</tr>

<tr>
    <td height='36' align='right' class='text_bold_preto'>Endereço</td>
    <td class='text_padrao' colspan="3">
        <input name='endereco' type='text' class='<?=$erro['endereco']?>' id='endereco' value='<?=stripslashes($escola->endereco)?>'  size='100' maxlength='100' onKeyUp="ContaCaracteresCampo('endereco', 'enderecoT', 100);" />

    </td>
</tr>
<tr>

    <td height='36' align='right' class='text_bold_preto'>Número</td>
    <td class='text_padrao'>
        <input name='numero' type='text' class='<?=$erro['numero']?>' id='numero' value='<?=stripslashes($escola->numero)?>'  size='10' maxlength='10' onKeyUp="ContaCaracteresCampo('numero', 'numeroT', 10);" />

    </td>

    <td height='36' align='right' class='text_bold_preto' >Bairro</td>
    <td class='text_padrao'>
        <input name='bairro' type='text' class='<?=$erro['bairro']?>' id='bairro' value='<?=stripslashes($escola->bairro)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('bairro', 'bairroT', 50);" />

    </td>

</tr>
    <tr>
        <td height='36' align='right' class='text_bold_preto'>Distrito</td>
        <td class='text_padrao' colspan="3">
            <input name='distrito' type='text' class='<?=$erro['distrito']?>' id='distrito' value='<?=stripslashes($escola->distrito)?>'  size='40' maxlength='100' onKeyUp="ContaCaracteresCampo('endereco', 'enderecoT', 100);" />

        </td>
    </tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>Cidade</td>
    <td class='text_padrao'>
        <input name='cidade' type='text' class='<?=$erro['cidade']?>' id='cidade' value='<?=stripslashes($escola->cidade)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('cidade', 'cidadeT', 50);" />

    </td>

    <td height='36' align='right' class='text_bold_preto'>UF</td>
    <td class='text_padrao'>
        <input name='uf' type='text' class='<?=$erro['uf']?>' id='uf' value='<?=stripslashes($escola->uf)?>'  size='5' maxlength='5' onKeyUp="ContaCaracteresCampo('uf', 'ufT', 5);" />

    </td>
</tr>
<tr>
    <td height='36' align='right' class='text_bold_preto'>CEP</td>
    <td class='text_padrao'>
        <input name='cep' type='text' class='<?=$erro['cep']?>' id='cep' value='<?=stripslashes($escola->cep)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('cep', 'cepT', 50);" />

    </td>
    <td height='36' align='right' class='text_bold_preto'>CNPJ</td>
    <td class='text_padrao'>
        <input name='cnpj' type='text' class='<?=$erro['cnpj']?>' id='cnpj' value='<?=stripslashes($escola->cnpj)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('cnpj', 'cnpjT', 50);" />

    </td>
</tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Código Escola</td>
        <td class='text_padrao'>
            <input name='cod_escola' type='text' class='<?=$erro['cod_escola']?>' id='cod_escola' value='<?=stripslashes($escola->codEscola)?>'  size='30' maxlength='50' onKeyUp="ContaCaracteresCampo('cod_escola', 'cod_escolaT', 50);" />

        </td>

        <td height='36' align='right' class='text_bold_preto'>Zona</td>
        <td class='text_padrao'>

            <select id="zona" name="zona">
                <option value="Indefinido" <? if($escola->zona=="Indefinido") echo "selected" ?>>Indefinido</option>
                <option value="Urbana" <? if($escola->zona=="Urbana") echo "selected" ?>>Urbana</option>
                <option value="Rural" <? if($escola->zona=="Rural") echo "selected" ?>>Rural</option>
            </select>

        </td>

    </tr>

    <tr>

        <td height='36' align='right' class='text_bold_preto'>Telefone</td>
        <td class='text_padrao' colspan="3">
            <input name='telefone' type='text' class='<?=$erro['telefone']?>' id='telefone' value='<?=stripslashes($escola->telefone)?>'  size='25' maxlength='25' onKeyUp="ContaCaracteresCampo('telefone', 'telefoneT', 25);" />

        </td>
    </tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>E-mail</td>
        <td class='text_padrao'>
            <input name='email' type='text' class='<?=$erro['email']?>' id='email' value='<?=stripslashes($escola->email)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('email', 'emailT', 50);" />

        </td>

        <td height='36' align='right' class='text_bold_preto'>Latitude</td>
        <td class='text_padrao'>
            <input name='latitude' type='text' class='<?=$erro['latitude']?>' id='latitude' value='<?=stripslashes($escola->latitude)?>'  size='10' maxlength='100' onKeyUp="ContaCaracteresCampo('latitude', 'latitudeT', 100);" />

        </td>
    </tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Longitude</td>
        <td class='text_padrao'>
            <input name='longitude' type='text' class='<?=$erro['longitude']?>' id='longitude' value='<?=stripslashes($escola->longitude)?>'  size='10' maxlength='100' onKeyUp="ContaCaracteresCampo('longitude', 'longitudeT', 100);" />

        </td>

        <td height='36' align='right' class='text_bold_preto'>Código Estado</td>
        <td class='text_padrao'>
            <input name='cod_estado' type='text' class='<?=$erro['cod_estado']?>' id='cod_estado' value='<?=stripslashes($escola->codEstado)?>'  size='11' maxlength='11' onKeyUp="ContaCaracteresCampo('cod_estado', 'cod_estadoT', 11);" />

        </td>
    </tr>

    <tr>
        <td height='36' align='right' class='text_bold_preto'>Código Cidade</td>
        <td class='text_padrao'>
            <input name='cod_cidade' type='text' class='<?=$erro['cod_cidade']?>' id='cod_cidade' value='<?=stripslashes($escola->codCidade)?>'  size='11' maxlength='11' onKeyUp="ContaCaracteresCampo('cod_cidade', 'cod_cidadeT', 11);" />

        </td>

        <td height='36' align='right' class='text_bold_preto'>DDD</td>
        <td class='text_padrao'>
            <input name='ddd' type='text' class='<?=$erro['ddd']?>' id='ddd' value='<?=stripslashes($escola->ddd)?>'  size='5' maxlength='5' onKeyUp="ContaCaracteresCampo('ddd', 'dddT', 5);" />

        </td>
    </tr>
    <tr>
        <td height='36' align='right' class='text_bold_preto'>Nome Diretor</td>
        <td class='text_padrao' colspan="3">
            <input name='nome_diretor' type='text' class='<?=$erro['nome_diretor']?>' id='nome' value='<?=stripslashes($escola->nomeDiretor)?>'  size='100' maxlength='100' />

        </td>
    </tr>

</table>


