<?php
/**
 * Classe operadora da tabela 'tipos_frequencia_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposFrequenciaMecDAO extends Model implements TiposFrequenciaMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposFrequenciaMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_frequencia_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposFrequenciaMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_frequencia_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_frequencia_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_frequencia_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposFrequenciaMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_frequencia_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposFrequenciaMec tiposFrequenciaMec
 	 */
	public function insert($tiposFrequenciaMec){
		$sql = 'INSERT INTO tipos_frequencia_mec (codigo, nome, individual_escola, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tiposFrequenciaMec->codigo);
		$sqlQuery->set($tiposFrequenciaMec->nome);
		$sqlQuery->set($tiposFrequenciaMec->individualEscola);
		$sqlQuery->set($tiposFrequenciaMec->created);
		$sqlQuery->set($tiposFrequenciaMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$tiposFrequenciaMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposFrequenciaMec tiposFrequenciaMec
 	 */
	public function update($tiposFrequenciaMec){
		$campos = "";
        
        
		 if(!empty($tiposFrequenciaMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($tiposFrequenciaMec->nome)) $campos .=' nome = ?,';
		 if(!empty($tiposFrequenciaMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($tiposFrequenciaMec->created)) $campos .=' created = ?,';
		 if(!empty($tiposFrequenciaMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_frequencia_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposFrequenciaMec->codigo)) 		$sqlQuery->set($tiposFrequenciaMec->codigo);
		 if(!empty($tiposFrequenciaMec->nome)) 		$sqlQuery->set($tiposFrequenciaMec->nome);
		 if(!empty($tiposFrequenciaMec->individualEscola)) 		$sqlQuery->set($tiposFrequenciaMec->individualEscola);
		 if(!empty($tiposFrequenciaMec->created)) 		$sqlQuery->set($tiposFrequenciaMec->created);
		 if(!empty($tiposFrequenciaMec->status)) 		$sqlQuery->set($tiposFrequenciaMec->status);

		$sqlQuery->setNumber($tiposFrequenciaMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_frequencia_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM tipos_frequencia_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM tipos_frequencia_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM tipos_frequencia_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM tipos_frequencia_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tipos_frequencia_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM tipos_frequencia_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM tipos_frequencia_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM tipos_frequencia_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM tipos_frequencia_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tipos_frequencia_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposFrequenciaMec 
	 */
	protected function readRow($row){
		$tiposFrequenciaMec = new TiposFrequenciaMec();
		
		$tiposFrequenciaMec->id = $row['id'];
		$tiposFrequenciaMec->codigo = $row['codigo'];
		$tiposFrequenciaMec->nome = $row['nome'];
		$tiposFrequenciaMec->individualEscola = $row['individual_escola'];
		$tiposFrequenciaMec->created = $row['created'];
		$tiposFrequenciaMec->status = $row['status'];

		return $tiposFrequenciaMec;
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
	 * @return TiposFrequenciaMec 
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