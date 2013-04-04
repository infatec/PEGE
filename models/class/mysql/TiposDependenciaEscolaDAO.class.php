<?php
/**
 * Classe operadora da tabela 'tipos_dependencia_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposDependenciaEscolaDAO extends Model implements TiposDependenciaEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposDependenciaEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_dependencia_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposDependenciaEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_dependencia_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_dependencia_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_dependencia_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposDependenciaEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_dependencia_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposDependenciaEscola tiposDependenciaEscola
 	 */
	public function insert($tiposDependenciaEscola){
		$sql = 'INSERT INTO tipos_dependencia_escola (escola_id, tipos_dependencia_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tiposDependenciaEscola->escolaId);
		$sqlQuery->setNumber($tiposDependenciaEscola->tiposDependenciaMecId);

		$id = $this->executeInsert($sqlQuery);	
		$tiposDependenciaEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposDependenciaEscola tiposDependenciaEscola
 	 */
	public function update($tiposDependenciaEscola){
		$campos = "";
        
        
		 if(!empty($tiposDependenciaEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($tiposDependenciaEscola->tiposDependenciaMecId)) $campos .=' tipos_dependencia_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_dependencia_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposDependenciaEscola->escolaId)) 		$sqlQuery->setNumber($tiposDependenciaEscola->escolaId);
		 if(!empty($tiposDependenciaEscola->tiposDependenciaMecId)) 		$sqlQuery->setNumber($tiposDependenciaEscola->tiposDependenciaMecId);

		$sqlQuery->setNumber($tiposDependenciaEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_dependencia_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM tipos_dependencia_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiposDependenciaMecId($value){
		$sql = 'SELECT * FROM tipos_dependencia_escola WHERE tipos_dependencia_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM tipos_dependencia_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiposDependenciaMecId($value){
		$sql = 'DELETE FROM tipos_dependencia_escola WHERE tipos_dependencia_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposDependenciaEscola 
	 */
	protected function readRow($row){
		$tiposDependenciaEscola = new TiposDependenciaEscola();
		
		$tiposDependenciaEscola->id = $row['id'];
		$tiposDependenciaEscola->escolaId = $row['escola_id'];
		$tiposDependenciaEscola->tiposDependenciaMecId = $row['tipos_dependencia_mec_id'];

		return $tiposDependenciaEscola;
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
	 * @return TiposDependenciaEscola 
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