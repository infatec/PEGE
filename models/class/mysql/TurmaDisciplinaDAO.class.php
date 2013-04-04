<?php
/**
 * Classe operadora da tabela 'turma_disciplina'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TurmaDisciplinaDAO extends Model implements TurmaDisciplinaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TurmaDisciplina 
	 */
	public function load($id){
		$sql = 'SELECT * FROM turma_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TurmaDisciplina      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM turma_disciplina '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM turma_disciplina '.$criterio.'';
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
		$sql = 'SELECT * FROM turma_disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param turmaDisciplina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM turma_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TurmaDisciplina turmaDisciplina
 	 */
	public function insert($turmaDisciplina){
		$sql = 'INSERT INTO turma_disciplina (turma_id, disciplinas_mec_id, servidor_id, horas_aula_semestre1, horas_aula_semestre2) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($turmaDisciplina->turmaId);
		$sqlQuery->setNumber($turmaDisciplina->disciplinasMecId);
		$sqlQuery->setNumber($turmaDisciplina->servidorId);
		$sqlQuery->setNumber($turmaDisciplina->horasAulaSemestre1);
		$sqlQuery->setNumber($turmaDisciplina->horasAulaSemestre2);

		$id = $this->executeInsert($sqlQuery);	
		$turmaDisciplina->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TurmaDisciplina turmaDisciplina
 	 */
	public function update($turmaDisciplina){
		$campos = "";
        
        
		 if(!empty($turmaDisciplina->turmaId)) $campos .=' turma_id = ?,';
		 if(!empty($turmaDisciplina->disciplinasMecId)) $campos .=' disciplinas_mec_id = ?,';
		 if(!empty($turmaDisciplina->servidorId)) $campos .=' servidor_id = ?,';
		 if(!empty($turmaDisciplina->horasAulaSemestre1)) $campos .=' horas_aula_semestre1 = ?,';
		 if(!empty($turmaDisciplina->horasAulaSemestre2)) $campos .=' horas_aula_semestre2 = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE turma_disciplina SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($turmaDisciplina->turmaId)) 		$sqlQuery->setNumber($turmaDisciplina->turmaId);
		 if(!empty($turmaDisciplina->disciplinasMecId)) 		$sqlQuery->setNumber($turmaDisciplina->disciplinasMecId);
		 if(!empty($turmaDisciplina->servidorId)) 		$sqlQuery->setNumber($turmaDisciplina->servidorId);
		 if(!empty($turmaDisciplina->horasAulaSemestre1)) 		$sqlQuery->setNumber($turmaDisciplina->horasAulaSemestre1);
		 if(!empty($turmaDisciplina->horasAulaSemestre2)) 		$sqlQuery->setNumber($turmaDisciplina->horasAulaSemestre2);

		$sqlQuery->setNumber($turmaDisciplina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM turma_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTurmaId($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinasMecId($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE disciplinas_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByServidorId($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorasAulaSemestre1($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE horas_aula_semestre1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorasAulaSemestre2($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE horas_aula_semestre2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTurmaId($value){
		$sql = 'DELETE FROM turma_disciplina WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinasMecId($value){
		$sql = 'DELETE FROM turma_disciplina WHERE disciplinas_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByServidorId($value){
		$sql = 'DELETE FROM turma_disciplina WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorasAulaSemestre1($value){
		$sql = 'DELETE FROM turma_disciplina WHERE horas_aula_semestre1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorasAulaSemestre2($value){
		$sql = 'DELETE FROM turma_disciplina WHERE horas_aula_semestre2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TurmaDisciplina 
	 */
	protected function readRow($row){
		$turmaDisciplina = new TurmaDisciplina();
		
		$turmaDisciplina->id = $row['id'];
		$turmaDisciplina->turmaId = $row['turma_id'];
		$turmaDisciplina->disciplinasMecId = $row['disciplinas_mec_id'];
		$turmaDisciplina->servidorId = $row['servidor_id'];
		$turmaDisciplina->horasAulaSemestre1 = $row['horas_aula_semestre1'];
		$turmaDisciplina->horasAulaSemestre2 = $row['horas_aula_semestre2'];

		return $turmaDisciplina;
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
	 * @return TurmaDisciplina 
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