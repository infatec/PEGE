<?php
/**
 * Classe operadora da tabela 'falta_aluno'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class FaltaAlunoDAO extends Model implements FaltaAlunoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FaltaAluno 
	 */
	public function load($id){
		$sql = 'SELECT * FROM falta_aluno WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FaltaAluno      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM falta_aluno '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM falta_aluno '.$criterio.'';
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
		$sql = 'SELECT * FROM falta_aluno ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param faltaAluno primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM falta_aluno WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FaltaAluno faltaAluno
 	 */
	public function insert($faltaAluno){
		$sql = 'INSERT INTO falta_aluno (aula_id, matricula_id, aula) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($faltaAluno->aulaId);
		$sqlQuery->setNumber($faltaAluno->matriculaId);
		$sqlQuery->setNumber($faltaAluno->aula);

		$id = $this->executeInsert($sqlQuery);	
		$faltaAluno->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FaltaAluno faltaAluno
 	 */
	public function update($faltaAluno){
		$campos = "";
        
        
		 if(!empty($faltaAluno->aulaId)) $campos .=' aula_id = ?,';
		 if(!empty($faltaAluno->matriculaId)) $campos .=' matricula_id = ?,';
		 if(!empty($faltaAluno->aula)) $campos .=' aula = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE falta_aluno SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($faltaAluno->aulaId)) 		$sqlQuery->setNumber($faltaAluno->aulaId);
		 if(!empty($faltaAluno->matriculaId)) 		$sqlQuery->setNumber($faltaAluno->matriculaId);
		 if(!empty($faltaAluno->aula)) 		$sqlQuery->setNumber($faltaAluno->aula);

		$sqlQuery->setNumber($faltaAluno->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM falta_aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAulaId($value){
		$sql = 'SELECT * FROM falta_aluno WHERE aula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMatriculaId($value){
		$sql = 'SELECT * FROM falta_aluno WHERE matricula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAula($value){
		$sql = 'SELECT * FROM falta_aluno WHERE aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAulaId($value){
		$sql = 'DELETE FROM falta_aluno WHERE aula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMatriculaId($value){
		$sql = 'DELETE FROM falta_aluno WHERE matricula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAula($value){
		$sql = 'DELETE FROM falta_aluno WHERE aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return FaltaAluno 
	 */
	protected function readRow($row){
		$faltaAluno = new FaltaAluno();
		
		$faltaAluno->id = $row['id'];
		$faltaAluno->aulaId = $row['aula_id'];
		$faltaAluno->matriculaId = $row['matricula_id'];
		$faltaAluno->aula = $row['aula'];

		return $faltaAluno;
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
	 * @return FaltaAluno 
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