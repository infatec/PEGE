<?php
/**
 * Classe operadora da tabela 'cheque_caixa'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ChequeCaixaDAO extends Model implements ChequeCaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ChequeCaixa 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cheque_caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ChequeCaixa      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cheque_caixa '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cheque_caixa '.$criterio.'';
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
		$sql = 'SELECT * FROM cheque_caixa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param chequeCaixa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cheque_caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ChequeCaixa chequeCaixa
 	 */
	public function insert($chequeCaixa){
		$sql = 'INSERT INTO cheque_caixa (valor, data_entrada, caixa_id, cheque_conta_receber_id, cancelado) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($chequeCaixa->valor);
		$sqlQuery->set($chequeCaixa->dataEntrada);
		$sqlQuery->setNumber($chequeCaixa->caixaId);
		$sqlQuery->setNumber($chequeCaixa->chequeContaReceberId);
		$sqlQuery->setNumber($chequeCaixa->cancelado);

		$id = $this->executeInsert($sqlQuery);	
		$chequeCaixa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ChequeCaixa chequeCaixa
 	 */
	public function update($chequeCaixa){
		$campos = "";
        
        
		 if(!empty($chequeCaixa->valor)) $campos .=' valor = ?,';
		 if(!empty($chequeCaixa->dataEntrada)) $campos .=' data_entrada = ?,';
		 if(!empty($chequeCaixa->caixaId)) $campos .=' caixa_id = ?,';
		 if(!empty($chequeCaixa->chequeContaReceberId)) $campos .=' cheque_conta_receber_id = ?,';
		 if(!empty($chequeCaixa->cancelado)) $campos .=' cancelado = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cheque_caixa SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($chequeCaixa->valor)) 		$sqlQuery->set($chequeCaixa->valor);
		 if(!empty($chequeCaixa->dataEntrada)) 		$sqlQuery->set($chequeCaixa->dataEntrada);
		 if(!empty($chequeCaixa->caixaId)) 		$sqlQuery->setNumber($chequeCaixa->caixaId);
		 if(!empty($chequeCaixa->chequeContaReceberId)) 		$sqlQuery->setNumber($chequeCaixa->chequeContaReceberId);
		 if(!empty($chequeCaixa->cancelado)) 		$sqlQuery->setNumber($chequeCaixa->cancelado);

		$sqlQuery->setNumber($chequeCaixa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cheque_caixa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM cheque_caixa WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEntrada($value){
		$sql = 'SELECT * FROM cheque_caixa WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM cheque_caixa WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChequeContaReceberId($value){
		$sql = 'SELECT * FROM cheque_caixa WHERE cheque_conta_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCancelado($value){
		$sql = 'SELECT * FROM cheque_caixa WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByValor($value){
		$sql = 'DELETE FROM cheque_caixa WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEntrada($value){
		$sql = 'DELETE FROM cheque_caixa WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM cheque_caixa WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChequeContaReceberId($value){
		$sql = 'DELETE FROM cheque_caixa WHERE cheque_conta_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCancelado($value){
		$sql = 'DELETE FROM cheque_caixa WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ChequeCaixa 
	 */
	protected function readRow($row){
		$chequeCaixa = new ChequeCaixa();
		
		$chequeCaixa->id = $row['id'];
		$chequeCaixa->valor = $row['valor'];
		$chequeCaixa->dataEntrada = $row['data_entrada'];
		$chequeCaixa->caixaId = $row['caixa_id'];
		$chequeCaixa->chequeContaReceberId = $row['cheque_conta_receber_id'];
		$chequeCaixa->cancelado = $row['cancelado'];

		return $chequeCaixa;
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
	 * @return ChequeCaixa 
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