<?php
/**
 * Classe operadora da tabela 'tipos_ensino_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposEnsinoMecDAO extends Model implements TiposEnsinoMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposEnsinoMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposEnsinoMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_ensino_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_ensino_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_ensino_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposEnsinoMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposEnsinoMec tiposEnsinoMec
 	 */
	public function insert($tiposEnsinoMec){
		$sql = 'INSERT INTO tipos_ensino_mec (codigo, nome, descricao, individual_escola, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tiposEnsinoMec->codigo);
		$sqlQuery->set($tiposEnsinoMec->nome);
		$sqlQuery->set($tiposEnsinoMec->descricao);
		$sqlQuery->set($tiposEnsinoMec->individualEscola);
		$sqlQuery->set($tiposEnsinoMec->created);
		$sqlQuery->set($tiposEnsinoMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$tiposEnsinoMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposEnsinoMec tiposEnsinoMec
 	 */
	public function update($tiposEnsinoMec){
		$campos = "";
        
        
		 if(!empty($tiposEnsinoMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($tiposEnsinoMec->nome)) $campos .=' nome = ?,';
		 if(!empty($tiposEnsinoMec->descricao)) $campos .=' descricao = ?,';
		 if(!empty($tiposEnsinoMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($tiposEnsinoMec->created)) $campos .=' created = ?,';
		 if(!empty($tiposEnsinoMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_ensino_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposEnsinoMec->codigo)) 		$sqlQuery->set($tiposEnsinoMec->codigo);
		 if(!empty($tiposEnsinoMec->nome)) 		$sqlQuery->set($tiposEnsinoMec->nome);
		 if(!empty($tiposEnsinoMec->descricao)) 		$sqlQuery->set($tiposEnsinoMec->descricao);
		 if(!empty($tiposEnsinoMec->individualEscola)) 		$sqlQuery->set($tiposEnsinoMec->individualEscola);
		 if(!empty($tiposEnsinoMec->created)) 		$sqlQuery->set($tiposEnsinoMec->created);
		 if(!empty($tiposEnsinoMec->status)) 		$sqlQuery->set($tiposEnsinoMec->status);

		$sqlQuery->setNumber($tiposEnsinoMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_ensino_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tipos_ensino_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tipos_ensino_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposEnsinoMec 
	 */
	protected function readRow($row){
		$tiposEnsinoMec = new TiposEnsinoMec();
		
		$tiposEnsinoMec->id = $row['id'];
		$tiposEnsinoMec->codigo = $row['codigo'];
		$tiposEnsinoMec->nome = $row['nome'];
		$tiposEnsinoMec->descricao = $row['descricao'];
		$tiposEnsinoMec->individualEscola = $row['individual_escola'];
		$tiposEnsinoMec->created = $row['created'];
		$tiposEnsinoMec->status = $row['status'];

		return $tiposEnsinoMec;
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
	 * @return TiposEnsinoMec 
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