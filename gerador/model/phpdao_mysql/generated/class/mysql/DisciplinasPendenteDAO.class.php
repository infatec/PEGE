<?php
/**
 * Classe operadora da tabela 'disciplinas_pendente'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class DisciplinasPendenteDAO extends Model implements DisciplinasPendenteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisciplinasPendente 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disciplinas_pendente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisciplinasPendente      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM disciplinas_pendente '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM disciplinas_pendente '.$criterio.'';
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
		$sql = 'SELECT * FROM disciplinas_pendente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param disciplinasPendente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM disciplinas_pendente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisciplinasPendente disciplinasPendente
 	 */
	public function insert($disciplinasPendente){
		$sql = 'INSERT INTO disciplinas_pendente (transferencia_id, disciplina_id, aluno_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($disciplinasPendente->transferenciaId);
		$sqlQuery->setNumber($disciplinasPendente->disciplinaId);
		$sqlQuery->setNumber($disciplinasPendente->alunoId);

		$id = $this->executeInsert($sqlQuery);	
		$disciplinasPendente->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisciplinasPendente disciplinasPendente
 	 */
	public function update($disciplinasPendente){
		$campos = "";
        
        
		 if(!empty($disciplinasPendente->transferenciaId)) $campos .=' transferencia_id = ?,';
		 if(!empty($disciplinasPendente->disciplinaId)) $campos .=' disciplina_id = ?,';
		 if(!empty($disciplinasPendente->alunoId)) $campos .=' aluno_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE disciplinas_pendente SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($disciplinasPendente->transferenciaId)) 		$sqlQuery->setNumber($disciplinasPendente->transferenciaId);
		 if(!empty($disciplinasPendente->disciplinaId)) 		$sqlQuery->setNumber($disciplinasPendente->disciplinaId);
		 if(!empty($disciplinasPendente->alunoId)) 		$sqlQuery->setNumber($disciplinasPendente->alunoId);

		$sqlQuery->setNumber($disciplinasPendente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM disciplinas_pendente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTransferenciaId($value){
		$sql = 'SELECT * FROM disciplinas_pendente WHERE transferencia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinaId($value){
		$sql = 'SELECT * FROM disciplinas_pendente WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM disciplinas_pendente WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTransferenciaId($value){
		$sql = 'DELETE FROM disciplinas_pendente WHERE transferencia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinaId($value){
		$sql = 'DELETE FROM disciplinas_pendente WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM disciplinas_pendente WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return DisciplinasPendente 
	 */
	protected function readRow($row){
		$disciplinasPendente = new DisciplinasPendente();
		
		$disciplinasPendente->id = $row['id'];
		$disciplinasPendente->transferenciaId = $row['transferencia_id'];
		$disciplinasPendente->disciplinaId = $row['disciplina_id'];
		$disciplinasPendente->alunoId = $row['aluno_id'];

		return $disciplinasPendente;
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
	 * @return DisciplinasPendente 
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