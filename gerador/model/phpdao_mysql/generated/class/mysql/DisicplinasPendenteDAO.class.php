<?php
/**
 * Classe operadora da tabela 'disicplinas_pendente'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-02-22 09:07
 */
class DisicplinasPendenteDAO extends Model implements DisicplinasPendenteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisicplinasPendente 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disicplinas_pendente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisicplinasPendente      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM disicplinas_pendente '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM disicplinas_pendente '.$criterio.'';
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
		$sql = 'SELECT * FROM disicplinas_pendente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param disicplinasPendente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM disicplinas_pendente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisicplinasPendente disicplinasPendente
 	 */
	public function insert($disicplinasPendente){
		$sql = 'INSERT INTO disicplinas_pendente (transferencia_id, disciplina_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($disicplinasPendente->transferenciaId);
		$sqlQuery->setNumber($disicplinasPendente->disciplinaId);

		$id = $this->executeInsert($sqlQuery);	
		$disicplinasPendente->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisicplinasPendente disicplinasPendente
 	 */
	public function update($disicplinasPendente){
		$campos = "";
        
        
		 if(!empty($disicplinasPendente->transferenciaId)) $campos .=' transferencia_id = ?,';
		 if(!empty($disicplinasPendente->disciplinaId)) $campos .=' disciplina_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE disicplinas_pendente SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($disicplinasPendente->transferenciaId)) 		$sqlQuery->setNumber($disicplinasPendente->transferenciaId);
		 if(!empty($disicplinasPendente->disciplinaId)) 		$sqlQuery->setNumber($disicplinasPendente->disciplinaId);

		$sqlQuery->setNumber($disicplinasPendente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM disicplinas_pendente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTransferenciaId($value){
		$sql = 'SELECT * FROM disicplinas_pendente WHERE transferencia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinaId($value){
		$sql = 'SELECT * FROM disicplinas_pendente WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTransferenciaId($value){
		$sql = 'DELETE FROM disicplinas_pendente WHERE transferencia_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinaId($value){
		$sql = 'DELETE FROM disicplinas_pendente WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return DisicplinasPendente 
	 */
	protected function readRow($row){
		$disicplinasPendente = new DisicplinasPendente();
		
		$disicplinasPendente->id = $row['id'];
		$disicplinasPendente->transferenciaId = $row['transferencia_id'];
		$disicplinasPendente->disciplinaId = $row['disciplina_id'];

		return $disicplinasPendente;
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
	 * @return DisicplinasPendente 
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