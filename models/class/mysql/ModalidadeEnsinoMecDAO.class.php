<?php
/**
 * Classe operadora da tabela 'modalidade_ensino_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class ModalidadeEnsinoMecDAO extends Model implements ModalidadeEnsinoMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ModalidadeEnsinoMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ModalidadeEnsinoMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM modalidade_ensino_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM modalidade_ensino_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM modalidade_ensino_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param modalidadeEnsinoMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ModalidadeEnsinoMec modalidadeEnsinoMec
 	 */
	public function insert($modalidadeEnsinoMec){
		$sql = 'INSERT INTO modalidade_ensino_mec (codigo, nome, descricao, individual_escola, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($modalidadeEnsinoMec->codigo);
		$sqlQuery->set($modalidadeEnsinoMec->nome);
		$sqlQuery->set($modalidadeEnsinoMec->descricao);
		$sqlQuery->set($modalidadeEnsinoMec->individualEscola);
		$sqlQuery->set($modalidadeEnsinoMec->created);
		$sqlQuery->set($modalidadeEnsinoMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$modalidadeEnsinoMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ModalidadeEnsinoMec modalidadeEnsinoMec
 	 */
	public function update($modalidadeEnsinoMec){
		$campos = "";
        
        
		 if(!empty($modalidadeEnsinoMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($modalidadeEnsinoMec->nome)) $campos .=' nome = ?,';
		 if(!empty($modalidadeEnsinoMec->descricao)) $campos .=' descricao = ?,';
		 if(!empty($modalidadeEnsinoMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($modalidadeEnsinoMec->created)) $campos .=' created = ?,';
		 if(!empty($modalidadeEnsinoMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE modalidade_ensino_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($modalidadeEnsinoMec->codigo)) 		$sqlQuery->set($modalidadeEnsinoMec->codigo);
		 if(!empty($modalidadeEnsinoMec->nome)) 		$sqlQuery->set($modalidadeEnsinoMec->nome);
		 if(!empty($modalidadeEnsinoMec->descricao)) 		$sqlQuery->set($modalidadeEnsinoMec->descricao);
		 if(!empty($modalidadeEnsinoMec->individualEscola)) 		$sqlQuery->set($modalidadeEnsinoMec->individualEscola);
		 if(!empty($modalidadeEnsinoMec->created)) 		$sqlQuery->set($modalidadeEnsinoMec->created);
		 if(!empty($modalidadeEnsinoMec->status)) 		$sqlQuery->set($modalidadeEnsinoMec->status);

		$sqlQuery->setNumber($modalidadeEnsinoMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM modalidade_ensino_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM modalidade_ensino_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM modalidade_ensino_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ModalidadeEnsinoMec 
	 */
	protected function readRow($row){
		$modalidadeEnsinoMec = new ModalidadeEnsinoMec();
		
		$modalidadeEnsinoMec->id = $row['id'];
		$modalidadeEnsinoMec->codigo = $row['codigo'];
		$modalidadeEnsinoMec->nome = $row['nome'];
		$modalidadeEnsinoMec->descricao = $row['descricao'];
		$modalidadeEnsinoMec->individualEscola = $row['individual_escola'];
		$modalidadeEnsinoMec->created = $row['created'];
		$modalidadeEnsinoMec->status = $row['status'];

		return $modalidadeEnsinoMec;
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
	 * @return ModalidadeEnsinoMec 
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