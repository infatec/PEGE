<tr>
    <td height="5" align="right" class="text_bold_preto">&nbsp;</td>
    <td class="text_padrao">
        <input name="id" type="hidden" class="<?=$class_id?>" id="<?=$id?>" value="<?=$id?>"  size="3" maxlength="3" />
    </td>
</tr>

<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Escola</td>
                                    <td class='text_padrao'>
                                    <?
                                    $dados = array('primary_key' => 'id', 
                            						'nome' => 'nome', 
                            						'tabela' => 'escola', 
                            						'condicao' => ' order by nome asc', 
                            						'nome_input' => 'escola_id', 
                            						'id' => 'escola_id', 
                            						'class' => $erro["escola_id"], 
                            						'value' => $configuracao_escola->escolaId);	
                            						
                                    DAOFactory::getConfiguracaoEscolaDAO()->geraSelect($dados);
                                    ?>
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Prédio Pesquisado</td>
                                    <td class='text_padrao'>
                                        <input name='pred_pesq' type='text' class='<?=$erro['pred_pesq']?>' id='pred_pesq' value='<?=stripslashes($configuracao_escola->predPesq)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('pred_pesq', 'pred_pesqT', 50);" />
                                        <input name='pred_pesqT' type='text' disabled class='input_caracteres' id='pred_pesqT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Situação da codificação</td>
                                    <td class='text_padrao'>
                                        <input name='status_codificacao' type='text' class='<?=$erro['status_codificacao']?>' id='status_codificacao' value='<?=stripslashes($configuracao_escola->statusCodificacao)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('status_codificacao', 'status_codificacaoT', 50);" />
                                        <input name='status_codificacaoT' type='text' disabled class='input_caracteres' id='status_codificacaoT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código SEEC A</td>
                                    <td class='text_padrao'>
                                        <input name='cod_seec_a' type='text' class='<?=$erro['cod_seec_a']?>' id='cod_seec_a' value='<?=stripslashes($configuracao_escola->codSeecA)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('cod_seec_a', 'cod_seec_aT', 50);" />
                                        <input name='cod_seec_aT' type='text' disabled class='input_caracteres' id='cod_seec_aT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Código SEEC B</td>
                                    <td class='text_padrao'>
                                        <input name='cod_seec_b' type='text' class='<?=$erro['cod_seec_b']?>' id='cod_seec_b' value='<?=stripslashes($configuracao_escola->codSeecB)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('cod_seec_b', 'cod_seec_bT', 50);" />
                                        <input name='cod_seec_bT' type='text' disabled class='input_caracteres' id='cod_seec_bT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Dependência Administrativa</td>
                                    <td class='text_padrao'>
                                        <input name='dependencia_administrativa' type='text' class='<?=$erro['dependencia_administrativa']?>' id='dependencia_administrativa' value='<?=stripslashes($configuracao_escola->dependenciaAdministrativa)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('dependencia_administrativa', 'dependencia_administrativaT', 50);" />
                                        <input name='dependencia_administrativaT' type='text' disabled class='input_caracteres' id='dependencia_administrativaT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Natureza de ocupação</td>
                                    <td class='text_padrao'>
                                        <input name='natureza_ocupacao' type='text' class='<?=$erro['natureza_ocupacao']?>' id='natureza_ocupacao' value='<?=stripslashes($configuracao_escola->naturezaOcupacao)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('natureza_ocupacao', 'natureza_ocupacaoT', 50);" />
                                        <input name='natureza_ocupacaoT' type='text' disabled class='input_caracteres' id='natureza_ocupacaoT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Natureza de ocupação do prédio</td>
                                    <td class='text_padrao'>
                                        <input name='natureza_ocupacao_predrio' type='text' class='<?=$erro['natureza_ocupacao_predrio']?>' id='natureza_ocupacao_predrio' value='<?=stripslashes($configuracao_escola->naturezaOcupacaoPredrio)?>'  size='80' maxlength='80' onKeyUp="ContaCaracteresCampo('natureza_ocupacao_predrio', 'natureza_ocupacao_predrioT', 80);" />
                                        <input name='natureza_ocupacao_predrioT' type='text' disabled class='input_caracteres' id='natureza_ocupacao_predrioT' value='80' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Entidade proprietária do Módel</td>
                                    <td class='text_padrao'>
                                        <input name='entidade_proprietaria_movel' type='text' class='<?=$erro['entidade_proprietaria_movel']?>' id='entidade_proprietaria_movel' value='<?=stripslashes($configuracao_escola->entidadeProprietariaMovel)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('entidade_proprietaria_movel', 'entidade_proprietaria_movelT', 50);" />
                                        <input name='entidade_proprietaria_movelT' type='text' disabled class='input_caracteres' id='entidade_proprietaria_movelT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Total de salas</td>
                                    <td class='text_padrao'>
                                        <input name='total_salas_aula' type='text' class='<?=$erro['total_salas_aula']?>' id='total_salas_aula' value='<?=stripslashes($configuracao_escola->totalSalasAula)?>'  size='11' maxlength='11' onKeyUp="ContaCaracteresCampo('total_salas_aula', 'total_salas_aulaT', 11);" />
                                        <input name='total_salas_aulaT' type='text' disabled class='input_caracteres' id='total_salas_aulaT' value='11' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Total de salas Levantadas</td>
                                    <td class='text_padrao'>
                                        <input name='total_salas_levantada' type='text' class='<?=$erro['total_salas_levantada']?>' id='total_salas_levantada' value='<?=stripslashes($configuracao_escola->totalSalasLevantada)?>'  size='11' maxlength='11' onKeyUp="ContaCaracteresCampo('total_salas_levantada', 'total_salas_levantadaT', 11);" />
                                        <input name='total_salas_levantadaT' type='text' disabled class='input_caracteres' id='total_salas_levantadaT' value='11' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Unidade Executora</td>
                                    <td class='text_padrao'>
                                        <input name='unidade_executora' type='text' class='<?=$erro['unidade_executora']?>' id='unidade_executora' value='<?=stripslashes($configuracao_escola->unidadeExecutora)?>'  size='50' maxlength='50' onKeyUp="ContaCaracteresCampo('unidade_executora', 'unidade_executoraT', 50);" />
                                        <input name='unidade_executoraT' type='text' disabled class='input_caracteres' id='unidade_executoraT' value='50' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Outras atividades do prédio</td>
                                    <td class='text_padrao'>
                                        <input name='identificacao_outras_atividades_predio' type='text' class='<?=$erro['identificacao_outras_atividades_predio']?>' id='identificacao_outras_atividades_predio' value='<?=stripslashes($configuracao_escola->identificacaoOutrasAtividadesPredio)?>'  size='100' maxlength='100' onKeyUp="ContaCaracteresCampo('identificacao_outras_atividades_predio', 'identificacao_outras_atividades_predioT', 100);" />
                                        <input name='identificacao_outras_atividades_predioT' type='text' disabled class='input_caracteres' id='identificacao_outras_atividades_predioT' value='100' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Docência?</td>
                                    <td class='text_padrao'>
                                        <input name='docencia' type='text' class='<?=$erro['docencia']?>' id='docencia' value='<?=stripslashes($configuracao_escola->docencia)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('docencia', 'docenciaT', 1);" />
                                        <input name='docenciaT' type='text' disabled class='input_caracteres' id='docenciaT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Promoção de acesso à informação?</td>
                                    <td class='text_padrao'>
                                        <input name='promocao_acesso_informacao' type='text' class='<?=$erro['promocao_acesso_informacao']?>' id='promocao_acesso_informacao' value='<?=stripslashes($configuracao_escola->promocaoAcessoInformacao)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('promocao_acesso_informacao', 'promocao_acesso_informacaoT', 1);" />
                                        <input name='promocao_acesso_informacaoT' type='text' disabled class='input_caracteres' id='promocao_acesso_informacaoT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Apoio educacional?</td>
                                    <td class='text_padrao'>
                                        <input name='apoio_educacional' type='text' class='<?=$erro['apoio_educacional']?>' id='apoio_educacional' value='<?=stripslashes($configuracao_escola->apoioEducacional)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('apoio_educacional', 'apoio_educacionalT', 1);" />
                                        <input name='apoio_educacionalT' type='text' disabled class='input_caracteres' id='apoio_educacionalT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Alimentação?</td>
                                    <td class='text_padrao'>
                                        <input name='alimentacao' type='text' class='<?=$erro['alimentacao']?>' id='alimentacao' value='<?=stripslashes($configuracao_escola->alimentacao)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('alimentacao', 'alimentacaoT', 1);" />
                                        <input name='alimentacaoT' type='text' disabled class='input_caracteres' id='alimentacaoT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Saúde e higiene?</td>
                                    <td class='text_padrao'>
                                        <input name='saude_e_higiene' type='text' class='<?=$erro['saude_e_higiene']?>' id='saude_e_higiene' value='<?=stripslashes($configuracao_escola->saudeEHigiene)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('saude_e_higiene', 'saude_e_higieneT', 1);" />
                                        <input name='saude_e_higieneT' type='text' disabled class='input_caracteres' id='saude_e_higieneT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Promoção da convivência? </td>
                                    <td class='text_padrao'>
                                        <input name='promocao_convivencia' type='text' class='<?=$erro['promocao_convivencia']?>' id='promocao_convivencia' value='<?=stripslashes($configuracao_escola->promocaoConvivencia)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('promocao_convivencia', 'promocao_convivenciaT', 1);" />
                                        <input name='promocao_convivenciaT' type='text' disabled class='input_caracteres' id='promocao_convivenciaT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Suporte pedagógico à docência?</td>
                                    <td class='text_padrao'>
                                        <input name='suporte_pedagogico_docencia' type='text' class='<?=$erro['suporte_pedagogico_docencia']?>' id='suporte_pedagogico_docencia' value='<?=stripslashes($configuracao_escola->suportePedagogicoDocencia)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('suporte_pedagogico_docencia', 'suporte_pedagogico_docenciaT', 1);" />
                                        <input name='suporte_pedagogico_docenciaT' type='text' disabled class='input_caracteres' id='suporte_pedagogico_docenciaT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Administração? </td>
                                    <td class='text_padrao'>
                                        <input name='administracao' type='text' class='<?=$erro['administracao']?>' id='administracao' value='<?=stripslashes($configuracao_escola->administracao)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('administracao', 'administracaoT', 1);" />
                                        <input name='administracaoT' type='text' disabled class='input_caracteres' id='administracaoT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>
<tr>
                                    <td height='36' align='right' class='text_bold_preto'>Manutenção, conservação e segurança?</td>
                                    <td class='text_padrao'>
                                        <input name='manutencao_conservacao_seguranca' type='text' class='<?=$erro['manutencao_conservacao_seguranca']?>' id='manutencao_conservacao_seguranca' value='<?=stripslashes($configuracao_escola->manutencaoConservacaoSeguranca)?>'  size='1' maxlength='1' onKeyUp="ContaCaracteresCampo('manutencao_conservacao_seguranca', 'manutencao_conservacao_segurancaT', 1);" />
                                        <input name='manutencao_conservacao_segurancaT' type='text' disabled class='input_caracteres' id='manutencao_conservacao_segurancaT' value='1' size='1' style='width:20px' />
                                    </td>
                                </tr>


