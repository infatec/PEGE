<?php
/**
 * Classe operadora da tabela 'tipos_frequencia_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposFrequenciaEscolaDAO extends Model implements TiposFrequenciaEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposFrequenciaEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_frequencia_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposFrequenciaEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_frequencia_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_frequencia_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_frequencia_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposFrequenciaEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_frequencia_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposFrequenciaEscola tiposFrequenciaEscola
 	 */
	public function insert($tiposFrequenciaEscola){
		$sql = 'INSERT INTO tipos_frequencia_escola (escola_id, tipos_frequencia_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tiposFrequenciaEscola->escolaId);
		$sqlQuery->setNumber($tiposFrequenciaEscola->tiposFrequenciaMecId);

		$id = $this->executeInsert($sqlQuery);	
		$tiposFrequenciaEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposFrequenciaEscola tiposFrequenciaEscola
 	 */
	public function update($tiposFrequenciaEscola){
		$campos = "";
        
        
		 if(!empty($tiposFrequenciaEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($tiposFrequenciaEscola->tiposFrequenciaMecId)) $campos .=' tipos_frequencia_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_frequencia_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposFrequenciaEscola->escolaId)) 		$sqlQuery->setNumber($tiposFrequenciaEscola->escolaId);
		 if(!empty($tiposFrequenciaEscola->tiposFrequenciaMecId)) 		$sqlQuery->setNumber($tiposFrequenciaEscola->tiposFrequenciaMecId);

		$sqlQuery->setNumber($tiposFrequenciaEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_frequencia_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM tipos_frequencia_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiposFrequenciaMecId($value){
		$sql = 'SELECT * FROM tipos_frequencia_escola WHERE tipos_frequencia_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM tipos_frequencia_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiposFrequenciaMecId($value){
		$sql = 'DELETE FROM tipos_frequencia_escola WHERE tipos_frequencia_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposFrequenciaEscola 
	 */
	protected function readRow($row){
		$tiposFrequenciaEscola = new TiposFrequenciaEscola();
		
		$tiposFrequenciaEscola->id = $row['id'];
		$tiposFrequenciaEscola->escolaId = $row['escola_id'];
		$tiposFrequenciaEscola->tiposFrequenciaMecId = $row['tipos_frequencia_mec_id'];

		return $tiposFrequenciaEscola;
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
	 * @return TiposFrequenciaEscola 
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