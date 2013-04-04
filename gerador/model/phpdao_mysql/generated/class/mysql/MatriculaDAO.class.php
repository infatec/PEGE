<?php
/**
 * Classe operadora da tabela 'matricula'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class MatriculaDAO extends Model implements MatriculaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Matricula 
	 */
	public function load($id){
		$sql = 'SELECT * FROM matricula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Matricula      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM matricula '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM matricula '.$criterio.'';
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
		$sql = 'SELECT * FROM matricula ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param matricula primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM matricula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Matricula matricula
 	 */
	public function insert($matricula){
		$sql = 'INSERT INTO matricula (data_matricula, matricula, aluno_id, turma_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($matricula->dataMatricula);
		$sqlQuery->set($matricula->matricula);
		$sqlQuery->setNumber($matricula->alunoId);
		$sqlQuery->setNumber($matricula->turmaId);

		$id = $this->executeInsert($sqlQuery);	
		$matricula->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Matricula matricula
 	 */
	public function update($matricula){
		$campos = "";
        
        
		 if(!empty($matricula->dataMatricula)) $campos .=' data_matricula = ?,';
		 if(!empty($matricula->matricula)) $campos .=' matricula = ?,';
		 if(!empty($matricula->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($matricula->turmaId)) $campos .=' turma_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE matricula SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($matricula->dataMatricula)) 		$sqlQuery->set($matricula->dataMatricula);
		 if(!empty($matricula->matricula)) 		$sqlQuery->set($matricula->matricula);
		 if(!empty($matricula->alunoId)) 		$sqlQuery->setNumber($matricula->alunoId);
		 if(!empty($matricula->turmaId)) 		$sqlQuery->setNumber($matricula->turmaId);

		$sqlQuery->setNumber($matricula->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM matricula';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataMatricula($value){
		$sql = 'SELECT * FROM matricula WHERE data_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMatricula($value){
		$sql = 'SELECT * FROM matricula WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM matricula WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurmaId($value){
		$sql = 'SELECT * FROM matricula WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataMatricula($value){
		$sql = 'DELETE FROM matricula WHERE data_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMatricula($value){
		$sql = 'DELETE FROM matricula WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM matricula WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurmaId($value){
		$sql = 'DELETE FROM matricula WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Matricula 
	 */
	protected function readRow($row){
		$matricula = new Matricula();
		
		$matricula->id = $row['id'];
		$matricula->dataMatricula = $row['data_matricula'];
		$matricula->matricula = $row['matricula'];
		$matricula->alunoId = $row['aluno_id'];
		$matricula->turmaId = $row['turma_id'];

		return $matricula;
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
	 * @return Matricula 
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