<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>ajax.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script>
function sair()
{
	
	parent.sair_tick();
	
}

function chama_inserir(id,descricao)
{
	var dados=new Array();	
	dados["campo_id"]= "<?=$campo_id?>";
	dados["campo_nome"]= "<?=$campo_nome?>";
	dados["valor_id"] = id;
	dados["valor_nome"] = descricao;
	parent.inserir(dados);	
}

$(document).ready(function()
{
    $('input[type="text"]').addClass('k-textbox');
    $('select').addClass('k-textbox');
    $('input[type="button"]').addClass('bt');
    $('input[type="submit"]').addClass('bt');
    $('button').addClass('bt');

});

</script>


</head>
<body>
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
       <tr>
            <td valign="top">
            	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                        <td width="20" valign="top"></td>
                        <td valign="top">
                            <table width="100%" border="0" cellspacing="6" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top">
										<table width="550" border="0" cellspacing="0" cellpadding="0" class="filtro">
                                        <tr>
                                               <td width="37">
                                                      <img src="<?=URL.'/webroot/img_sistema/'?>seta_redonda.png" id="esquerda"/>        </td>
                                                    <td width="719">
                                                       
                                                      <h1 style="font-size:20px;margin-top:10px"><?=$modulo?></h1>
                                                        
                                                    </td>
                                                    
                                                     <td width="74" align="left">
                                                     <input type="button" class="botao_branco" onClick="sair()" value="Sair">
                                                    </td>
                                               </tr>                                        
                                        </table>
                                    </td>
                                </tr>
                                <tr> 
                                    <td align="center" valign="top">
										<form action=""  name="form" method="get">				
										 <table width="550" border="0" cellspacing="0" cellpadding="0" class="filtro">
											<tr>
												<td width="6">
													<!-- personalize com os campos que deseja-->
										<td width="93" class="text_bold_preto">Campo<br />
                                        			<input type="hidden" name="tabela" value="<?=$tabela?>">
                                                    <input type="hidden" name="modulo" value="<?=$modulo?>">
                                                    <input type="hidden" name="campo" value="<?=$campo?>">
                                                    <input type="hidden" name="criterio" value="<?=$criterio?>">
														  <select name="campo_sel" id="campo">															 
																   <option value="<?=$campo?>"><?=ucwords($campo)?></option>															 
														  </select>
											  </td>
												  <td width="127" class="text_bold_preto">Operador<br />
														  <select name="operador" id="campo">
															
															<option value="qcon" <? if($operador=="qcon") echo"selected";?>>Que Contenha</option> 
															<option value="qcom" <? if($operador=="qcom") echo"selected";?>>Que Comece</option> 
															
														  </select>
											  </td>
														  
											  <td width="204" class="text_bold_preto">Descri&ccedil;&atilde;o<br />
																		<input name="nome" type="text" class="input_branco" id="nome" value="<?=$nome?>" size="30" maxlength="30">            
													 </td>
													  
											<td width="336">
											<br />
											<input type="submit" name="Procurar" style="width: 100px;" id="Procurar" value="Procurar" class="botao_branco">
													</td>
											  <td width="64"></td>
											</tr>
										</table>
										</form>
                                        <? if(count($rs)>0):?>
                                   			
                                           <table width="550" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter">
                        				<thead>
                        					<tr>
                        						<th width="57">Ações</th> 
                        	                    <th>Descri&ccedil;&atilde;o</th> 
                        	                   
                        					</tr>
                        				</thead>
                    				    <? foreach($rs as $dados): ?>
                    							<tr>
                    								<td align="center">
                    								    <a href="javascript:;" onclick='chama_inserir("<?=$dados["id"]?>","<?=$dados[$campo]?>")'><img src="../webroot/img_sistema/fileimport.png" border="0" alt="Visualizar" title="Visualizar" /></a>&nbsp;&nbsp;
                    							     </td>
                    					            <td class="text_padrao"><?=$dados[$campo]?></td>
                    							 </tr>
                    					<? endforeach;?>
                    				</table> 
                                    <? else:?>
									<table width="550" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;margin-bottom:20px;">
                                        <tr>
                                            <td>
                                            	<div class="message tip">
                                                    <p>N&atilde;o existem resultados.</p>
                                                </div>
                                             </td>
                                        </tr>
                                    </table>
                                    <? endif; ?>  
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
