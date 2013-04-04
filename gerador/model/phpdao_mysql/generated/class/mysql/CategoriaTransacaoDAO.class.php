<?php
/**
 * Classe operadora da tabela 'categoria_transacao'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class CategoriaTransacaoDAO extends Model implements CategoriaTransacaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CategoriaTransacao 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categoria_transacao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CategoriaTransacao      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM categoria_transacao '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM categoria_transacao '.$criterio.'';
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
		$sql = 'SELECT * FROM categoria_transacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param categoriaTransacao primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM categoria_transacao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CategoriaTransacao categoriaTransacao
 	 */
	public function insert($categoriaTransacao){
		$sql = 'INSERT INTO categoria_transacao (descricao, tipo, created, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categoriaTransacao->descricao);
		$sqlQuery->set($categoriaTransacao->tipo);
		$sqlQuery->set($categoriaTransacao->created);
		$sqlQuery->setNumber($categoriaTransacao->status);

		$id = $this->executeInsert($sqlQuery);	
		$categoriaTransacao->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CategoriaTransacao categoriaTransacao
 	 */
	public function update($categoriaTransacao){
		$campos = "";
        
        
		 if(!empty($categoriaTransacao->descricao)) $campos .=' descricao = ?,';
		 if(!empty($categoriaTransacao->tipo)) $campos .=' tipo = ?,';
		 if(!empty($categoriaTransacao->created)) $campos .=' created = ?,';
		 if(!empty($categoriaTransacao->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE categoria_transacao SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($categoriaTransacao->descricao)) 		$sqlQuery->set($categoriaTransacao->descricao);
		 if(!empty($categoriaTransacao->tipo)) 		$sqlQuery->set($categoriaTransacao->tipo);
		 if(!empty($categoriaTransacao->created)) 		$sqlQuery->set($categoriaTransacao->created);
		 if(!empty($categoriaTransacao->status)) 		$sqlQuery->setNumber($categoriaTransacao->status);

		$sqlQuery->setNumber($categoriaTransacao->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM categoria_transacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM categoria_transacao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM categoria_transacao WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM categoria_transacao WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM categoria_transacao WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM categoria_transacao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM categoria_transacao WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM categoria_transacao WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM categoria_transacao WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CategoriaTransacao 
	 */
	protected function readRow($row){
		$categoriaTransacao = new CategoriaTransacao();
		
		$categoriaTransacao->id = $row['id'];
		$categoriaTransacao->descricao = $row['descricao'];
		$categoriaTransacao->tipo = $row['tipo'];
		$categoriaTransacao->created = $row['created'];
		$categoriaTransacao->status = $row['status'];

		return $categoriaTransacao;
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
	 * @return CategoriaTransacao 
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