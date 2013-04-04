<?php

class Paginacao
{
	public $linhas_paginas; //QUANTIDADE DE LINHAS POR PAGINA
	public $n_;//PAGINA SELECIONADA
	public $tr;//TOTAL DE REGISTROS
	public $i;//NUMERO QUE VAI INICIAR NO $DB->SelectLimit($sql,$linhas_pagina,$i);
	public $total_paginas;
	
	function __construct($linhas_paginas,$n_,$tr)
	{
		$this->linhas_paginas=$linhas_paginas;
		$this->n_=$n_;
		$this->tr=$tr;
		$this->iniciaPaginacao();
	}
	//AQUI VAI CALCULAR A PAGINAÇÃO
	function iniciaPaginacao()
	{
		$this->total_paginas = ceil($this->tr / $this->linhas_paginas);
		if ((!empty($this->n_)) and ($this->n_>0) and ($this->n_<=$this->total_paginas))
		{
		
		}
		else 
		{
			$this->i=0;
			$this->n_=1;
		}
		$this->i = ($this->n_*$this->linhas_paginas)-$this->linhas_paginas;	
	}
	// MÁXIMO DE LINKS POR PÁGINA
	function getPaginacaoURL($parametros="")
	{
		$lnk_impressos=0;
		$temp = $this->n_; //
		$maxlnk = 5;  
		if ($temp >= $maxlnk)
		{
			if ($this->total_paginas > $maxlnk) 
			{
				$n_maxlnk = $temp + 2;
				$maxlnk = $n_maxlnk;
				$n_start = $temp - 3;
				$lnk_impressos = $n_start;
			}
		}
        $url=array();
		while(($lnk_impressos < $this->total_paginas) and ($lnk_impressos < $maxlnk))
		{
			$lnk_impressos ++;
			/*$url.=" ";
			
				if ($pg_atual != $lnk_impressos)
				{
					$url.='<a href="'.$PHP_SELF.'?n='.$lnk_impressos.$parametros.'">';
				}
				if ($temp == $lnk_impressos)
				{
					$url.='<b>['.$lnk_impressos.']</b>';
				} 
				else 
				{
					$url.= $lnk_impressos;
				}
				$url.='</a>';
			
			$url .=" ";*/
            if ($pg_atual != $lnk_impressos and $temp == $lnk_impressos)
			{
				$url[]='<a href="'.$PHP_SELF.'?n='.$lnk_impressos.$parametros.'"><b>['.$lnk_impressos.']</b></a>';
			}
			if ($pg_atual != $lnk_impressos and $temp != $lnk_impressos)
			{
				$url[]='<a href="'.$PHP_SELF.'?n='.$lnk_impressos.$parametros.'">'.$lnk_impressos.'</a>';
			} 
		}
		return $url;
	
	}

}

?>