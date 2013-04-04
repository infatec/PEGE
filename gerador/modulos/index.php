<?

    session_start();
    include("../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    require_once(DOMAIN_PATH.'models/class/dao/TabelasDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/dto/Tabela.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/TabelasDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/ext/TabelasExtDAO.class.php'); 

?>

<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?='../../webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?='../../webroot/js/'?>funcoes.js"></script>
<script src="<?='../../webroot/js/'?>jquery.js"></script>
<script src="<?='../../webroot/js/'?>jquery.tablesorter.js"></script>
<script src="<?='../../webroot/js/'?>main.js"></script>

<link rel="stylesheet" href="<?='../../webroot/css/'?>validationEngine.jquery.css" type="text/css" media="screen"/>
<script src="<?='../../webroot/js/'?>jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?='../../webroot/js/'?>jquery.validationEngine.js" type="text/javascript"></script>

<link href="<?='../../webroot/css/'?>thickbox.css" rel="stylesheet" type="text/css">
<script src="<?='../../webroot/js/'?>thickbox-compressed.js"></script>

<script>

$(document).ready(function() {

	$("#formID").validationEngine()

})

function carregaCampos(nome_tabela)
{
	$.ajax({
		method: "get",url: "carregaCampos.php?nome_tabela="+nome_tabela+"&tipo=form",
		dataType: "html",
		success:function(html){
		//alert(html);
			$("#campos_form").html(html);
		}				
	});
    $.ajax({
		method: "get",url: "carregaCampos.php?nome_tabela="+nome_tabela+"&tipo=princ",
		dataType: "html",
		success:function(html){
		//alert(html);
			$("#campos_pri").html(html);
		}				
	});
    $.ajax({
		method: "get",url: "carregaCampos.php?nome_tabela="+nome_tabela+"&tipo=vis",
		dataType: "html",
		success:function(html){
		//alert(html);
			$("#campos_vis").html(html);
		}				
	});
    $.ajax({
		method: "get",url: "carregaCampos.php?nome_tabela="+nome_tabela+"&tipo=filt",
		dataType: "html",
		success:function(html){
		//alert(html);
			$("#campos_filt").html(html);
		}				
	});
}



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
                                    <td height="25">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                    
										<table width="700" border="0" cellspacing="0" cellpadding="0" class="barra">
                                            <tr>
                                                <td width="37"></td>
                                                <td width="719">
                                                	<h1><a href="javascript:void()">GERADOR DE MODULO</a></h1>
                                                   
                                                </td>        
                                                <td width="74" align="left"></td>
                                             
                                           </tr>
                                    	</table>
                                    
                                    </td>
                                </tr>
                                <tr> 
                                    <td align="center" valign="top">
                                    <form id="formID" action="generate.php"  name="form" method="post" enctype="multipart/form-data"> 
                                   <table width="700" border="0" cellpadding="0" cellspacing="0" class="barra">
                                   <tr>
                                        	<td>
                                             <fieldset>
                                          	  <legend>Tabela Opção</legend>
                                               <table>
                                               <tr>
                                                <td colspan="2">
                                                    <b>Caso já exista a opção gerada.</b>
                                                    <?
                                                    $dados = array('primary_key' => 'id', 
                                            						'nome' => 'nome', 
                                            						'tabela' => 'tabelas', 
                                            						'condicao' => 'order by nome', 
                                            						'nome_input' => 'tabela_id_existe', 
                                            						'id' => 'tabela_id', 
                                            						'class' => 'tabela_id'
                                                                    );	
                                            						
                                                   DAOFactory::getTabelasDAO()->geraSelect($dados);
                                                    
                                                    ?>
                                                </td>
                                               </tr>
                                                <tr>
                                            		<td><b>Tabela</b></td><td><b>Nome da Opção</b></td>
                                                </tr>
                                                <tr>
                                                 <td><?
                                                    $sql = 'SHOW TABLES';
	                                                $ret = QueryExecutor::execute(new SqlQuery($sql));
                                                   
                                                   $texto = '
                                            		<select name="nome_tabela" id="nome_tabela" onChange="carregaCampos(this.value)">
                                            		<option value="">Escolha uma opção</option>
                                            		';
                                            
                                            		foreach ($ret as $reg)
                                            		{
                                            		
                                            			$texto .= '<option value="'.$reg[0].'" '; 
                                            			
                                            			if($dados["value"] == $reg[0])
                                            					$texto.= 'selected';
                                            
                                            			$texto.='>'.$reg[0].'</option>'."\r\n";
                                            	
                                            		}
                                            	
                                            		$texto.='</select>';
                                            		
                                            		echo $texto;
                                                    
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <input type="text" name="nome_opcao" size="40"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                            		<td><b>Posição Menu</b></td><td><b>Submenu</b></td>
                                                </tr>
                                                <tr>
                                                 <td><?
                                                    $dados = array('primary_key' => 'id', 
                                            						'nome' => 'nome', 
                                            						'tabela' => 'menus', 
                                            						'condicao' => 'order by nome', 
                                            						'nome_input' => 'menu_id', 
                                            						'id' => 'menu_id', 
                                            						'class' => 'menu_id'
                                                                    );	
                                            						
                                                   DAOFactory::getTabelasDAO()->geraSelect($dados);
                                                    
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?
                                                    $dados = array('primary_key' => 'id', 
                                            						'nome' => 'nome', 
                                            						'tabela' => 'tabelas', 
                                            						'condicao' => 'order by nome', 
                                            						'nome_input' => 'tabela_id', 
                                            						'id' => 'tabela_id', 
                                            						'class' => 'tabela_id'
                                                                    );	
                                            						
                                                   DAOFactory::getTabelasDAO()->geraSelect($dados);
                                                    
                                                    ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><input type="checkbox" value="1" name="modulo_limpo"/> Módulo Limpo</td>
                                                </tr>
                                                </table>
                                               </fieldset> 
                                            </td>
                                        
                                        </tr>
                                   <tr>
                                   <td>
                                   <fieldset>
                                   	<legend>Campos</legend>
                                   		
                                       <table>
                                        
                                        <tr>
                                            <td height="46"  align="left">
                                            <b>Campos formulario</b><hr />
                                            <div id="campos_form">
                                            
                                            </div>
                                            </td>
                                          
                                        </tr>
                                        <tr>
                                            <td height="46"  align="left">
                                            <b>Campos principal</b><hr />
                                            <div id="campos_pri">
                                            
                                            </div>
                                            </td>
                                          
                                        </tr>
                                        <tr>
                                            <td height="46"  align="left">
                                            <b>Campos Visualizar</b><hr />
                                            <div id="campos_vis">
                                            
                                            </div>
                                            </td>
                                          
                                        </tr>
                                        <tr>
                                            <td height="46"  align="left">
                                           <b>Campos Filtro</b><hr />
                                            <div id="campos_filt">
                                            
                                            </div>
                                            </td>
                                          
                                        </tr>
                                        </table> 
                                        
                                     </fieldset> 
                                     </td>
                                     </tr>
                                     <tr>
                                        <td><input type="submit" value="Gerar"/></td>
                                     </tr>
                                    </table>
                                   </form>   
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

