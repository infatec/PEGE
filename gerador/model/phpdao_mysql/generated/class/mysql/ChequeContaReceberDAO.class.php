<?php
/**
 * Classe operadora da tabela 'cheque_conta_receber'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ChequeContaReceberDAO extends Model implements ChequeContaReceberI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ChequeContaReceber 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cheque_conta_receber WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ChequeContaReceber      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cheque_conta_receber '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cheque_conta_receber '.$criterio.'';
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
		$sql = 'SELECT * FROM cheque_conta_receber ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param chequeContaReceber primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cheque_conta_receber WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ChequeContaReceber chequeContaReceber
 	 */
	public function insert($chequeContaReceber){
		$sql = 'INSERT INTO cheque_conta_receber (data_compensacao, valor, contas_a_receber_id, cancelado) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($chequeContaReceber->dataCompensacao);
		$sqlQuery->set($chequeContaReceber->valor);
		$sqlQuery->setNumber($chequeContaReceber->contasAReceberId);
		$sqlQuery->set($chequeContaReceber->cancelado);

		$id = $this->executeInsert($sqlQuery);	
		$chequeContaReceber->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ChequeContaReceber chequeContaReceber
 	 */
	public function update($chequeContaReceber){
		$campos = "";
        
        
		 if(!empty($chequeContaReceber->dataCompensacao)) $campos .=' data_compensacao = ?,';
		 if(!empty($chequeContaReceber->valor)) $campos .=' valor = ?,';
		 if(!empty($chequeContaReceber->contasAReceberId)) $campos .=' contas_a_receber_id = ?,';
		 if(!empty($chequeContaReceber->cancelado)) $campos .=' cancelado = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cheque_conta_receber SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($chequeContaReceber->dataCompensacao)) 		$sqlQuery->set($chequeContaReceber->dataCompensacao);
		 if(!empty($chequeContaReceber->valor)) 		$sqlQuery->set($chequeContaReceber->valor);
		 if(!empty($chequeContaReceber->contasAReceberId)) 		$sqlQuery->setNumber($chequeContaReceber->contasAReceberId);
		 if(!empty($chequeContaReceber->cancelado)) 		$sqlQuery->set($chequeContaReceber->cancelado);

		$sqlQuery->setNumber($chequeContaReceber->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cheque_conta_receber';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataCompensacao($value){
		$sql = 'SELECT * FROM cheque_conta_receber WHERE data_compensacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM cheque_conta_receber WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContasAReceberId($value){
		$sql = 'SELECT * FROM cheque_conta_receber WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCancelado($value){
		$sql = 'SELECT * FROM cheque_conta_receber WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataCompensacao($value){
		$sql = 'DELETE FROM cheque_conta_receber WHERE data_compensacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM cheque_conta_receber WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContasAReceberId($value){
		$sql = 'DELETE FROM cheque_conta_receber WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCancelado($value){
		$sql = 'DELETE FROM cheque_conta_receber WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ChequeContaReceber 
	 */
	protected function readRow($row){
		$chequeContaReceber = new ChequeContaReceber();
		
		$chequeContaReceber->id = $row['id'];
		$chequeContaReceber->dataCompensacao = $row['data_compensacao'];
		$chequeContaReceber->valor = $row['valor'];
		$chequeContaReceber->contasAReceberId = $row['contas_a_receber_id'];
		$chequeContaReceber->cancelado = $row['cancelado'];

		return $chequeContaReceber;
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
	 * @return ChequeContaReceber 
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