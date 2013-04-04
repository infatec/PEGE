<?php
/**
 * Classe operadora da tabela 'aula'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class AulaDAO extends Model implements AulaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Aula 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Aula      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM aula '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM aula '.$criterio.'';
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
		$sql = 'SELECT * FROM aula ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param aula primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM aula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Aula aula
 	 */
	public function insert($aula){
		$sql = 'INSERT INTO aula (turma_disciplina_id, data_aula, hora_inicio, hora_fim, qtd_aula, atividade) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($aula->turmaDisciplinaId);
		$sqlQuery->set($aula->dataAula);
		$sqlQuery->set($aula->horaInicio);
		$sqlQuery->set($aula->horaFim);
		$sqlQuery->setNumber($aula->qtdAula);
		$sqlQuery->set($aula->atividade);

		$id = $this->executeInsert($sqlQuery);	
		$aula->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Aula aula
 	 */
	public function update($aula){
		$campos = "";
        
        
		 if(!empty($aula->turmaDisciplinaId)) $campos .=' turma_disciplina_id = ?,';
		 if(!empty($aula->dataAula)) $campos .=' data_aula = ?,';
		 if(!empty($aula->horaInicio)) $campos .=' hora_inicio = ?,';
		 if(!empty($aula->horaFim)) $campos .=' hora_fim = ?,';
		 if(!empty($aula->qtdAula)) $campos .=' qtd_aula = ?,';
		 if(!empty($aula->atividade)) $campos .=' atividade = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE aula SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($aula->turmaDisciplinaId)) 		$sqlQuery->setNumber($aula->turmaDisciplinaId);
		 if(!empty($aula->dataAula)) 		$sqlQuery->set($aula->dataAula);
		 if(!empty($aula->horaInicio)) 		$sqlQuery->set($aula->horaInicio);
		 if(!empty($aula->horaFim)) 		$sqlQuery->set($aula->horaFim);
		 if(!empty($aula->qtdAula)) 		$sqlQuery->setNumber($aula->qtdAula);
		 if(!empty($aula->atividade)) 		$sqlQuery->set($aula->atividade);

		$sqlQuery->setNumber($aula->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM aula';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTurmaDisciplinaId($value){
		$sql = 'SELECT * FROM aula WHERE turma_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAula($value){
		$sql = 'SELECT * FROM aula WHERE data_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraInicio($value){
		$sql = 'SELECT * FROM aula WHERE hora_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraFim($value){
		$sql = 'SELECT * FROM aula WHERE hora_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdAula($value){
		$sql = 'SELECT * FROM aula WHERE qtd_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtividade($value){
		$sql = 'SELECT * FROM aula WHERE atividade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTurmaDisciplinaId($value){
		$sql = 'DELETE FROM aula WHERE turma_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAula($value){
		$sql = 'DELETE FROM aula WHERE data_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraInicio($value){
		$sql = 'DELETE FROM aula WHERE hora_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraFim($value){
		$sql = 'DELETE FROM aula WHERE hora_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdAula($value){
		$sql = 'DELETE FROM aula WHERE qtd_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtividade($value){
		$sql = 'DELETE FROM aula WHERE atividade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Aula 
	 */
	protected function readRow($row){
		$aula = new Aula();
		
		$aula->id = $row['id'];
		$aula->turmaDisciplinaId = $row['turma_disciplina_id'];
		$aula->dataAula = $row['data_aula'];
		$aula->horaInicio = $row['hora_inicio'];
		$aula->horaFim = $row['hora_fim'];
		$aula->qtdAula = $row['qtd_aula'];
		$aula->atividade = $row['atividade'];

		return $aula;
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
	 * @return Aula 
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