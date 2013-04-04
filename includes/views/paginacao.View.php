<table width="830" border="0" align="center" cellpadding="0" cellspacing="0" id="paginacao">
  <form name="form1" method="get" action="<?=$_SERVER['PHP_SELF']?>">
    <tr> 
      <td width="276" align="center">Total: <strong><?=$tr?></strong> - Mostrando <strong><?=$linhas_pagina?></strong> por p&aacute;gina </td>
	  <td width="399" align="center"> 
        
        <table border="0" cellpadding="4" align="center">
          <tr>
             <?foreach($link as $pagina):?>   
                <td> 
                   <?=$pagina?>  
                </td>
             <?endforeach;?>  
          </tr>
        </table>
      </td>
      
      <td width="155" align="left"> 
        <?=$paginacao->n_?> /<?=$paginacao->total_paginas?> <input name="n" type="text" size="2" maxlength="4"> 
        <input name="p" type="hidden" size="2" value="<? echo $p?>"> 
        <input name="s" type="submit" value="Mostrar" style="width: 80px;"></td>
    </tr>
  </form>
</table>
