<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Tabela</td>
                                    <td class='text_padrao'>
                                    <?
                                    $dados = array('primary_key' => 'id', 
                            						'nome' => 'nome', 
                            						'tabela' => 'tabelas', 
                            						'condicao' => ' order by nome asc', 
                            						'nome_input' => 'tabela_id', 
                            						'id' => 'tabela_id', 
                            						'class' => $erro["tabela_id"], 
                            						'value' => $tabelas->tabelaId);	
                            						
                                    DAOFactory::getTabelasDAO()->geraSelect($dados);
                                    ?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Menu</td>
                                    <td class='text_padrao'>
                                    <?
                                    $dados = array('primary_key' => 'id', 
                            						'nome' => 'nome', 
                            						'tabela' => 'menus', 
                            						'condicao' => ' order by nome asc', 
                            						'nome_input' => 'menu_id', 
                            						'id' => 'menu_id', 
                            						'class' => $erro["menu_id"], 
                            						'value' => $tabelas->menuId);	
                            						
                                    DAOFactory::getTabelasDAO()->geraSelect($dados);
                                    ?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome</td>
                                    <td class='text_padrao'>
                                        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($tabelas->nome)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 50);" />
                                        <input name='nomeT' type='text' disabled class='input_caracteres' id='nomeT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Pasta</td>
                                    <td class='text_padrao'>
                                        <input name='pasta' type='text' class='<?=$erro['pasta']?>' id='pasta' value='<?=stripslashes($tabelas->pasta)?>'  size='100' maxlength='100' onKeyUp="ContaCaracteresCampo('pasta', 'pastaT', 100);" />
                                        <input name='pastaT' type='text' disabled class='input_caracteres' id='pastaT' value='100' size='1' style='width:20px' />
                                    </td>
                                </tr>


