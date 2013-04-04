<?php
/**
 * Classe operadora da tabela 'tipos_material_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposMaterialEscolaDAO extends Model implements TiposMaterialEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposMaterialEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_material_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposMaterialEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_material_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_material_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_material_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposMaterialEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_material_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposMaterialEscola tiposMaterialEscola
 	 */
	public function insert($tiposMaterialEscola){
		$sql = 'INSERT INTO tipos_material_escola (escola_id, tipos_material_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tiposMaterialEscola->escolaId);
		$sqlQuery->setNumber($tiposMaterialEscola->tiposMaterialMecId);

		$id = $this->executeInsert($sqlQuery);	
		$tiposMaterialEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposMaterialEscola tiposMaterialEscola
 	 */
	public function update($tiposMaterialEscola){
		$campos = "";
        
        
		 if(!empty($tiposMaterialEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($tiposMaterialEscola->tiposMaterialMecId)) $campos .=' tipos_material_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_material_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposMaterialEscola->escolaId)) 		$sqlQuery->setNumber($tiposMaterialEscola->escolaId);
		 if(!empty($tiposMaterialEscola->tiposMaterialMecId)) 		$sqlQuery->setNumber($tiposMaterialEscola->tiposMaterialMecId);

		$sqlQuery->setNumber($tiposMaterialEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_material_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM tipos_material_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiposMaterialMecId($value){
		$sql = 'SELECT * FROM tipos_material_escola WHERE tipos_material_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM tipos_material_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiposMaterialMecId($value){
		$sql = 'DELETE FROM tipos_material_escola WHERE tipos_material_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposMaterialEscola 
	 */
	protected function readRow($row){
		$tiposMaterialEscola = new TiposMaterialEscola();
		
		$tiposMaterialEscola->id = $row['id'];
		$tiposMaterialEscola->escolaId = $row['escola_id'];
		$tiposMaterialEscola->tiposMaterialMecId = $row['tipos_material_mec_id'];

		return $tiposMaterialEscola;
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
	 * @return TiposMaterialEscola 
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