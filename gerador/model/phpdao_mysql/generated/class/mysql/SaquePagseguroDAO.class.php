<?php
/**
 * Classe operadora da tabela 'saque_pagseguro'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class SaquePagseguroDAO extends Model implements SaquePagseguroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return SaquePagseguro 
	 */
	public function load($id){
		$sql = 'SELECT * FROM saque_pagseguro WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return SaquePagseguro      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM saque_pagseguro '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM saque_pagseguro '.$criterio.'';
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
		$sql = 'SELECT * FROM saque_pagseguro ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param saquePagseguro primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM saque_pagseguro WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param SaquePagseguro saquePagseguro
 	 */
	public function insert($saquePagseguro){
		$sql = 'INSERT INTO saque_pagseguro (data, usuarios_id, valor, caixa_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($saquePagseguro->data);
		$sqlQuery->setNumber($saquePagseguro->usuariosId);
		$sqlQuery->set($saquePagseguro->valor);
		$sqlQuery->setNumber($saquePagseguro->caixaId);

		$id = $this->executeInsert($sqlQuery);	
		$saquePagseguro->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param SaquePagseguro saquePagseguro
 	 */
	public function update($saquePagseguro){
		$campos = "";
        
        
		 if(!empty($saquePagseguro->data)) $campos .=' data = ?,';
		 if(!empty($saquePagseguro->usuariosId)) $campos .=' usuarios_id = ?,';
		 if(!empty($saquePagseguro->valor)) $campos .=' valor = ?,';
		 if(!empty($saquePagseguro->caixaId)) $campos .=' caixa_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE saque_pagseguro SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($saquePagseguro->data)) 		$sqlQuery->set($saquePagseguro->data);
		 if(!empty($saquePagseguro->usuariosId)) 		$sqlQuery->setNumber($saquePagseguro->usuariosId);
		 if(!empty($saquePagseguro->valor)) 		$sqlQuery->set($saquePagseguro->valor);
		 if(!empty($saquePagseguro->caixaId)) 		$sqlQuery->setNumber($saquePagseguro->caixaId);

		$sqlQuery->setNumber($saquePagseguro->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM saque_pagseguro';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM saque_pagseguro WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM saque_pagseguro WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM saque_pagseguro WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM saque_pagseguro WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByData($value){
		$sql = 'DELETE FROM saque_pagseguro WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM saque_pagseguro WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM saque_pagseguro WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM saque_pagseguro WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return SaquePagseguro 
	 */
	protected function readRow($row){
		$saquePagseguro = new SaquePagseguro();
		
		$saquePagseguro->id = $row['id'];
		$saquePagseguro->data = $row['data'];
		$saquePagseguro->usuariosId = $row['usuarios_id'];
		$saquePagseguro->valor = $row['valor'];
		$saquePagseguro->caixaId = $row['caixa_id'];

		return $saquePagseguro;
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
	 * @return SaquePagseguro 
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