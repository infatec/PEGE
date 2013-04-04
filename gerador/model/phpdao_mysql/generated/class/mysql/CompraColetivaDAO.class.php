<?php
/**
 * Classe operadora da tabela 'compra_coletiva'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class CompraColetivaDAO extends Model implements CompraColetivaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CompraColetiva 
	 */
	public function load($id){
		$sql = 'SELECT * FROM compra_coletiva WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CompraColetiva      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM compra_coletiva '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM compra_coletiva '.$criterio.'';
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
		$sql = 'SELECT * FROM compra_coletiva ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param compraColetiva primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM compra_coletiva WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CompraColetiva compraColetiva
 	 */
	public function insert($compraColetiva){
		$sql = 'INSERT INTO compra_coletiva (url, nome, descricao, logo, status, created, cidade_id, identificacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($compraColetiva->url);
		$sqlQuery->set($compraColetiva->nome);
		$sqlQuery->set($compraColetiva->descricao);
		$sqlQuery->set($compraColetiva->logo);
		$sqlQuery->set($compraColetiva->status);
		$sqlQuery->set($compraColetiva->created);
		$sqlQuery->setNumber($compraColetiva->cidadeId);
		$sqlQuery->set($compraColetiva->identificacao);

		$id = $this->executeInsert($sqlQuery);	
		$compraColetiva->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CompraColetiva compraColetiva
 	 */
	public function update($compraColetiva){
		$campos = "";
        
        
		 if(!empty($compraColetiva->url)) $campos .=' url = ?,';
		 if(!empty($compraColetiva->nome)) $campos .=' nome = ?,';
		 if(!empty($compraColetiva->descricao)) $campos .=' descricao = ?,';
		 if(!empty($compraColetiva->logo)) $campos .=' logo = ?,';
		 if(!empty($compraColetiva->status)) $campos .=' status = ?,';
		 if(!empty($compraColetiva->created)) $campos .=' created = ?,';
		 if(!empty($compraColetiva->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($compraColetiva->identificacao)) $campos .=' identificacao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE compra_coletiva SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($compraColetiva->url)) 		$sqlQuery->set($compraColetiva->url);
		 if(!empty($compraColetiva->nome)) 		$sqlQuery->set($compraColetiva->nome);
		 if(!empty($compraColetiva->descricao)) 		$sqlQuery->set($compraColetiva->descricao);
		 if(!empty($compraColetiva->logo)) 		$sqlQuery->set($compraColetiva->logo);
		 if(!empty($compraColetiva->status)) 		$sqlQuery->set($compraColetiva->status);
		 if(!empty($compraColetiva->created)) 		$sqlQuery->set($compraColetiva->created);
		 if(!empty($compraColetiva->cidadeId)) 		$sqlQuery->setNumber($compraColetiva->cidadeId);
		 if(!empty($compraColetiva->identificacao)) 		$sqlQuery->set($compraColetiva->identificacao);

		$sqlQuery->setNumber($compraColetiva->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM compra_coletiva';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogo($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE logo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM compra_coletiva WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUrl($value){
		$sql = 'DELETE FROM compra_coletiva WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM compra_coletiva WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM compra_coletiva WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogo($value){
		$sql = 'DELETE FROM compra_coletiva WHERE logo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM compra_coletiva WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM compra_coletiva WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM compra_coletiva WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM compra_coletiva WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CompraColetiva 
	 */
	protected function readRow($row){
		$compraColetiva = new CompraColetiva();
		
		$compraColetiva->id = $row['id'];
		$compraColetiva->url = $row['url'];
		$compraColetiva->nome = $row['nome'];
		$compraColetiva->descricao = $row['descricao'];
		$compraColetiva->logo = $row['logo'];
		$compraColetiva->status = $row['status'];
		$compraColetiva->created = $row['created'];
		$compraColetiva->cidadeId = $row['cidade_id'];
		$compraColetiva->identificacao = $row['identificacao'];

		return $compraColetiva;
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
	 * @return CompraColetiva 
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