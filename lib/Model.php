<?php
   class Model
   {
        public function toString($tabela,$campo,$chave)
        {
            $sql = 'SELECT '.$campo.' FROM '.$tabela.' WHERE id=?';
    		$sqlQuery = new SqlQuery($sql);
    		$sqlQuery->setNumber($chave);
    		$rs=$this->execute($sqlQuery);
            return $rs[0][$campo];
        }
    	/**
    	 * Get array limit
         * @param Array $obj Int Begin Int qtd 
    	 * @return Objs com limit 
    	 */
        public function limit($objs,$begin,$qtd) 
        {
           $ret = array();
           for($i=$begin;$i<=$qtd+$begin;$i++)
           {
               $ret[]=$objs[$i];  
           }
           return $ret; 
        }
        /**
    	 * Verifica a permissão do usuario nesse modulo
    	 *
    	 * @param Int $tabela_id
         * @return true ou false
    	 */
        public function verificaAcesso($tabela_id) 
        {       
            if(empty($_SESSION['idusuario_mvf_g'])) return false;
            $ativo = $_SESSION["ativo_mv"];
            
            if ($_SESSION["idtipo_mvf_g"]==1)
    		{
    			$_SESSION["permissao_temp"]=3;
                return true;
    		}
            $sql = "select permissao from grupo_usuario_tabelas where tabela_id=? and grupo_id=?";        
    		$sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($tabela_id);
            $sqlQuery->setNumber($_SESSION["idgrupo_mvf_g"]);
        	$rs=$this->execute($sqlQuery);
            
            if (empty($rs[0]["permissao"]))
    		{
    			$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
    			return false;
    		}
    		
    		$_SESSION["permissao_temp"]=$rs[0]["permissao"];
    	    return true;        
        }
        public function geraSelect($dados)
    	{
    	    $sql = "select ".$dados['primary_key'].",".$dados['nome']." from ".$dados['tabela']." ".$dados['condicao']." ";
    		$sqlQuery = new SqlQuery($sql);
    		$rs=$this->execute($sqlQuery);
    			
    		$texto = '
    		<select name="'.$dados["nome_input"].'" id="'.$dados["id"].'" class="'.$dados["class"].'" onChange="'.$dados["onchange"].'">
    		<option value="">Escolha uma opção</option>
    		';    
    		foreach ($rs as $reg)
    		{
    		
    			$texto .= '<option value="'.$reg[$dados['primary_key']].'" '; 
    			
    			if($dados["value"] == $reg[$dados['primary_key']])
    					$texto.= 'selected';
    
    			$texto.='>'.$reg[$dados['nome']].'</option>'."\r\n";
    	
    		}    	
    		$texto.='</select>';
    		
    		echo $texto;
    
    	}
  }
?>