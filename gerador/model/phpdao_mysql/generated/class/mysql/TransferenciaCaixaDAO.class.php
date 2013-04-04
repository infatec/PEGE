<?php
/**
 * Classe operadora da tabela 'transferencia_caixa'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class TransferenciaCaixaDAO extends Model implements TransferenciaCaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TransferenciaCaixa 
	 */
	public function load($id){
		$sql = 'SELECT * FROM transferencia_caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TransferenciaCaixa      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM transferencia_caixa '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM transferencia_caixa '.$criterio.'';
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
		$sql = 'SELECT * FROM transferencia_caixa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param transferenciaCaixa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM transferencia_caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TransferenciaCaixa transferenciaCaixa
 	 */
	public function insert($transferenciaCaixa){
		$sql = 'INSERT INTO transferencia_caixa (data, usuarios_id, valor, abertura_fechamento_caixa_e_id, abertura_fechamento_caixa_s_id, caixa_e_id, caixa_s_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($transferenciaCaixa->data);
		$sqlQuery->setNumber($transferenciaCaixa->usuariosId);
		$sqlQuery->set($transferenciaCaixa->valor);
		$sqlQuery->setNumber($transferenciaCaixa->aberturaFechamentoCaixaEId);
		$sqlQuery->setNumber($transferenciaCaixa->aberturaFechamentoCaixaSId);
		$sqlQuery->setNumber($transferenciaCaixa->caixaEId);
		$sqlQuery->setNumber($transferenciaCaixa->caixaSId);

		$id = $this->executeInsert($sqlQuery);	
		$transferenciaCaixa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TransferenciaCaixa transferenciaCaixa
 	 */
	public function update($transferenciaCaixa){
		$campos = "";
        
        
		 if(!empty($transferenciaCaixa->data)) $campos .=' data = ?,';
		 if(!empty($transferenciaCaixa->usuariosId)) $campos .=' usuarios_id = ?,';
		 if(!empty($transferenciaCaixa->valor)) $campos .=' valor = ?,';
		 if(!empty($transferenciaCaixa->aberturaFechamentoCaixaEId)) $campos .=' abertura_fechamento_caixa_e_id = ?,';
		 if(!empty($transferenciaCaixa->aberturaFechamentoCaixaSId)) $campos .=' abertura_fechamento_caixa_s_id = ?,';
		 if(!empty($transferenciaCaixa->caixaEId)) $campos .=' caixa_e_id = ?,';
		 if(!empty($transferenciaCaixa->caixaSId)) $campos .=' caixa_s_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE transferencia_caixa SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($transferenciaCaixa->data)) 		$sqlQuery->set($transferenciaCaixa->data);
		 if(!empty($transferenciaCaixa->usuariosId)) 		$sqlQuery->setNumber($transferenciaCaixa->usuariosId);
		 if(!empty($transferenciaCaixa->valor)) 		$sqlQuery->set($transferenciaCaixa->valor);
		 if(!empty($transferenciaCaixa->aberturaFechamentoCaixaEId)) 		$sqlQuery->setNumber($transferenciaCaixa->aberturaFechamentoCaixaEId);
		 if(!empty($transferenciaCaixa->aberturaFechamentoCaixaSId)) 		$sqlQuery->setNumber($transferenciaCaixa->aberturaFechamentoCaixaSId);
		 if(!empty($transferenciaCaixa->caixaEId)) 		$sqlQuery->setNumber($transferenciaCaixa->caixaEId);
		 if(!empty($transferenciaCaixa->caixaSId)) 		$sqlQuery->setNumber($transferenciaCaixa->caixaSId);

		$sqlQuery->setNumber($transferenciaCaixa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM transferencia_caixa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAberturaFechamentoCaixaEId($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE abertura_fechamento_caixa_e_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAberturaFechamentoCaixaSId($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE abertura_fechamento_caixa_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaEId($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE caixa_e_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaSId($value){
		$sql = 'SELECT * FROM transferencia_caixa WHERE caixa_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByData($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAberturaFechamentoCaixaEId($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE abertura_fechamento_caixa_e_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAberturaFechamentoCaixaSId($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE abertura_fechamento_caixa_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaEId($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE caixa_e_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaSId($value){
		$sql = 'DELETE FROM transferencia_caixa WHERE caixa_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TransferenciaCaixa 
	 */
	protected function readRow($row){
		$transferenciaCaixa = new TransferenciaCaixa();
		
		$transferenciaCaixa->id = $row['id'];
		$transferenciaCaixa->data = $row['data'];
		$transferenciaCaixa->usuariosId = $row['usuarios_id'];
		$transferenciaCaixa->valor = $row['valor'];
		$transferenciaCaixa->aberturaFechamentoCaixaEId = $row['abertura_fechamento_caixa_e_id'];
		$transferenciaCaixa->aberturaFechamentoCaixaSId = $row['abertura_fechamento_caixa_s_id'];
		$transferenciaCaixa->caixaEId = $row['caixa_e_id'];
		$transferenciaCaixa->caixaSId = $row['caixa_s_id'];

		return $transferenciaCaixa;
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
	 * @return TransferenciaCaixa 
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