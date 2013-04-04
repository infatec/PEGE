<?php
/**
 * Classe operadora da tabela 'negociacao_contas'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class NegociacaoContasDAO extends Model implements NegociacaoContasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return NegociacaoContas 
	 */
	public function load($id){
		$sql = 'SELECT * FROM negociacao_contas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return NegociacaoContas      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM negociacao_contas '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM negociacao_contas '.$criterio.'';
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
		$sql = 'SELECT * FROM negociacao_contas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param negociacaoConta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM negociacao_contas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param NegociacaoContas negociacaoConta
 	 */
	public function insert($negociacaoConta){
		$sql = 'INSERT INTO negociacao_contas (negociacao_id, contas_a_receber_id, conta_a_pagar_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($negociacaoConta->negociacaoId);
		$sqlQuery->setNumber($negociacaoConta->contasAReceberId);
		$sqlQuery->setNumber($negociacaoConta->contaAPagarId);

		$id = $this->executeInsert($sqlQuery);	
		$negociacaoConta->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param NegociacaoContas negociacaoConta
 	 */
	public function update($negociacaoConta){
		$campos = "";
        
        
		 if(!empty($negociacaoConta->negociacaoId)) $campos .=' negociacao_id = ?,';
		 if(!empty($negociacaoConta->contasAReceberId)) $campos .=' contas_a_receber_id = ?,';
		 if(!empty($negociacaoConta->contaAPagarId)) $campos .=' conta_a_pagar_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE negociacao_contas SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($negociacaoConta->negociacaoId)) 		$sqlQuery->setNumber($negociacaoConta->negociacaoId);
		 if(!empty($negociacaoConta->contasAReceberId)) 		$sqlQuery->setNumber($negociacaoConta->contasAReceberId);
		 if(!empty($negociacaoConta->contaAPagarId)) 		$sqlQuery->setNumber($negociacaoConta->contaAPagarId);

		$sqlQuery->setNumber($negociacaoConta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM negociacao_contas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNegociacaoId($value){
		$sql = 'SELECT * FROM negociacao_contas WHERE negociacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContasAReceberId($value){
		$sql = 'SELECT * FROM negociacao_contas WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContaAPagarId($value){
		$sql = 'SELECT * FROM negociacao_contas WHERE conta_a_pagar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNegociacaoId($value){
		$sql = 'DELETE FROM negociacao_contas WHERE negociacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContasAReceberId($value){
		$sql = 'DELETE FROM negociacao_contas WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContaAPagarId($value){
		$sql = 'DELETE FROM negociacao_contas WHERE conta_a_pagar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return NegociacaoContas 
	 */
	protected function readRow($row){
		$negociacaoConta = new NegociacaoConta();
		
		$negociacaoConta->id = $row['id'];
		$negociacaoConta->negociacaoId = $row['negociacao_id'];
		$negociacaoConta->contasAReceberId = $row['contas_a_receber_id'];
		$negociacaoConta->contaAPagarId = $row['conta_a_pagar_id'];

		return $negociacaoConta;
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
	 * @return NegociacaoContas 
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