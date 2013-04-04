<?php
/**
 * Classe operadora da tabela 'servico'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ServicoDAO extends Model implements ServicoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Servico 
	 */
	public function load($id){
		$sql = 'SELECT * FROM servico WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Servico      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM servico '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM servico '.$criterio.'';
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
		$sql = 'SELECT * FROM servico ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param servico primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM servico WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Servico servico
 	 */
	public function insert($servico){
		$sql = 'INSERT INTO servico (nome, descricao, preco, categoria_id, centro_custo_id, created, status) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($servico->nome);
		$sqlQuery->set($servico->descricao);
		$sqlQuery->set($servico->preco);
		$sqlQuery->setNumber($servico->categoriaId);
		$sqlQuery->setNumber($servico->centroCustoId);
		$sqlQuery->set($servico->created);
		$sqlQuery->set($servico->status);

		$id = $this->executeInsert($sqlQuery);	
		$servico->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Servico servico
 	 */
	public function update($servico){
		$campos = "";
        
        
		 if(!empty($servico->nome)) $campos .=' nome = ?,';
		 if(!empty($servico->descricao)) $campos .=' descricao = ?,';
		 if(!empty($servico->preco)) $campos .=' preco = ?,';
		 if(!empty($servico->categoriaId)) $campos .=' categoria_id = ?,';
		 if(!empty($servico->centroCustoId)) $campos .=' centro_custo_id = ?,';
		 if(!empty($servico->created)) $campos .=' created = ?,';
		 if(!empty($servico->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE servico SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($servico->nome)) 		$sqlQuery->set($servico->nome);
		 if(!empty($servico->descricao)) 		$sqlQuery->set($servico->descricao);
		 if(!empty($servico->preco)) 		$sqlQuery->set($servico->preco);
		 if(!empty($servico->categoriaId)) 		$sqlQuery->setNumber($servico->categoriaId);
		 if(!empty($servico->centroCustoId)) 		$sqlQuery->setNumber($servico->centroCustoId);
		 if(!empty($servico->created)) 		$sqlQuery->set($servico->created);
		 if(!empty($servico->status)) 		$sqlQuery->set($servico->status);

		$sqlQuery->setNumber($servico->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM servico';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM servico WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM servico WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreco($value){
		$sql = 'SELECT * FROM servico WHERE preco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoriaId($value){
		$sql = 'SELECT * FROM servico WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCentroCustoId($value){
		$sql = 'SELECT * FROM servico WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM servico WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM servico WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM servico WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM servico WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreco($value){
		$sql = 'DELETE FROM servico WHERE preco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoriaId($value){
		$sql = 'DELETE FROM servico WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCentroCustoId($value){
		$sql = 'DELETE FROM servico WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM servico WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM servico WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Servico 
	 */
	protected function readRow($row){
		$servico = new Servico();
		
		$servico->id = $row['id'];
		$servico->nome = $row['nome'];
		$servico->descricao = $row['descricao'];
		$servico->preco = $row['preco'];
		$servico->categoriaId = $row['categoria_id'];
		$servico->centroCustoId = $row['centro_custo_id'];
		$servico->created = $row['created'];
		$servico->status = $row['status'];

		return $servico;
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
	 * @return Servico 
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