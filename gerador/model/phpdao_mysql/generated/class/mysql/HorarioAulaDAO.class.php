<?php
/**
 * Classe operadora da tabela 'horario_aula'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class HorarioAulaDAO extends Model implements HorarioAulaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return HorarioAula 
	 */
	public function load($id){
		$sql = 'SELECT * FROM horario_aula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return HorarioAula      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM horario_aula '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM horario_aula '.$criterio.'';
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
		$sql = 'SELECT * FROM horario_aula ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param horarioAula primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM horario_aula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param HorarioAula horarioAula
 	 */
	public function insert($horarioAula){
		$sql = 'INSERT INTO horario_aula (grade_horario_id, hora_inicio, hora_fim, ordem, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($horarioAula->gradeHorarioId);
		$sqlQuery->set($horarioAula->horaInicio);
		$sqlQuery->set($horarioAula->horaFim);
		$sqlQuery->setNumber($horarioAula->ordem);
		$sqlQuery->set($horarioAula->created);
		$sqlQuery->setNumber($horarioAula->status);

		$id = $this->executeInsert($sqlQuery);	
		$horarioAula->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param HorarioAula horarioAula
 	 */
	public function update($horarioAula){
		$campos = "";
        
        
		 if(!empty($horarioAula->gradeHorarioId)) $campos .=' grade_horario_id = ?,';
		 if(!empty($horarioAula->horaInicio)) $campos .=' hora_inicio = ?,';
		 if(!empty($horarioAula->horaFim)) $campos .=' hora_fim = ?,';
		 if(!empty($horarioAula->ordem)) $campos .=' ordem = ?,';
		 if(!empty($horarioAula->created)) $campos .=' created = ?,';
		 if(!empty($horarioAula->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE horario_aula SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($horarioAula->gradeHorarioId)) 		$sqlQuery->setNumber($horarioAula->gradeHorarioId);
		 if(!empty($horarioAula->horaInicio)) 		$sqlQuery->set($horarioAula->horaInicio);
		 if(!empty($horarioAula->horaFim)) 		$sqlQuery->set($horarioAula->horaFim);
		 if(!empty($horarioAula->ordem)) 		$sqlQuery->setNumber($horarioAula->ordem);
		 if(!empty($horarioAula->created)) 		$sqlQuery->set($horarioAula->created);
		 if(!empty($horarioAula->status)) 		$sqlQuery->setNumber($horarioAula->status);

		$sqlQuery->setNumber($horarioAula->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM horario_aula';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGradeHorarioId($value){
		$sql = 'SELECT * FROM horario_aula WHERE grade_horario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraInicio($value){
		$sql = 'SELECT * FROM horario_aula WHERE hora_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraFim($value){
		$sql = 'SELECT * FROM horario_aula WHERE hora_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdem($value){
		$sql = 'SELECT * FROM horario_aula WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM horario_aula WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM horario_aula WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGradeHorarioId($value){
		$sql = 'DELETE FROM horario_aula WHERE grade_horario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraInicio($value){
		$sql = 'DELETE FROM horario_aula WHERE hora_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraFim($value){
		$sql = 'DELETE FROM horario_aula WHERE hora_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdem($value){
		$sql = 'DELETE FROM horario_aula WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM horario_aula WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM horario_aula WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return HorarioAula 
	 */
	protected function readRow($row){
		$horarioAula = new HorarioAula();
		
		$horarioAula->id = $row['id'];
		$horarioAula->gradeHorarioId = $row['grade_horario_id'];
		$horarioAula->horaInicio = $row['hora_inicio'];
		$horarioAula->horaFim = $row['hora_fim'];
		$horarioAula->ordem = $row['ordem'];
		$horarioAula->created = $row['created'];
		$horarioAula->status = $row['status'];

		return $horarioAula;
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
	 * @return HorarioAula 
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