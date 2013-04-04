<?php
/**
 * Classe operadora da tabela 'cheque_conta_pagar'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ChequeContaPagarDAO extends Model implements ChequeContaPagarI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ChequeContaPagar 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cheque_conta_pagar WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ChequeContaPagar      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cheque_conta_pagar '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cheque_conta_pagar '.$criterio.'';
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
		$sql = 'SELECT * FROM cheque_conta_pagar ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param chequeContaPagar primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cheque_conta_pagar WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ChequeContaPagar chequeContaPagar
 	 */
	public function insert($chequeContaPagar){
		$sql = 'INSERT INTO cheque_conta_pagar (cheque_id, data_saida, data_compensacao, valor, cancelado) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($chequeContaPagar->chequeId);
		$sqlQuery->set($chequeContaPagar->dataSaida);
		$sqlQuery->set($chequeContaPagar->dataCompensacao);
		$sqlQuery->set($chequeContaPagar->valor);
		$sqlQuery->set($chequeContaPagar->cancelado);

		$id = $this->executeInsert($sqlQuery);	
		$chequeContaPagar->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ChequeContaPagar chequeContaPagar
 	 */
	public function update($chequeContaPagar){
		$campos = "";
        
        
		 if(!empty($chequeContaPagar->chequeId)) $campos .=' cheque_id = ?,';
		 if(!empty($chequeContaPagar->dataSaida)) $campos .=' data_saida = ?,';
		 if(!empty($chequeContaPagar->dataCompensacao)) $campos .=' data_compensacao = ?,';
		 if(!empty($chequeContaPagar->valor)) $campos .=' valor = ?,';
		 if(!empty($chequeContaPagar->cancelado)) $campos .=' cancelado = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cheque_conta_pagar SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($chequeContaPagar->chequeId)) 		$sqlQuery->setNumber($chequeContaPagar->chequeId);
		 if(!empty($chequeContaPagar->dataSaida)) 		$sqlQuery->set($chequeContaPagar->dataSaida);
		 if(!empty($chequeContaPagar->dataCompensacao)) 		$sqlQuery->set($chequeContaPagar->dataCompensacao);
		 if(!empty($chequeContaPagar->valor)) 		$sqlQuery->set($chequeContaPagar->valor);
		 if(!empty($chequeContaPagar->cancelado)) 		$sqlQuery->set($chequeContaPagar->cancelado);

		$sqlQuery->setNumber($chequeContaPagar->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cheque_conta_pagar';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByChequeId($value){
		$sql = 'SELECT * FROM cheque_conta_pagar WHERE cheque_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataSaida($value){
		$sql = 'SELECT * FROM cheque_conta_pagar WHERE data_saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCompensacao($value){
		$sql = 'SELECT * FROM cheque_conta_pagar WHERE data_compensacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM cheque_conta_pagar WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCancelado($value){
		$sql = 'SELECT * FROM cheque_conta_pagar WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByChequeId($value){
		$sql = 'DELETE FROM cheque_conta_pagar WHERE cheque_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataSaida($value){
		$sql = 'DELETE FROM cheque_conta_pagar WHERE data_saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCompensacao($value){
		$sql = 'DELETE FROM cheque_conta_pagar WHERE data_compensacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM cheque_conta_pagar WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCancelado($value){
		$sql = 'DELETE FROM cheque_conta_pagar WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ChequeContaPagar 
	 */
	protected function readRow($row){
		$chequeContaPagar = new ChequeContaPagar();
		
		$chequeContaPagar->id = $row['id'];
		$chequeContaPagar->chequeId = $row['cheque_id'];
		$chequeContaPagar->dataSaida = $row['data_saida'];
		$chequeContaPagar->dataCompensacao = $row['data_compensacao'];
		$chequeContaPagar->valor = $row['valor'];
		$chequeContaPagar->cancelado = $row['cancelado'];

		return $chequeContaPagar;
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
	 * @return ChequeContaPagar 
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