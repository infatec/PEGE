<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Grupo Usuário</td>
                                    <td class='text_padrao'>
                                    <?
                                    $dados = array('primary_key' => 'id', 
                            						'nome' => 'nome', 
                            						'tabela' => 'grupo_usuarios', 
                            						'condicao' => ' order by nome asc', 
                            						'nome_input' => 'grupo_usuarios_id', 
                            						'id' => 'grupo_usuarios_id', 
                            						'class' => $erro["grupo_usuarios_id"], 
                            						'value' => $usuarios->gruposId);	
                            						
                                    DAOFactory::getUsuariosDAO()->geraSelect($dados);
                                    ?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Login</td>
                                    <td class='text_padrao'>
                                        <input name='login' type='text' class='<?=$erro['login']?>' id='login' value='<?=stripslashes($usuarios->login)?>'  size='20' maxlength='80' onKeyUp="ContaCaracteresCampo('login', 'loginT', 80);" />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Senha</td>
                                    <td class='text_padrao'>
                                        <input name='senha' type='password' class='<?=$erro['senha']?>' id='senha' value='<?=stripslashes($usuarios->senha)?>'  size='15' maxlength='50' onKeyUp="ContaCaracteresCampo('senha', 'senhaT', 50);" />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Nome</td>
                                    <td class='text_padrao'>
                                        <input name='nome' type='text' class='<?=$erro['nome']?>' id='nome' value='<?=stripslashes($usuarios->nome)?>'  size='80' maxlength='200' onKeyUp="ContaCaracteresCampo('nome', 'nomeT', 200);" />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>E-mail</td>
                                    <td class='text_padrao'>
                                        <input name='email' type='text' class='<?=$erro['email']?>' id='email' value='<?=stripslashes($usuarios->email)?>'  size='50' maxlength='200' onKeyUp="ContaCaracteresCampo('email', 'emailT', 200);" />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Telefone</td>
                                    <td class='text_padrao'>
                                        <input name='fone' type='text' class='<?=$erro['fone']?>' id='fone' value='<?=stripslashes($usuarios->fone)?>'  size='10' maxlength='50' onKeyUp="ContaCaracteresCampo('fone', 'foneT', 50);" />

                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Celular</td>
                                    <td class='text_padrao'>
                                        <input name='celular' type='text' class='<?=$erro['celular']?>' id='celular' value='<?=stripslashes($usuarios->celular)?>'  size='10' maxlength='50' onKeyUp="ContaCaracteresCampo('celular', 'celularT', 50);" />

                                    </td>
                                </tr>


