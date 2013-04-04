<?php
/**
 * Classe operadora da tabela 'disciplinas_aprovada'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class DisciplinasAprovadaDAO extends Model implements DisciplinasAprovadaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisciplinasAprovada 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disciplinas_aprovada WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisciplinasAprovada      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM disciplinas_aprovada '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM disciplinas_aprovada '.$criterio.'';
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
		$sql = 'SELECT * FROM disciplinas_aprovada ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param disciplinasAprovada primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM disciplinas_aprovada WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisciplinasAprovada disciplinasAprovada
 	 */
	public function insert($disciplinasAprovada){
		$sql = 'INSERT INTO disciplinas_aprovada (transferencia_id, disciplina_id, aluno_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($disciplinasAprovada->transferenciaId);
		$sqlQuery->setNumber($disciplinasAprovada->disciplinaId);
		$sqlQuery->setNumber($disciplinasAprovada->alunoId);

		$id = $this->executeInsert($sqlQuery);	
		$disciplinasAprovada->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisciplinasAprovada disciplinasAprovada
 	 */
	public function update($disciplinasAprovada){
		$campos = "";
        
        
		 if(!empty($disciplinasAprovada->transferenciaId)) $campos .=' transferencia_id = ?,';
		 if(!empty($disciplinasAprovada->disciplinaId)) $campos .=' disciplina_id = ?,';
		 if(!empty($disciplinasAprovada->alunoId)) $campos .=' aluno_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE disciplinas_aprovada SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($disciplinasAprovada->transferenciaId)) 		$sqlQuery->setNumber($disciplinasAprovada->transferenciaId);
		 if(!empty($disciplinasAprovada->disciplinaId)) 		$sqlQuery->setNumber($disciplinasAprovada->disciplinaId);
		 if(!empty($disciplinasAprovada->alunoId)) 		$sqlQuery->setNumber($disciplinasAprovada->alunoId);

		$sqlQuery->setNumber($disciplinasAprovada->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM disciplinas_aprovada';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTransferenciaId($value){
		$sql = 'SELECT * FROM disciplinas_aprovada WHERE transferencia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinaId($value){
		$sql = 'SELECT * FROM disciplinas_aprovada WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM disciplinas_aprovada WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTransferenciaId($value){
		$sql = 'DELETE FROM disciplinas_aprovada WHERE transferencia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinaId($value){
		$sql = 'DELETE FROM disciplinas_aprovada WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM disciplinas_aprovada WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return DisciplinasAprovada 
	 */
	protected function readRow($row){
		$disciplinasAprovada = new DisciplinasAprovada();
		
		$disciplinasAprovada->id = $row['id'];
		$disciplinasAprovada->transferenciaId = $row['transferencia_id'];
		$disciplinasAprovada->disciplinaId = $row['disciplina_id'];
		$disciplinasAprovada->alunoId = $row['aluno_id'];

		return $disciplinasAprovada;
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
	 * @return DisciplinasAprovada 
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