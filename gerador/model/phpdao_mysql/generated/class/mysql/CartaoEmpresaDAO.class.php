<?php
/**
 * Classe operadora da tabela 'cartao_empresa'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class CartaoEmpresaDAO extends Model implements CartaoEmpresaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CartaoEmpresa 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cartao_empresa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CartaoEmpresa      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cartao_empresa '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cartao_empresa '.$criterio.'';
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
		$sql = 'SELECT * FROM cartao_empresa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param cartaoEmpresa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cartao_empresa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CartaoEmpresa cartaoEmpresa
 	 */
	public function insert($cartaoEmpresa){
		$sql = 'INSERT INTO cartao_empresa (cartao_id, descricao, created, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cartaoEmpresa->cartaoId);
		$sqlQuery->set($cartaoEmpresa->descricao);
		$sqlQuery->set($cartaoEmpresa->created);
		$sqlQuery->set($cartaoEmpresa->status);

		$id = $this->executeInsert($sqlQuery);	
		$cartaoEmpresa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CartaoEmpresa cartaoEmpresa
 	 */
	public function update($cartaoEmpresa){
		$campos = "";
        
        
		 if(!empty($cartaoEmpresa->cartaoId)) $campos .=' cartao_id = ?,';
		 if(!empty($cartaoEmpresa->descricao)) $campos .=' descricao = ?,';
		 if(!empty($cartaoEmpresa->created)) $campos .=' created = ?,';
		 if(!empty($cartaoEmpresa->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cartao_empresa SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($cartaoEmpresa->cartaoId)) 		$sqlQuery->setNumber($cartaoEmpresa->cartaoId);
		 if(!empty($cartaoEmpresa->descricao)) 		$sqlQuery->set($cartaoEmpresa->descricao);
		 if(!empty($cartaoEmpresa->created)) 		$sqlQuery->set($cartaoEmpresa->created);
		 if(!empty($cartaoEmpresa->status)) 		$sqlQuery->set($cartaoEmpresa->status);

		$sqlQuery->setNumber($cartaoEmpresa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cartao_empresa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCartaoId($value){
		$sql = 'SELECT * FROM cartao_empresa WHERE cartao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM cartao_empresa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM cartao_empresa WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM cartao_empresa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCartaoId($value){
		$sql = 'DELETE FROM cartao_empresa WHERE cartao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM cartao_empresa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM cartao_empresa WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cartao_empresa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CartaoEmpresa 
	 */
	protected function readRow($row){
		$cartaoEmpresa = new CartaoEmpresa();
		
		$cartaoEmpresa->id = $row['id'];
		$cartaoEmpresa->cartaoId = $row['cartao_id'];
		$cartaoEmpresa->descricao = $row['descricao'];
		$cartaoEmpresa->created = $row['created'];
		$cartaoEmpresa->status = $row['status'];

		return $cartaoEmpresa;
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
	 * @return CartaoEmpresa 
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