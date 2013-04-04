<?php
/**
 * Classe operadora da tabela 'nivel_ensino_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class NivelEnsinoMecDAO extends Model implements NivelEnsinoMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return NivelEnsinoMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return NivelEnsinoMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM nivel_ensino_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM nivel_ensino_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM nivel_ensino_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param nivelEnsinoMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param NivelEnsinoMec nivelEnsinoMec
 	 */
	public function insert($nivelEnsinoMec){
		$sql = 'INSERT INTO nivel_ensino_mec (modalidade_ensino_mec_id, codigo, individual_escola, nome, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($nivelEnsinoMec->modalidadeEnsinoMecId);
		$sqlQuery->set($nivelEnsinoMec->codigo);
		$sqlQuery->set($nivelEnsinoMec->individualEscola);
		$sqlQuery->set($nivelEnsinoMec->nome);
		$sqlQuery->set($nivelEnsinoMec->created);
		$sqlQuery->set($nivelEnsinoMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$nivelEnsinoMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param NivelEnsinoMec nivelEnsinoMec
 	 */
	public function update($nivelEnsinoMec){
		$campos = "";
        
        
		 if(!empty($nivelEnsinoMec->modalidadeEnsinoMecId)) $campos .=' modalidade_ensino_mec_id = ?,';
		 if(!empty($nivelEnsinoMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($nivelEnsinoMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($nivelEnsinoMec->nome)) $campos .=' nome = ?,';
		 if(!empty($nivelEnsinoMec->created)) $campos .=' created = ?,';
		 if(!empty($nivelEnsinoMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE nivel_ensino_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($nivelEnsinoMec->modalidadeEnsinoMecId)) 		$sqlQuery->setNumber($nivelEnsinoMec->modalidadeEnsinoMecId);
		 if(!empty($nivelEnsinoMec->codigo)) 		$sqlQuery->set($nivelEnsinoMec->codigo);
		 if(!empty($nivelEnsinoMec->individualEscola)) 		$sqlQuery->set($nivelEnsinoMec->individualEscola);
		 if(!empty($nivelEnsinoMec->nome)) 		$sqlQuery->set($nivelEnsinoMec->nome);
		 if(!empty($nivelEnsinoMec->created)) 		$sqlQuery->set($nivelEnsinoMec->created);
		 if(!empty($nivelEnsinoMec->status)) 		$sqlQuery->set($nivelEnsinoMec->status);

		$sqlQuery->setNumber($nivelEnsinoMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM nivel_ensino_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByModalidadeEnsinoMecId($value){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE modalidade_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM nivel_ensino_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByModalidadeEnsinoMecId($value){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE modalidade_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM nivel_ensino_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return NivelEnsinoMec 
	 */
	protected function readRow($row){
		$nivelEnsinoMec = new NivelEnsinoMec();
		
		$nivelEnsinoMec->id = $row['id'];
		$nivelEnsinoMec->modalidadeEnsinoMecId = $row['modalidade_ensino_mec_id'];
		$nivelEnsinoMec->codigo = $row['codigo'];
		$nivelEnsinoMec->individualEscola = $row['individual_escola'];
		$nivelEnsinoMec->nome = $row['nome'];
		$nivelEnsinoMec->created = $row['created'];
		$nivelEnsinoMec->status = $row['status'];

		return $nivelEnsinoMec;
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
	 * @return NivelEnsinoMec 
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