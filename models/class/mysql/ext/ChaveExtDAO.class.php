<?php
/**
 * Classe operadora da tabela 'chaves'. banco msSql.
 *
 * @author:frame arser
 * @date: 2010-07-20 21:10
 */
class ChavesExtDAO extends ChavesDAO{
    public function geraChave($id)
	{
		$div = str_split($id);//retorna a string em um array
		$cont=0;
		$chave ="";
		foreach($div as $valor)
		{
			$cont++;
            $sql = "select chave from chaves where numero=?";
            $query_chave = new SqlQuery($sql);
            $query_chave->setNumber($valor);
            $rsGeraChave = $this->Execute($query_chave);	
			$c = $rsGeraChave[0]['chave'];
			if($cont==1)$chave.=$c;
			else $chave.="i".$c;
		}
		
		return $chave;
	
	}
    public function retornaValorChave($chave)
	{
		$descr = explode("i",$chave);
        if(empty($descr))$descr[] = $chave;
		//print_r($descr);
		$numero="";
		foreach($descr as $valor)
		{   
		    
            $sql=  "select chave,numero from chaves where chave = ? ";
            $query_chave = new SqlQuery($sql);
            $query_chave->set($valor);
            $rsGeraChave = $this->Execute($query_chave);	
            //print_r($rsGeraChave);
			$tr=count($rsGeraChave);
            
			if($tr==0)
			{
			    //echo "Letras apagadas";
				$this->misturaChaveBanco();
                redireciona("../../index.php");
			    return false;
			}
			
			$chave = $rsGeraChave[0]['chave'];
		
			if(strcmp ( $chave, $valor)!=0)
			{
			    echo "Letras alteradas";
				$this->misturaChaveBanco();
                redireciona("../../index.php");
				return false;
			}
				
				
			$n = $rsGeraChave[0]['numero'];
			
			$numero .=$n;
		  	  
		}
		return $numero;
	}
	public function misturaChaveBanco()
    {
        $sql= "select * from chaves";
        $queryChaves = new SqlQuery($sql);
        $rsChave = $this->Execute($queryChaves);	
		foreach($rsChave as $chave)
		{
			$chav=gerarandonstring($chave['qtd']);
     
            $sql_up= "update chaves set chave=? where id=?";
            $query_up = new SqlQuery($sql_up);
            $query_up->set($chav);
            $query_up->setNumber($chave["id"]);
            $this->executeUpdate($query_up);
            
		}
    }
    
}
?>