<?php
/**
 * Classe operadora da tabela 'movimento_cheque'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class MovimentoChequeDAO extends Model implements MovimentoChequeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return MovimentoCheque 
	 */
	public function load($id){
		$sql = 'SELECT * FROM movimento_cheque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return MovimentoCheque      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM movimento_cheque '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM movimento_cheque '.$criterio.'';
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
		$sql = 'SELECT * FROM movimento_cheque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param movimentoCheque primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM movimento_cheque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param MovimentoCheque movimentoCheque
 	 */
	public function insert($movimentoCheque){
		$sql = 'INSERT INTO movimento_cheque (data_movimento, cheque_conta_receber_id, situacao_cheque_id, caixa_id, cancelado, cheque_conta_pagar_id) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($movimentoCheque->dataMovimento);
		$sqlQuery->setNumber($movimentoCheque->chequeContaReceberId);
		$sqlQuery->setNumber($movimentoCheque->situacaoChequeId);
		$sqlQuery->setNumber($movimentoCheque->caixaId);
		$sqlQuery->setNumber($movimentoCheque->cancelado);
		$sqlQuery->setNumber($movimentoCheque->chequeContaPagarId);

		$id = $this->executeInsert($sqlQuery);	
		$movimentoCheque->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param MovimentoCheque movimentoCheque
 	 */
	public function update($movimentoCheque){
		$campos = "";
        
        
		 if(!empty($movimentoCheque->dataMovimento)) $campos .=' data_movimento = ?,';
		 if(!empty($movimentoCheque->chequeContaReceberId)) $campos .=' cheque_conta_receber_id = ?,';
		 if(!empty($movimentoCheque->situacaoChequeId)) $campos .=' situacao_cheque_id = ?,';
		 if(!empty($movimentoCheque->caixaId)) $campos .=' caixa_id = ?,';
		 if(!empty($movimentoCheque->cancelado)) $campos .=' cancelado = ?,';
		 if(!empty($movimentoCheque->chequeContaPagarId)) $campos .=' cheque_conta_pagar_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE movimento_cheque SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($movimentoCheque->dataMovimento)) 		$sqlQuery->set($movimentoCheque->dataMovimento);
		 if(!empty($movimentoCheque->chequeContaReceberId)) 		$sqlQuery->setNumber($movimentoCheque->chequeContaReceberId);
		 if(!empty($movimentoCheque->situacaoChequeId)) 		$sqlQuery->setNumber($movimentoCheque->situacaoChequeId);
		 if(!empty($movimentoCheque->caixaId)) 		$sqlQuery->setNumber($movimentoCheque->caixaId);
		 if(!empty($movimentoCheque->cancelado)) 		$sqlQuery->setNumber($movimentoCheque->cancelado);
		 if(!empty($movimentoCheque->chequeContaPagarId)) 		$sqlQuery->setNumber($movimentoCheque->chequeContaPagarId);

		$sqlQuery->setNumber($movimentoCheque->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM movimento_cheque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataMovimento($value){
		$sql = 'SELECT * FROM movimento_cheque WHERE data_movimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChequeContaReceberId($value){
		$sql = 'SELECT * FROM movimento_cheque WHERE cheque_conta_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacaoChequeId($value){
		$sql = 'SELECT * FROM movimento_cheque WHERE situacao_cheque_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM movimento_cheque WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCancelado($value){
		$sql = 'SELECT * FROM movimento_cheque WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChequeContaPagarId($value){
		$sql = 'SELECT * FROM movimento_cheque WHERE cheque_conta_pagar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataMovimento($value){
		$sql = 'DELETE FROM movimento_cheque WHERE data_movimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChequeContaReceberId($value){
		$sql = 'DELETE FROM movimento_cheque WHERE cheque_conta_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacaoChequeId($value){
		$sql = 'DELETE FROM movimento_cheque WHERE situacao_cheque_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM movimento_cheque WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCancelado($value){
		$sql = 'DELETE FROM movimento_cheque WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChequeContaPagarId($value){
		$sql = 'DELETE FROM movimento_cheque WHERE cheque_conta_pagar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return MovimentoCheque 
	 */
	protected function readRow($row){
		$movimentoCheque = new MovimentoCheque();
		
		$movimentoCheque->id = $row['id'];
		$movimentoCheque->dataMovimento = $row['data_movimento'];
		$movimentoCheque->chequeContaReceberId = $row['cheque_conta_receber_id'];
		$movimentoCheque->situacaoChequeId = $row['situacao_cheque_id'];
		$movimentoCheque->caixaId = $row['caixa_id'];
		$movimentoCheque->cancelado = $row['cancelado'];
		$movimentoCheque->chequeContaPagarId = $row['cheque_conta_pagar_id'];

		return $movimentoCheque;
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
	 * @return MovimentoCheque 
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