<?php
/**
 * Classe operadora da tabela 'conta_receber_prod_serv'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ContaReceberProdServDAO extends Model implements ContaReceberProdServI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ContaReceberProdServ 
	 */
	public function load($id){
		$sql = 'SELECT * FROM conta_receber_prod_serv WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ContaReceberProdServ      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM conta_receber_prod_serv '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM conta_receber_prod_serv '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		$rs=$this->execute($sqlQuery);
        return $rs[0]["qtd"];
	}
    
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM conta_receber_prod_serv ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param contaReceberProdServ primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM conta_receber_prod_serv WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ContaReceberProdServ contaReceberProdServ
 	 */
	public function insert($contaReceberProdServ){
		$sql = 'INSERT INTO conta_receber_prod_serv (produto_id, servico_id, liga_conta_r_p_s_id, qtd_produto) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($contaReceberProdServ->produtoId);
		$sqlQuery->setNumber($contaReceberProdServ->servicoId);
		$sqlQuery->setNumber($contaReceberProdServ->ligaContaRPSId);
		$sqlQuery->setNumber($contaReceberProdServ->qtdProduto);

		$id = $this->executeInsert($sqlQuery);	
		$contaReceberProdServ->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ContaReceberProdServ contaReceberProdServ
 	 */
	public function update($contaReceberProdServ){
		$campos = "";
        
        
		 if(!empty($contaReceberProdServ->produtoId)) $campos .=' produto_id = ?,';
		 if(!empty($contaReceberProdServ->servicoId)) $campos .=' servico_id = ?,';
		 if(!empty($contaReceberProdServ->ligaContaRPSId)) $campos .=' liga_conta_r_p_s_id = ?,';
		 if(!empty($contaReceberProdServ->qtdProduto)) $campos .=' qtd_produto = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE conta_receber_prod_serv SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($contaReceberProdServ->produtoId)) 		$sqlQuery->setNumber($contaReceberProdServ->produtoId);
		 if(!empty($contaReceberProdServ->servicoId)) 		$sqlQuery->setNumber($contaReceberProdServ->servicoId);
		 if(!empty($contaReceberProdServ->ligaContaRPSId)) 		$sqlQuery->setNumber($contaReceberProdServ->ligaContaRPSId);
		 if(!empty($contaReceberProdServ->qtdProduto)) 		$sqlQuery->setNumber($contaReceberProdServ->qtdProduto);

		$sqlQuery->setNumber($contaReceberProdServ->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM conta_receber_prod_serv';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProdutoId($value){
		$sql = 'SELECT * FROM conta_receber_prod_serv WHERE produto_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByServicoId($value){
		$sql = 'SELECT * FROM conta_receber_prod_serv WHERE servico_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLigaContaRPSId($value){
		$sql = 'SELECT * FROM conta_receber_prod_serv WHERE liga_conta_r_p_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdProduto($value){
		$sql = 'SELECT * FROM conta_receber_prod_serv WHERE qtd_produto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProdutoId($value){
		$sql = 'DELETE FROM conta_receber_prod_serv WHERE produto_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByServicoId($value){
		$sql = 'DELETE FROM conta_receber_prod_serv WHERE servico_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLigaContaRPSId($value){
		$sql = 'DELETE FROM conta_receber_prod_serv WHERE liga_conta_r_p_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdProduto($value){
		$sql = 'DELETE FROM conta_receber_prod_serv WHERE qtd_produto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ContaReceberProdServ 
	 */
	protected function readRow($row){
		$contaReceberProdServ = new ContaReceberProdServ();
		
		$contaReceberProdServ->id = $row['id'];
		$contaReceberProdServ->produtoId = $row['produto_id'];
		$contaReceberProdServ->servicoId = $row['servico_id'];
		$contaReceberProdServ->ligaContaRPSId = $row['liga_conta_r_p_s_id'];
		$contaReceberProdServ->qtdProduto = $row['qtd_produto'];

		return $contaReceberProdServ;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get registro
	 *
	 * @return ContaReceberProdServ 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query para um registro e uma coluna
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Inseri um registro na tabela
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>