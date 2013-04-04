<?php
/**
 * Classe operadora da tabela 'subcategoria'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-07-02 08:49
 */
class SubcategoriaDAO extends Model implements SubcategoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Subcategoria 
	 */
	public function load($id){
		$sql = 'SELECT * FROM subcategoria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Subcategoria      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM subcategoria '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM subcategoria '.$criterio.'';
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
		$sql = 'SELECT * FROM subcategoria ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param subcategoria primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM subcategoria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Subcategoria subcategoria
 	 */
	public function insert($subcategoria){
		$sql = 'INSERT INTO subcategoria (categoria_id, nome, descricao, url, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($subcategoria->categoriaId);
		$sqlQuery->set($subcategoria->nome);
		$sqlQuery->set($subcategoria->descricao);
		$sqlQuery->set($subcategoria->url);
		$sqlQuery->set($subcategoria->created);
		$sqlQuery->set($subcategoria->status);

		$id = $this->executeInsert($sqlQuery);	
		$subcategoria->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Subcategoria subcategoria
 	 */
	public function update($subcategoria){
		$campos = "";
        
        
		 if(!empty($subcategoria->categoriaId)) $campos .=' categoria_id = ?,';
		 if(!empty($subcategoria->nome)) $campos .=' nome = ?,';
		 if(!empty($subcategoria->descricao)) $campos .=' descricao = ?,';
		 if(!empty($subcategoria->url)) $campos .=' url = ?,';
		 if(!empty($subcategoria->created)) $campos .=' created = ?,';
		 if(!empty($subcategoria->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE subcategoria SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($subcategoria->categoriaId)) 		$sqlQuery->setNumber($subcategoria->categoriaId);
		 if(!empty($subcategoria->nome)) 		$sqlQuery->set($subcategoria->nome);
		 if(!empty($subcategoria->descricao)) 		$sqlQuery->set($subcategoria->descricao);
		 if(!empty($subcategoria->url)) 		$sqlQuery->set($subcategoria->url);
		 if(!empty($subcategoria->created)) 		$sqlQuery->set($subcategoria->created);
		 if(!empty($subcategoria->status)) 		$sqlQuery->set($subcategoria->status);

		$sqlQuery->setNumber($subcategoria->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM subcategoria';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoriaId($value){
		$sql = 'SELECT * FROM subcategoria WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM subcategoria WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM subcategoria WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM subcategoria WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM subcategoria WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM subcategoria WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoriaId($value){
		$sql = 'DELETE FROM subcategoria WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM subcategoria WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM subcategoria WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM subcategoria WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM subcategoria WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM subcategoria WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Subcategoria 
	 */
	protected function readRow($row){
		$subcategoria = new Subcategoria();
		
		$subcategoria->id = $row['id'];
		$subcategoria->categoriaId = $row['categoria_id'];
		$subcategoria->nome = $row['nome'];
		$subcategoria->descricao = $row['descricao'];
		$subcategoria->url = $row['url'];
		$subcategoria->created = $row['created'];
		$subcategoria->status = $row['status'];

		return $subcategoria;
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
	 * @return Subcategoria 
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