<?php
/**
 * Classe operadora da tabela 'turma'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TurmaDAO extends Model implements TurmaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Turma 
	 */
	public function load($id){
		$sql = 'SELECT * FROM turma WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Turma      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM turma '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM turma '.$criterio.'';
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
		$sql = 'SELECT * FROM turma ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param turma primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM turma WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Turma turma
 	 */
	public function insert($turma){
		$sql = 'INSERT INTO turma (codigo, nivel_ensino_mec_id, turno_id, ano_id, num_max_aluno, escola_id, ano_letivo_id, sala_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($turma->codigo);
		$sqlQuery->setNumber($turma->nivelEnsinoMecId);
		$sqlQuery->setNumber($turma->turnoId);
		$sqlQuery->setNumber($turma->anoId);
		$sqlQuery->setNumber($turma->numMaxAluno);
		$sqlQuery->setNumber($turma->escolaId);
		$sqlQuery->setNumber($turma->anoLetivoId);
		$sqlQuery->setNumber($turma->salaId);

		$id = $this->executeInsert($sqlQuery);	
		$turma->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Turma turma
 	 */
	public function update($turma){
		$campos = "";
        
        
		 if(!empty($turma->codigo)) $campos .=' codigo = ?,';
		 if(!empty($turma->nivelEnsinoMecId)) $campos .=' nivel_ensino_mec_id = ?,';
		 if(!empty($turma->turnoId)) $campos .=' turno_id = ?,';
		 if(!empty($turma->anoId)) $campos .=' ano_id = ?,';
		 if(!empty($turma->numMaxAluno)) $campos .=' num_max_aluno = ?,';
		 if(!empty($turma->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($turma->anoLetivoId)) $campos .=' ano_letivo_id = ?,';
		 if(!empty($turma->salaId)) $campos .=' sala_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE turma SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($turma->codigo)) 		$sqlQuery->set($turma->codigo);
		 if(!empty($turma->nivelEnsinoMecId)) 		$sqlQuery->setNumber($turma->nivelEnsinoMecId);
		 if(!empty($turma->turnoId)) 		$sqlQuery->setNumber($turma->turnoId);
		 if(!empty($turma->anoId)) 		$sqlQuery->setNumber($turma->anoId);
		 if(!empty($turma->numMaxAluno)) 		$sqlQuery->setNumber($turma->numMaxAluno);
		 if(!empty($turma->escolaId)) 		$sqlQuery->setNumber($turma->escolaId);
		 if(!empty($turma->anoLetivoId)) 		$sqlQuery->setNumber($turma->anoLetivoId);
		 if(!empty($turma->salaId)) 		$sqlQuery->setNumber($turma->salaId);

		$sqlQuery->setNumber($turma->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM turma';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM turma WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNivelEnsinoMecId($value){
		$sql = 'SELECT * FROM turma WHERE nivel_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurnoId($value){
		$sql = 'SELECT * FROM turma WHERE turno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnoId($value){
		$sql = 'SELECT * FROM turma WHERE ano_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumMaxAluno($value){
		$sql = 'SELECT * FROM turma WHERE num_max_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM turma WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnoLetivoId($value){
		$sql = 'SELECT * FROM turma WHERE ano_letivo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySalaId($value){
		$sql = 'SELECT * FROM turma WHERE sala_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM turma WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNivelEnsinoMecId($value){
		$sql = 'DELETE FROM turma WHERE nivel_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurnoId($value){
		$sql = 'DELETE FROM turma WHERE turno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnoId($value){
		$sql = 'DELETE FROM turma WHERE ano_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumMaxAluno($value){
		$sql = 'DELETE FROM turma WHERE num_max_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM turma WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnoLetivoId($value){
		$sql = 'DELETE FROM turma WHERE ano_letivo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySalaId($value){
		$sql = 'DELETE FROM turma WHERE sala_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Turma 
	 */
	protected function readRow($row){
		$turma = new Turma();
		
		$turma->id = $row['id'];
		$turma->codigo = $row['codigo'];
		$turma->nivelEnsinoMecId = $row['nivel_ensino_mec_id'];
		$turma->turnoId = $row['turno_id'];
		$turma->anoId = $row['ano_id'];
		$turma->numMaxAluno = $row['num_max_aluno'];
		$turma->escolaId = $row['escola_id'];
		$turma->anoLetivoId = $row['ano_letivo_id'];
		$turma->salaId = $row['sala_id'];

		return $turma;
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
	 * @return Turma 
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