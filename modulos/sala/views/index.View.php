<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>ajax.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.tablesorter.js"></script>



</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td height="80" valign="top" bgcolor="#FFFFFF"><? include (DOMAIN_PATH.'includes/topo.php') ?></td></tr>
<tr>
<td valign="top">
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
            <td width="20" valign="top"></td>
            <td valign="top">
                <table width="100%" border="0" cellspacing="6" cellpadding="0">
                    <tr>
                        <td height="25">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                           <? include(DOMAIN_PATH."includes/barra.php")?>
                        </td>
                    </tr>
                    <tr> 
                        <td align="center" valign="top">
				           
                        <form action="<?=$GLOBALS["paginaAtual"]?>"  name="form" method="get">				
                         <table width="830" border="0" cellspacing="0" cellpadding="0" class="filtro">
                            <tr>
                                <!-- personalize com os campos que deseja-->
                                <td width="100">Campo<br />
                                      <select name="campo" id="campo">
                                        
				<option value='nome' <? if(trim($campo)==trim($campo_sel)) echo'selected';?>>Nome</option>

                                      </select>
                                </td>
                                <td width="100">Operador<br />
                                  <select name="operador" id="campo">					
                                    <option value="qcon" <? if($operador=="qcon") echo"selected";?>>Que Contenha</option> 
                                    <option value="qcom" <? if($operador=="qcom") echo"selected";?>>Que Comece</option>                     
                                  </select>
                                </td>                  
                                <td width="120">Descrição<br /><input name="nome" type="text" id="nome" value="<?=$nome?>" size="30" maxlength="30"></td>              
                                <td valign="bottom"><input type="submit" name="Procurar" id="Procurar" value="Procurar"></td>
                            </tr>
                        </table>
                        </form>
                           
                            
                		<? if ($tr>0): ?>
                        <table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-right:10px;">
                            <tr>
                                <td><? include(DOMAIN_PATH."includes/paginacao.php")?></td>
                            </tr>
                        </table>
                        <? endif; ?>
						<?if(!empty($msg_index)):?>
                        <table width="830" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                	<div class="message success">
                                        <p><?=$msg_index?></p>
                                    </div>  
                                </td>
                            </tr>
                        </table>
                       <?endif;?>
				       <?if($tr>0):?>
                        <form action="remover.php"  name="form" method="post" style="margin-top:40px;margin-bottom:40px;margin-right:10px" >				
                            <table width="830" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
            				<thead>
            					<tr>
            						<th width="57">Ações</th> 
            	                    
		<th>Escola</th>
		<th>Nome</th>

            	                    <th width="20">Del</th>
            
            					</tr>
            				</thead>
            				<?
                            $posicao=1;
    						foreach($salas as $obj):
    						    $id = $obj->id;
                                if(empty($id)) continue;                
    							// campos permitidos ou nao para atualizar                
    							
                                $opcoes = "";
                                if (!empty($_SESSION["permissao_temp"])) $opcoes.= '<a href="visualizar.php?id='.$id.'"><img src="../../webroot/img_sistema/icon_visualizar.gif" border="0" alt="Visualizar" title="Visualizar" /></a>&nbsp;&nbsp;';
    
							    if ($_SESSION["permissao_temp"]>1) $opcoes.= '<a href="atualizar.php?id='.$id.'"><img src="../../webroot/img_sistema/icon_editar.png" border="0" alt="Editar" title="Editar" width="23" /></a>&nbsp;&nbsp;';
                                
                                
						$escola = DAOFactory::getSalaDAO()->toString('escola','nome',$obj->escolaId);
                            ?>    
    							<tr bgcolor="">
    
    								<td align="center">
                                        <?=$opcoes?>
                                    </td>
                                    
						<td class='text_padrao'><?=$escola?></td>
												<td class='text_padrao'><?=$obj->nome?></td>

    							    <td align="center"><?=botaoCheckbox($id)?>&nbsp;</td>
    
    							 </tr>
                            <?
    							$posicao++;                
    						endforeach;                
            				?>
            				</table>
            
                            <table width="830" border="0" cellspacing="0" cellpadding="2">
            
                                <tr>
                                    <td align="center" class="text_padrao">&nbsp;</td>
            
                                    <td width="70"><? botaoRemover()?></td>
                                </tr>
                            </table>	
                        </form>
                        <table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-right:10px;">
                            <tr>
                                <td><? include(DOMAIN_PATH."includes/paginacao.php")?></td>
                            </tr>
                        </table>                                    
                        <?else:?>
						<table width="830" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
                            <tr>
                                <td>
                                	<div class="message tip">
                                        <p>Não existem resultados.</p>
                                    </div>
                                 </td>
                            </tr>
                        </table>    
                        <?endif;?>  
                        
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
	</table>
</td>
</tr>
</table>
</body>
</html>