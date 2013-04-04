<?php
/**
 * Classe operadora da tabela 'caixa'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class CaixaDAO extends Model implements CaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Caixa 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Caixa      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM caixa '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM caixa '.$criterio.'';
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
		$sql = 'SELECT * FROM caixa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param caixa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Caixa caixa
 	 */
	public function insert($caixa){
		$sql = 'INSERT INTO caixa (descricao, entrada, saida, transferencia, caixa_central, created, status) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($caixa->descricao);
		$sqlQuery->set($caixa->entrada);
		$sqlQuery->set($caixa->saida);
		$sqlQuery->set($caixa->transferencia);
		$sqlQuery->set($caixa->caixaCentral);
		$sqlQuery->set($caixa->created);
		$sqlQuery->set($caixa->status);

		$id = $this->executeInsert($sqlQuery);	
		$caixa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Caixa caixa
 	 */
	public function update($caixa){
		$campos = "";
        
        
		 if(!empty($caixa->descricao)) $campos .=' descricao = ?,';
		 if(!empty($caixa->entrada)) $campos .=' entrada = ?,';
		 if(!empty($caixa->saida)) $campos .=' saida = ?,';
		 if(!empty($caixa->transferencia)) $campos .=' transferencia = ?,';
		 if(!empty($caixa->caixaCentral)) $campos .=' caixa_central = ?,';
		 if(!empty($caixa->created)) $campos .=' created = ?,';
		 if(!empty($caixa->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE caixa SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($caixa->descricao)) 		$sqlQuery->set($caixa->descricao);
		 if(!empty($caixa->entrada)) 		$sqlQuery->set($caixa->entrada);
		 if(!empty($caixa->saida)) 		$sqlQuery->set($caixa->saida);
		 if(!empty($caixa->transferencia)) 		$sqlQuery->set($caixa->transferencia);
		 if(!empty($caixa->caixaCentral)) 		$sqlQuery->set($caixa->caixaCentral);
		 if(!empty($caixa->created)) 		$sqlQuery->set($caixa->created);
		 if(!empty($caixa->status)) 		$sqlQuery->set($caixa->status);

		$sqlQuery->setNumber($caixa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM caixa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM caixa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEntrada($value){
		$sql = 'SELECT * FROM caixa WHERE entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySaida($value){
		$sql = 'SELECT * FROM caixa WHERE saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTransferencia($value){
		$sql = 'SELECT * FROM caixa WHERE transferencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaCentral($value){
		$sql = 'SELECT * FROM caixa WHERE caixa_central = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM caixa WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM caixa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM caixa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEntrada($value){
		$sql = 'DELETE FROM caixa WHERE entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySaida($value){
		$sql = 'DELETE FROM caixa WHERE saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTransferencia($value){
		$sql = 'DELETE FROM caixa WHERE transferencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaCentral($value){
		$sql = 'DELETE FROM caixa WHERE caixa_central = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM caixa WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM caixa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Caixa 
	 */
	protected function readRow($row){
		$caixa = new Caixa();
		
		$caixa->id = $row['id'];
		$caixa->descricao = $row['descricao'];
		$caixa->entrada = $row['entrada'];
		$caixa->saida = $row['saida'];
		$caixa->transferencia = $row['transferencia'];
		$caixa->caixaCentral = $row['caixa_central'];
		$caixa->created = $row['created'];
		$caixa->status = $row['status'];

		return $caixa;
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
	 * @return Caixa 
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