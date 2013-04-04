<?php
/**
 * Classe operadora da tabela 'forma_pagamento'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class FormaPagamentoDAO extends Model implements FormaPagamentoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FormaPagamento 
	 */
	public function load($id){
		$sql = 'SELECT * FROM forma_pagamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FormaPagamento      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM forma_pagamento '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM forma_pagamento '.$criterio.'';
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
		$sql = 'SELECT * FROM forma_pagamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param formaPagamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM forma_pagamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FormaPagamento formaPagamento
 	 */
	public function insert($formaPagamento){
		$sql = 'INSERT INTO forma_pagamento (descricao, caixa, negociacao, created, status, cartao, cheque) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($formaPagamento->descricao);
		$sqlQuery->set($formaPagamento->caixa);
		$sqlQuery->set($formaPagamento->negociacao);
		$sqlQuery->set($formaPagamento->created);
		$sqlQuery->set($formaPagamento->status);
		$sqlQuery->setNumber($formaPagamento->cartao);
		$sqlQuery->setNumber($formaPagamento->cheque);

		$id = $this->executeInsert($sqlQuery);	
		$formaPagamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FormaPagamento formaPagamento
 	 */
	public function update($formaPagamento){
		$campos = "";
        
        
		 if(!empty($formaPagamento->descricao)) $campos .=' descricao = ?,';
		 if(!empty($formaPagamento->caixa)) $campos .=' caixa = ?,';
		 if(!empty($formaPagamento->negociacao)) $campos .=' negociacao = ?,';
		 if(!empty($formaPagamento->created)) $campos .=' created = ?,';
		 if(!empty($formaPagamento->status)) $campos .=' status = ?,';
		 if(!empty($formaPagamento->cartao)) $campos .=' cartao = ?,';
		 if(!empty($formaPagamento->cheque)) $campos .=' cheque = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE forma_pagamento SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($formaPagamento->descricao)) 		$sqlQuery->set($formaPagamento->descricao);
		 if(!empty($formaPagamento->caixa)) 		$sqlQuery->set($formaPagamento->caixa);
		 if(!empty($formaPagamento->negociacao)) 		$sqlQuery->set($formaPagamento->negociacao);
		 if(!empty($formaPagamento->created)) 		$sqlQuery->set($formaPagamento->created);
		 if(!empty($formaPagamento->status)) 		$sqlQuery->set($formaPagamento->status);
		 if(!empty($formaPagamento->cartao)) 		$sqlQuery->setNumber($formaPagamento->cartao);
		 if(!empty($formaPagamento->cheque)) 		$sqlQuery->setNumber($formaPagamento->cheque);

		$sqlQuery->setNumber($formaPagamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM forma_pagamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixa($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE caixa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNegociacao($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE negociacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartao($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE cartao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCheque($value){
		$sql = 'SELECT * FROM forma_pagamento WHERE cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM forma_pagamento WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixa($value){
		$sql = 'DELETE FROM forma_pagamento WHERE caixa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNegociacao($value){
		$sql = 'DELETE FROM forma_pagamento WHERE negociacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM forma_pagamento WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM forma_pagamento WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartao($value){
		$sql = 'DELETE FROM forma_pagamento WHERE cartao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCheque($value){
		$sql = 'DELETE FROM forma_pagamento WHERE cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return FormaPagamento 
	 */
	protected function readRow($row){
		$formaPagamento = new FormaPagamento();
		
		$formaPagamento->id = $row['id'];
		$formaPagamento->descricao = $row['descricao'];
		$formaPagamento->caixa = $row['caixa'];
		$formaPagamento->negociacao = $row['negociacao'];
		$formaPagamento->created = $row['created'];
		$formaPagamento->status = $row['status'];
		$formaPagamento->cartao = $row['cartao'];
		$formaPagamento->cheque = $row['cheque'];

		return $formaPagamento;
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
	 * @return FormaPagamento 
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