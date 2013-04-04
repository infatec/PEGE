<?php
/**
 * Classe operadora da tabela 'solicitacao_pagseguro'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class SolicitacaoPagseguroDAO extends Model implements SolicitacaoPagseguroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return SolicitacaoPagseguro 
	 */
	public function load($id){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return SolicitacaoPagseguro      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM solicitacao_pagseguro '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM solicitacao_pagseguro '.$criterio.'';
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
		$sql = 'SELECT * FROM solicitacao_pagseguro ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param solicitacaoPagseguro primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param SolicitacaoPagseguro solicitacaoPagseguro
 	 */
	public function insert($solicitacaoPagseguro){
		$sql = 'INSERT INTO solicitacao_pagseguro (cliente_id, transacaoid, tipo_pagamento, data_transacao, status_transacao, produtoid, descricao_produto, valor_prod) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($solicitacaoPagseguro->clienteId);
		$sqlQuery->set($solicitacaoPagseguro->transacaoid);
		$sqlQuery->set($solicitacaoPagseguro->tipoPagamento);
		$sqlQuery->set($solicitacaoPagseguro->dataTransacao);
		$sqlQuery->set($solicitacaoPagseguro->statusTransacao);
		$sqlQuery->set($solicitacaoPagseguro->produtoid);
		$sqlQuery->set($solicitacaoPagseguro->descricaoProduto);
		$sqlQuery->set($solicitacaoPagseguro->valorProd);

		$id = $this->executeInsert($sqlQuery);	
		$solicitacaoPagseguro->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param SolicitacaoPagseguro solicitacaoPagseguro
 	 */
	public function update($solicitacaoPagseguro){
		$campos = "";
        
        
		 if(!empty($solicitacaoPagseguro->clienteId)) $campos .=' cliente_id = ?,';
		 if(!empty($solicitacaoPagseguro->transacaoid)) $campos .=' transacaoid = ?,';
		 if(!empty($solicitacaoPagseguro->tipoPagamento)) $campos .=' tipo_pagamento = ?,';
		 if(!empty($solicitacaoPagseguro->dataTransacao)) $campos .=' data_transacao = ?,';
		 if(!empty($solicitacaoPagseguro->statusTransacao)) $campos .=' status_transacao = ?,';
		 if(!empty($solicitacaoPagseguro->produtoid)) $campos .=' produtoid = ?,';
		 if(!empty($solicitacaoPagseguro->descricaoProduto)) $campos .=' descricao_produto = ?,';
		 if(!empty($solicitacaoPagseguro->valorProd)) $campos .=' valor_prod = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE solicitacao_pagseguro SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($solicitacaoPagseguro->clienteId)) 		$sqlQuery->setNumber($solicitacaoPagseguro->clienteId);
		 if(!empty($solicitacaoPagseguro->transacaoid)) 		$sqlQuery->set($solicitacaoPagseguro->transacaoid);
		 if(!empty($solicitacaoPagseguro->tipoPagamento)) 		$sqlQuery->set($solicitacaoPagseguro->tipoPagamento);
		 if(!empty($solicitacaoPagseguro->dataTransacao)) 		$sqlQuery->set($solicitacaoPagseguro->dataTransacao);
		 if(!empty($solicitacaoPagseguro->statusTransacao)) 		$sqlQuery->set($solicitacaoPagseguro->statusTransacao);
		 if(!empty($solicitacaoPagseguro->produtoid)) 		$sqlQuery->set($solicitacaoPagseguro->produtoid);
		 if(!empty($solicitacaoPagseguro->descricaoProduto)) 		$sqlQuery->set($solicitacaoPagseguro->descricaoProduto);
		 if(!empty($solicitacaoPagseguro->valorProd)) 		$sqlQuery->set($solicitacaoPagseguro->valorProd);

		$sqlQuery->setNumber($solicitacaoPagseguro->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM solicitacao_pagseguro';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByClienteId($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE cliente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTransacaoid($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE transacaoid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoPagamento($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE tipo_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataTransacao($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE data_transacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatusTransacao($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE status_transacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProdutoid($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE produtoid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricaoProduto($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE descricao_produto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorProd($value){
		$sql = 'SELECT * FROM solicitacao_pagseguro WHERE valor_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByClienteId($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE cliente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTransacaoid($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE transacaoid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoPagamento($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE tipo_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataTransacao($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE data_transacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusTransacao($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE status_transacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProdutoid($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE produtoid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricaoProduto($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE descricao_produto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorProd($value){
		$sql = 'DELETE FROM solicitacao_pagseguro WHERE valor_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return SolicitacaoPagseguro 
	 */
	protected function readRow($row){
		$solicitacaoPagseguro = new SolicitacaoPagseguro();
		
		$solicitacaoPagseguro->id = $row['id'];
		$solicitacaoPagseguro->clienteId = $row['cliente_id'];
		$solicitacaoPagseguro->transacaoid = $row['transacaoid'];
		$solicitacaoPagseguro->tipoPagamento = $row['tipo_pagamento'];
		$solicitacaoPagseguro->dataTransacao = $row['data_transacao'];
		$solicitacaoPagseguro->statusTransacao = $row['status_transacao'];
		$solicitacaoPagseguro->produtoid = $row['produtoid'];
		$solicitacaoPagseguro->descricaoProduto = $row['descricao_produto'];
		$solicitacaoPagseguro->valorProd = $row['valor_prod'];

		return $solicitacaoPagseguro;
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
	 * @return SolicitacaoPagseguro 
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