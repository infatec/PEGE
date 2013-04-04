<html>
<head>
<title><?= $config["tituloPagina"]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
<script src="<?=URL.'/webroot/js/'?>ajax.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.js"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.tablesorter.js"></script>
<script src="<?=URL.'/webroot/js/'?>main.js"></script>

<script>

function permissaoTabela(grupo_id,chave,permissao)
{
    $.ajax(
			{
				type: "GET",
				url: "ajax/permissao_tabelas.php",
				data: "chave="+chave+"&permissao="+permissao+"&grupo_id="+grupo_id,
                beforeSend: function(){ 
					tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
				},
        		complete:function()
        		{
        			tb_remove();
        		}, 
				success: 
				function(data)
				{
					$('#'+chave+'_tbl').html("");
                    $('#'+chave+'_tbl').html(data);
				}
			}
		);
}

function permissaoMenu(grupo_id,chave,permissao)
{
    $.ajax(
			{
				type: "GET",
				url: "ajax/permissao_menu.php",
				data: "chave="+chave+"&permissao="+permissao+"&grupo_id="+grupo_id,
                beforeSend: function(){ 
					tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
				},
        		complete:function()
        		{
        			tb_remove();
        		}, 
				success: 
				function(data)
				{
					$('#'+chave).html("");
                    $('#'+chave).html(data);
				}
			}
		);
}

function retornaMenus(chave)
{
	$.ajax(
			{
				type: "GET",
				url: "ajax/retorno_menus.php",
				data: "chave="+chave,
                beforeSend: function(){ 
					tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
				},
        		complete:function()
        		{
        			tb_remove();
        		}, 
				success: 
				function(data)
				{
					$('#permissoes').html("");
                    $('#permissoes').html(data);
				}
			}
		);
}
function retornaTabelas(grupo_id,chave)
{
	$.ajax(
			{
				type: "GET",
				url: "ajax/retorna_tabelas.php",
				data: "chave="+chave+"&id="+grupo_id,
                beforeSend: function(){ 
					tb_show('','../../includes/carregando.php?height=42&width=185&modal=true',"webroot/img/loading.gif");
				},
        		complete:function()
        		{
        			tb_remove();
        		}, 
				success: 
				function(data)
				{
					$('#permissoes').html("");
                    $('#permissoes').html(data);
				}
			}
		);
}

</script>

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
				            <table width="830" border="0" cellspacing="0" cellpadding="0" class="barra">
                            <tr>
                                <td> <h1>Grupo Selecionado: <b style="color: blue;"><?=$grupo_usuario->nome?> </b></h1> </td>
                            </tr>
                            <tr>
                            <td>
                                <table style="margin: 0 auto;" width="auto" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
                                <thead>
                                    <tr>
                                        
                                        <th>Menus</th>
                                        <? foreach($menus as $menu): ?>
                                            <th><?=$menu->nome?></th>
                                        <? endforeach;?>
                                    </tr>
                                </thead>  
                                    <tr>
                                        
                                        <td><a href="javascript:;" onclick="retornaMenus('<?=DAOFactory::getChavesDAO()->geraChave($id)?>')">Configurar</a></td>
                                        <? foreach($menus as $menu): ?>
                                            <td><a href="javascript:;" onclick="retornaTabelas(<?=$id?>,'<?=DAOFactory::getChavesDAO()->geraChave($menu->id) ?>')">Configurar</a></td>
                                        <? endforeach; ?>
                                    </tr>  
                                </table>                                
                            </td>
                            </tr>
                            <tr>
                            <td id="permissoes">
                                
                            
                            </td>
                            </tr>
                            </table>
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