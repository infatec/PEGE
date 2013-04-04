<?php
/**
 * Classe operadora da tabela 'disciplinas_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class DisciplinasEscolaDAO extends Model implements DisciplinasEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisciplinasEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disciplinas_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisciplinasEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM disciplinas_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM disciplinas_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM disciplinas_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param disciplinasEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM disciplinas_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisciplinasEscola disciplinasEscola
 	 */
	public function insert($disciplinasEscola){
		$sql = 'INSERT INTO disciplinas_escola (escola_id, disciplinas_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($disciplinasEscola->escolaId);
		$sqlQuery->setNumber($disciplinasEscola->disciplinasMecId);

		$id = $this->executeInsert($sqlQuery);	
		$disciplinasEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisciplinasEscola disciplinasEscola
 	 */
	public function update($disciplinasEscola){
		$campos = "";
        
        
		 if(!empty($disciplinasEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($disciplinasEscola->disciplinasMecId)) $campos .=' disciplinas_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE disciplinas_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($disciplinasEscola->escolaId)) 		$sqlQuery->setNumber($disciplinasEscola->escolaId);
		 if(!empty($disciplinasEscola->disciplinasMecId)) 		$sqlQuery->setNumber($disciplinasEscola->disciplinasMecId);

		$sqlQuery->setNumber($disciplinasEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM disciplinas_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM disciplinas_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinasMecId($value){
		$sql = 'SELECT * FROM disciplinas_escola WHERE disciplinas_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM disciplinas_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinasMecId($value){
		$sql = 'DELETE FROM disciplinas_escola WHERE disciplinas_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return DisciplinasEscola 
	 */
	protected function readRow($row){
		$disciplinasEscola = new DisciplinasEscola();
		
		$disciplinasEscola->id = $row['id'];
		$disciplinasEscola->escolaId = $row['escola_id'];
		$disciplinasEscola->disciplinasMecId = $row['disciplinas_mec_id'];

		return $disciplinasEscola;
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
	 * @return DisciplinasEscola 
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