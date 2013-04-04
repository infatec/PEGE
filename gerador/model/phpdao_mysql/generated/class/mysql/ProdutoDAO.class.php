<?php
/**
 * Classe operadora da tabela 'produto'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ProdutoDAO extends Model implements ProdutoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Produto 
	 */
	public function load($id){
		$sql = 'SELECT * FROM produto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Produto      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM produto '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM produto '.$criterio.'';
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
		$sql = 'SELECT * FROM produto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param produto primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM produto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Produto produto
 	 */
	public function insert($produto){
		$sql = 'INSERT INTO produto (fornecedor_id, categoria_id, centro_custo_id, codigo, nome, descricao, preco_venda, preco_custo, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($produto->fornecedorId);
		$sqlQuery->setNumber($produto->categoriaId);
		$sqlQuery->setNumber($produto->centroCustoId);
		$sqlQuery->set($produto->codigo);
		$sqlQuery->set($produto->nome);
		$sqlQuery->set($produto->descricao);
		$sqlQuery->set($produto->precoVenda);
		$sqlQuery->set($produto->precoCusto);
		$sqlQuery->set($produto->created);
		$sqlQuery->set($produto->status);

		$id = $this->executeInsert($sqlQuery);	
		$produto->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Produto produto
 	 */
	public function update($produto){
		$campos = "";
        
        
		 if(!empty($produto->fornecedorId)) $campos .=' fornecedor_id = ?,';
		 if(!empty($produto->categoriaId)) $campos .=' categoria_id = ?,';
		 if(!empty($produto->centroCustoId)) $campos .=' centro_custo_id = ?,';
		 if(!empty($produto->codigo)) $campos .=' codigo = ?,';
		 if(!empty($produto->nome)) $campos .=' nome = ?,';
		 if(!empty($produto->descricao)) $campos .=' descricao = ?,';
		 if(!empty($produto->precoVenda)) $campos .=' preco_venda = ?,';
		 if(!empty($produto->precoCusto)) $campos .=' preco_custo = ?,';
		 if(!empty($produto->created)) $campos .=' created = ?,';
		 if(!empty($produto->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE produto SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($produto->fornecedorId)) 		$sqlQuery->setNumber($produto->fornecedorId);
		 if(!empty($produto->categoriaId)) 		$sqlQuery->setNumber($produto->categoriaId);
		 if(!empty($produto->centroCustoId)) 		$sqlQuery->setNumber($produto->centroCustoId);
		 if(!empty($produto->codigo)) 		$sqlQuery->set($produto->codigo);
		 if(!empty($produto->nome)) 		$sqlQuery->set($produto->nome);
		 if(!empty($produto->descricao)) 		$sqlQuery->set($produto->descricao);
		 if(!empty($produto->precoVenda)) 		$sqlQuery->set($produto->precoVenda);
		 if(!empty($produto->precoCusto)) 		$sqlQuery->set($produto->precoCusto);
		 if(!empty($produto->created)) 		$sqlQuery->set($produto->created);
		 if(!empty($produto->status)) 		$sqlQuery->set($produto->status);

		$sqlQuery->setNumber($produto->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM produto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFornecedorId($value){
		$sql = 'SELECT * FROM produto WHERE fornecedor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoriaId($value){
		$sql = 'SELECT * FROM produto WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCentroCustoId($value){
		$sql = 'SELECT * FROM produto WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM produto WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM produto WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM produto WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecoVenda($value){
		$sql = 'SELECT * FROM produto WHERE preco_venda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecoCusto($value){
		$sql = 'SELECT * FROM produto WHERE preco_custo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM produto WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM produto WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFornecedorId($value){
		$sql = 'DELETE FROM produto WHERE fornecedor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoriaId($value){
		$sql = 'DELETE FROM produto WHERE categoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCentroCustoId($value){
		$sql = 'DELETE FROM produto WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM produto WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM produto WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM produto WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecoVenda($value){
		$sql = 'DELETE FROM produto WHERE preco_venda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecoCusto($value){
		$sql = 'DELETE FROM produto WHERE preco_custo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM produto WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM produto WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Produto 
	 */
	protected function readRow($row){
		$produto = new Produto();
		
		$produto->id = $row['id'];
		$produto->fornecedorId = $row['fornecedor_id'];
		$produto->categoriaId = $row['categoria_id'];
		$produto->centroCustoId = $row['centro_custo_id'];
		$produto->codigo = $row['codigo'];
		$produto->nome = $row['nome'];
		$produto->descricao = $row['descricao'];
		$produto->precoVenda = $row['preco_venda'];
		$produto->precoCusto = $row['preco_custo'];
		$produto->created = $row['created'];
		$produto->status = $row['status'];

		return $produto;
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
	 * @return Produto 
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