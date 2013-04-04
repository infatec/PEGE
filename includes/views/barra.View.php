<table width="830" border="0" cellspacing="0" cellpadding="0" class="barra">
        <tr>
            <td width="37"><img src="<?=URL.'/webroot/img_sistema/'?>seta_redonda.png" id="esquerda"/></td>
            <td width="719"><h1><a href="<? if($tirar_incluir!=1) echo "index.php"; else echo "javascript:;"; ?>"><?=$modulo?></a></h1></td>        
            <td width="74" align="left">
           
            <? if($_SESSION["permissao_temp"]>1):
    	         if($tirar_incluir != 1):?>
                <a href="cadastrar.php" title="Cadastrar Novo"><img src="<?=URL.'/webroot/img_sistema/'?>incluir.png" /></a> 
    		<? 	 endif;
               endif; ?>
            </td>
        </tr>
   
    </table>