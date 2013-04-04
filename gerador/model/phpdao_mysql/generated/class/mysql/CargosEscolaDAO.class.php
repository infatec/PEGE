<?php
/**
 * Classe operadora da tabela 'cargos_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class CargosEscolaDAO extends Model implements CargosEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CargosEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cargos_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CargosEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cargos_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cargos_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM cargos_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param cargosEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cargos_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CargosEscola cargosEscola
 	 */
	public function insert($cargosEscola){
		$sql = 'INSERT INTO cargos_escola (escola_id, cargos_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cargosEscola->escolaId);
		$sqlQuery->setNumber($cargosEscola->cargosMecId);

		$id = $this->executeInsert($sqlQuery);	
		$cargosEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CargosEscola cargosEscola
 	 */
	public function update($cargosEscola){
		$campos = "";
        
        
		 if(!empty($cargosEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($cargosEscola->cargosMecId)) $campos .=' cargos_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cargos_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($cargosEscola->escolaId)) 		$sqlQuery->setNumber($cargosEscola->escolaId);
		 if(!empty($cargosEscola->cargosMecId)) 		$sqlQuery->setNumber($cargosEscola->cargosMecId);

		$sqlQuery->setNumber($cargosEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cargos_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM cargos_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargosMecId($value){
		$sql = 'SELECT * FROM cargos_escola WHERE cargos_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM cargos_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargosMecId($value){
		$sql = 'DELETE FROM cargos_escola WHERE cargos_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CargosEscola 
	 */
	protected function readRow($row){
		$cargosEscola = new CargosEscola();
		
		$cargosEscola->id = $row['id'];
		$cargosEscola->escolaId = $row['escola_id'];
		$cargosEscola->cargosMecId = $row['cargos_mec_id'];

		return $cargosEscola;
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
	 * @return CargosEscola 
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