<?php
/**
 * Classe operadora da tabela 'curso'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class CursoDAO extends Model implements CursoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Curso 
	 */
	public function load($id){
		$sql = 'SELECT * FROM curso WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Curso      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM curso '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM curso '.$criterio.'';
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
		$sql = 'SELECT * FROM curso ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param curso primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM curso WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Curso curso
 	 */
	public function insert($curso){
		$sql = 'INSERT INTO curso (turno_id, grade_horario_id, descricao, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($curso->turnoId);
		$sqlQuery->setNumber($curso->gradeHorarioId);
		$sqlQuery->set($curso->descricao);
		$sqlQuery->set($curso->created);
		$sqlQuery->setNumber($curso->status);

		$id = $this->executeInsert($sqlQuery);	
		$curso->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Curso curso
 	 */
	public function update($curso){
		$campos = "";
        
        
		 if(!empty($curso->turnoId)) $campos .=' turno_id = ?,';
		 if(!empty($curso->gradeHorarioId)) $campos .=' grade_horario_id = ?,';
		 if(!empty($curso->descricao)) $campos .=' descricao = ?,';
		 if(!empty($curso->created)) $campos .=' created = ?,';
		 if(!empty($curso->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE curso SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($curso->turnoId)) 		$sqlQuery->setNumber($curso->turnoId);
		 if(!empty($curso->gradeHorarioId)) 		$sqlQuery->setNumber($curso->gradeHorarioId);
		 if(!empty($curso->descricao)) 		$sqlQuery->set($curso->descricao);
		 if(!empty($curso->created)) 		$sqlQuery->set($curso->created);
		 if(!empty($curso->status)) 		$sqlQuery->setNumber($curso->status);

		$sqlQuery->setNumber($curso->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM curso';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTurnoId($value){
		$sql = 'SELECT * FROM curso WHERE turno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGradeHorarioId($value){
		$sql = 'SELECT * FROM curso WHERE grade_horario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM curso WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM curso WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM curso WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTurnoId($value){
		$sql = 'DELETE FROM curso WHERE turno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGradeHorarioId($value){
		$sql = 'DELETE FROM curso WHERE grade_horario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM curso WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM curso WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM curso WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Curso 
	 */
	protected function readRow($row){
		$curso = new Curso();
		
		$curso->id = $row['id'];
		$curso->turnoId = $row['turno_id'];
		$curso->gradeHorarioId = $row['grade_horario_id'];
		$curso->descricao = $row['descricao'];
		$curso->created = $row['created'];
		$curso->status = $row['status'];

		return $curso;
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
	 * @return Curso 
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