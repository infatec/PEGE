<?php
/**
 * Classe operadora da tabela 'turma_disciplina_horario'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TurmaDisciplinaHorarioDAO extends Model implements TurmaDisciplinaHorarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TurmaDisciplinaHorario 
	 */
	public function load($id){
		$sql = 'SELECT * FROM turma_disciplina_horario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TurmaDisciplinaHorario      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM turma_disciplina_horario '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM turma_disciplina_horario '.$criterio.'';
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
		$sql = 'SELECT * FROM turma_disciplina_horario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param turmaDisciplinaHorario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM turma_disciplina_horario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TurmaDisciplinaHorario turmaDisciplinaHorario
 	 */
	public function insert($turmaDisciplinaHorario){
		$sql = 'INSERT INTO turma_disciplina_horario (dias_semana, turma_disciplina_id, horario_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($turmaDisciplinaHorario->diasSemana);
		$sqlQuery->setNumber($turmaDisciplinaHorario->turmaDisciplinaId);
		$sqlQuery->setNumber($turmaDisciplinaHorario->horarioId);

		$id = $this->executeInsert($sqlQuery);	
		$turmaDisciplinaHorario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TurmaDisciplinaHorario turmaDisciplinaHorario
 	 */
	public function update($turmaDisciplinaHorario){
		$campos = "";
        
        
		 if(!empty($turmaDisciplinaHorario->diasSemana)) $campos .=' dias_semana = ?,';
		 if(!empty($turmaDisciplinaHorario->turmaDisciplinaId)) $campos .=' turma_disciplina_id = ?,';
		 if(!empty($turmaDisciplinaHorario->horarioId)) $campos .=' horario_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE turma_disciplina_horario SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($turmaDisciplinaHorario->diasSemana)) 		$sqlQuery->set($turmaDisciplinaHorario->diasSemana);
		 if(!empty($turmaDisciplinaHorario->turmaDisciplinaId)) 		$sqlQuery->setNumber($turmaDisciplinaHorario->turmaDisciplinaId);
		 if(!empty($turmaDisciplinaHorario->horarioId)) 		$sqlQuery->setNumber($turmaDisciplinaHorario->horarioId);

		$sqlQuery->setNumber($turmaDisciplinaHorario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM turma_disciplina_horario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDiasSemana($value){
		$sql = 'SELECT * FROM turma_disciplina_horario WHERE dias_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurmaDisciplinaId($value){
		$sql = 'SELECT * FROM turma_disciplina_horario WHERE turma_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorarioId($value){
		$sql = 'SELECT * FROM turma_disciplina_horario WHERE horario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDiasSemana($value){
		$sql = 'DELETE FROM turma_disciplina_horario WHERE dias_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurmaDisciplinaId($value){
		$sql = 'DELETE FROM turma_disciplina_horario WHERE turma_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorarioId($value){
		$sql = 'DELETE FROM turma_disciplina_horario WHERE horario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TurmaDisciplinaHorario 
	 */
	protected function readRow($row){
		$turmaDisciplinaHorario = new TurmaDisciplinaHorario();
		
		$turmaDisciplinaHorario->id = $row['id'];
		$turmaDisciplinaHorario->diasSemana = $row['dias_semana'];
		$turmaDisciplinaHorario->turmaDisciplinaId = $row['turma_disciplina_id'];
		$turmaDisciplinaHorario->horarioId = $row['horario_id'];

		return $turmaDisciplinaHorario;
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
	 * @return TurmaDisciplinaHorario 
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