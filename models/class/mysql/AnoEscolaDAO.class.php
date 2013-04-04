<?php
/**
 * Classe operadora da tabela 'ano_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class AnoEscolaDAO extends Model implements AnoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AnoEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ano_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AnoEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM ano_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM ano_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM ano_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param anoEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ano_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AnoEscola anoEscola
 	 */
	public function insert($anoEscola){
		$sql = 'INSERT INTO ano_escola (escola_id, ano_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anoEscola->escolaId);
		$sqlQuery->setNumber($anoEscola->anoId);

		$id = $this->executeInsert($sqlQuery);	
		$anoEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AnoEscola anoEscola
 	 */
	public function update($anoEscola){
		$campos = "";
        
        
		 if(!empty($anoEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($anoEscola->anoId)) $campos .=' ano_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE ano_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($anoEscola->escolaId)) 		$sqlQuery->setNumber($anoEscola->escolaId);
		 if(!empty($anoEscola->anoId)) 		$sqlQuery->setNumber($anoEscola->anoId);

		$sqlQuery->setNumber($anoEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM ano_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM ano_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnoId($value){
		$sql = 'SELECT * FROM ano_escola WHERE ano_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM ano_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnoId($value){
		$sql = 'DELETE FROM ano_escola WHERE ano_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return AnoEscola 
	 */
	protected function readRow($row){
		$anoEscola = new AnoEscola();
		
		$anoEscola->id = $row['id'];
		$anoEscola->escolaId = $row['escola_id'];
		$anoEscola->anoId = $row['ano_id'];

		return $anoEscola;
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
	 * @return AnoEscola 
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