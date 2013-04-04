<?php
/**
 * Classe operadora da tabela 'tipo_destaque'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class TipoDestaqueDAO extends Model implements TipoDestaqueI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TipoDestaque 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipo_destaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TipoDestaque      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipo_destaque '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipo_destaque '.$criterio.'';
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
		$sql = 'SELECT * FROM tipo_destaque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tipoDestaque primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipo_destaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TipoDestaque tipoDestaque
 	 */
	public function insert($tipoDestaque){
		$sql = 'INSERT INTO tipo_destaque (descricao, posicao, created, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipoDestaque->descricao);
		$sqlQuery->set($tipoDestaque->posicao);
		$sqlQuery->set($tipoDestaque->created);
		$sqlQuery->set($tipoDestaque->status);

		$id = $this->executeInsert($sqlQuery);	
		$tipoDestaque->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TipoDestaque tipoDestaque
 	 */
	public function update($tipoDestaque){
		$campos = "";
        
        
		 if(!empty($tipoDestaque->descricao)) $campos .=' descricao = ?,';
		 if(!empty($tipoDestaque->posicao)) $campos .=' posicao = ?,';
		 if(!empty($tipoDestaque->created)) $campos .=' created = ?,';
		 if(!empty($tipoDestaque->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipo_destaque SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tipoDestaque->descricao)) 		$sqlQuery->set($tipoDestaque->descricao);
		 if(!empty($tipoDestaque->posicao)) 		$sqlQuery->set($tipoDestaque->posicao);
		 if(!empty($tipoDestaque->created)) 		$sqlQuery->set($tipoDestaque->created);
		 if(!empty($tipoDestaque->status)) 		$sqlQuery->set($tipoDestaque->status);

		$sqlQuery->setNumber($tipoDestaque->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipo_destaque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM tipo_destaque WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosicao($value){
		$sql = 'SELECT * FROM tipo_destaque WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM tipo_destaque WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tipo_destaque WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM tipo_destaque WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosicao($value){
		$sql = 'DELETE FROM tipo_destaque WHERE posicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM tipo_destaque WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tipo_destaque WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TipoDestaque 
	 */
	protected function readRow($row){
		$tipoDestaque = new TipoDestaque();
		
		$tipoDestaque->id = $row['id'];
		$tipoDestaque->descricao = $row['descricao'];
		$tipoDestaque->posicao = $row['posicao'];
		$tipoDestaque->created = $row['created'];
		$tipoDestaque->status = $row['status'];

		return $tipoDestaque;
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
	 * @return TipoDestaque 
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