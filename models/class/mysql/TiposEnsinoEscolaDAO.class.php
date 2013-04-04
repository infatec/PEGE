<?php
/**
 * Classe operadora da tabela 'tipos_ensino_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposEnsinoEscolaDAO extends Model implements TiposEnsinoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposEnsinoEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_ensino_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposEnsinoEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_ensino_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_ensino_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_ensino_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposEnsinoEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_ensino_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposEnsinoEscola tiposEnsinoEscola
 	 */
	public function insert($tiposEnsinoEscola){
		$sql = 'INSERT INTO tipos_ensino_escola (tipos_ensino_mec_id, escola_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tiposEnsinoEscola->tiposEnsinoMecId);
		$sqlQuery->setNumber($tiposEnsinoEscola->escolaId);

		$id = $this->executeInsert($sqlQuery);	
		$tiposEnsinoEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposEnsinoEscola tiposEnsinoEscola
 	 */
	public function update($tiposEnsinoEscola){
		$campos = "";
        
        
		 if(!empty($tiposEnsinoEscola->tiposEnsinoMecId)) $campos .=' tipos_ensino_mec_id = ?,';
		 if(!empty($tiposEnsinoEscola->escolaId)) $campos .=' escola_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_ensino_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposEnsinoEscola->tiposEnsinoMecId)) 		$sqlQuery->setNumber($tiposEnsinoEscola->tiposEnsinoMecId);
		 if(!empty($tiposEnsinoEscola->escolaId)) 		$sqlQuery->setNumber($tiposEnsinoEscola->escolaId);

		$sqlQuery->setNumber($tiposEnsinoEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_ensino_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTiposEnsinoMecId($value){
		$sql = 'SELECT * FROM tipos_ensino_escola WHERE tipos_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM tipos_ensino_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTiposEnsinoMecId($value){
		$sql = 'DELETE FROM tipos_ensino_escola WHERE tipos_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM tipos_ensino_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposEnsinoEscola 
	 */
	protected function readRow($row){
		$tiposEnsinoEscola = new TiposEnsinoEscola();
		
		$tiposEnsinoEscola->id = $row['id'];
		$tiposEnsinoEscola->tiposEnsinoMecId = $row['tipos_ensino_mec_id'];
		$tiposEnsinoEscola->escolaId = $row['escola_id'];

		return $tiposEnsinoEscola;
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
	 * @return TiposEnsinoEscola 
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