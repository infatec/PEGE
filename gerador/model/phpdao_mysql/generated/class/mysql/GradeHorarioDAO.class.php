<?php
/**
 * Classe operadora da tabela 'grade_horario'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class GradeHorarioDAO extends Model implements GradeHorarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return GradeHorario 
	 */
	public function load($id){
		$sql = 'SELECT * FROM grade_horario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return GradeHorario      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM grade_horario '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM grade_horario '.$criterio.'';
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
		$sql = 'SELECT * FROM grade_horario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param gradeHorario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM grade_horario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param GradeHorario gradeHorario
 	 */
	public function insert($gradeHorario){
		$sql = 'INSERT INTO grade_horario (descricao, duracao_aula, minutos_aula, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($gradeHorario->descricao);
		$sqlQuery->setNumber($gradeHorario->duracaoAula);
		$sqlQuery->set($gradeHorario->minutosAula);
		$sqlQuery->set($gradeHorario->created);
		$sqlQuery->setNumber($gradeHorario->status);

		$id = $this->executeInsert($sqlQuery);	
		$gradeHorario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param GradeHorario gradeHorario
 	 */
	public function update($gradeHorario){
		$campos = "";
        
        
		 if(!empty($gradeHorario->descricao)) $campos .=' descricao = ?,';
		 if(!empty($gradeHorario->duracaoAula)) $campos .=' duracao_aula = ?,';
		 if(!empty($gradeHorario->minutosAula)) $campos .=' minutos_aula = ?,';
		 if(!empty($gradeHorario->created)) $campos .=' created = ?,';
		 if(!empty($gradeHorario->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE grade_horario SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($gradeHorario->descricao)) 		$sqlQuery->set($gradeHorario->descricao);
		 if(!empty($gradeHorario->duracaoAula)) 		$sqlQuery->setNumber($gradeHorario->duracaoAula);
		 if(!empty($gradeHorario->minutosAula)) 		$sqlQuery->set($gradeHorario->minutosAula);
		 if(!empty($gradeHorario->created)) 		$sqlQuery->set($gradeHorario->created);
		 if(!empty($gradeHorario->status)) 		$sqlQuery->setNumber($gradeHorario->status);

		$sqlQuery->setNumber($gradeHorario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM grade_horario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM grade_horario WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDuracaoAula($value){
		$sql = 'SELECT * FROM grade_horario WHERE duracao_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinutosAula($value){
		$sql = 'SELECT * FROM grade_horario WHERE minutos_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM grade_horario WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM grade_horario WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM grade_horario WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDuracaoAula($value){
		$sql = 'DELETE FROM grade_horario WHERE duracao_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinutosAula($value){
		$sql = 'DELETE FROM grade_horario WHERE minutos_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM grade_horario WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM grade_horario WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return GradeHorario 
	 */
	protected function readRow($row){
		$gradeHorario = new GradeHorario();
		
		$gradeHorario->id = $row['id'];
		$gradeHorario->descricao = $row['descricao'];
		$gradeHorario->duracaoAula = $row['duracao_aula'];
		$gradeHorario->minutosAula = $row['minutos_aula'];
		$gradeHorario->created = $row['created'];
		$gradeHorario->status = $row['status'];

		return $gradeHorario;
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
	 * @return GradeHorario 
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