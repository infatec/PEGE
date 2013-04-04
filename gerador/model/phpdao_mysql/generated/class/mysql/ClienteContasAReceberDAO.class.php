<?php
/**
 * Classe operadora da tabela 'cliente_contas_a_receber'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ClienteContasAReceberDAO extends Model implements ClienteContasAReceberI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ClienteContasAReceber 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cliente_contas_a_receber WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ClienteContasAReceber      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cliente_contas_a_receber '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cliente_contas_a_receber '.$criterio.'';
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
		$sql = 'SELECT * FROM cliente_contas_a_receber ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param clienteContasAReceber primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cliente_contas_a_receber WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ClienteContasAReceber clienteContasAReceber
 	 */
	public function insert($clienteContasAReceber){
		$sql = 'INSERT INTO cliente_contas_a_receber (cliente_id, contas_a_receber_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($clienteContasAReceber->clienteId);
		$sqlQuery->setNumber($clienteContasAReceber->contasAReceberId);

		$id = $this->executeInsert($sqlQuery);	
		$clienteContasAReceber->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ClienteContasAReceber clienteContasAReceber
 	 */
	public function update($clienteContasAReceber){
		$campos = "";
        
        
		 if(!empty($clienteContasAReceber->clienteId)) $campos .=' cliente_id = ?,';
		 if(!empty($clienteContasAReceber->contasAReceberId)) $campos .=' contas_a_receber_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cliente_contas_a_receber SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($clienteContasAReceber->clienteId)) 		$sqlQuery->setNumber($clienteContasAReceber->clienteId);
		 if(!empty($clienteContasAReceber->contasAReceberId)) 		$sqlQuery->setNumber($clienteContasAReceber->contasAReceberId);

		$sqlQuery->setNumber($clienteContasAReceber->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cliente_contas_a_receber';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByClienteId($value){
		$sql = 'SELECT * FROM cliente_contas_a_receber WHERE cliente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContasAReceberId($value){
		$sql = 'SELECT * FROM cliente_contas_a_receber WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByClienteId($value){
		$sql = 'DELETE FROM cliente_contas_a_receber WHERE cliente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContasAReceberId($value){
		$sql = 'DELETE FROM cliente_contas_a_receber WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ClienteContasAReceber 
	 */
	protected function readRow($row){
		$clienteContasAReceber = new ClienteContasAReceber();
		
		$clienteContasAReceber->id = $row['id'];
		$clienteContasAReceber->clienteId = $row['cliente_id'];
		$clienteContasAReceber->contasAReceberId = $row['contas_a_receber_id'];

		return $clienteContasAReceber;
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
	 * @return ClienteContasAReceber 
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