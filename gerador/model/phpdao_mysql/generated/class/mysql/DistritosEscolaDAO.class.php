<?php
/**
 * Classe operadora da tabela 'distritos_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class DistritosEscolaDAO extends Model implements DistritosEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DistritosEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM distritos_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DistritosEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM distritos_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM distritos_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM distritos_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param distritosEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM distritos_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DistritosEscola distritosEscola
 	 */
	public function insert($distritosEscola){
		$sql = 'INSERT INTO distritos_escola (escola_id, distritos_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($distritosEscola->escolaId);
		$sqlQuery->setNumber($distritosEscola->distritosMecId);

		$id = $this->executeInsert($sqlQuery);	
		$distritosEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DistritosEscola distritosEscola
 	 */
	public function update($distritosEscola){
		$campos = "";
        
        
		 if(!empty($distritosEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($distritosEscola->distritosMecId)) $campos .=' distritos_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE distritos_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($distritosEscola->escolaId)) 		$sqlQuery->setNumber($distritosEscola->escolaId);
		 if(!empty($distritosEscola->distritosMecId)) 		$sqlQuery->setNumber($distritosEscola->distritosMecId);

		$sqlQuery->setNumber($distritosEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM distritos_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM distritos_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDistritosMecId($value){
		$sql = 'SELECT * FROM distritos_escola WHERE distritos_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM distritos_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDistritosMecId($value){
		$sql = 'DELETE FROM distritos_escola WHERE distritos_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return DistritosEscola 
	 */
	protected function readRow($row){
		$distritosEscola = new DistritosEscola();
		
		$distritosEscola->id = $row['id'];
		$distritosEscola->escolaId = $row['escola_id'];
		$distritosEscola->distritosMecId = $row['distritos_mec_id'];

		return $distritosEscola;
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
	 * @return DistritosEscola 
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