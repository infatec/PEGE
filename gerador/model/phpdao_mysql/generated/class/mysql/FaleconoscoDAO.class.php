<?php
/**
 * Classe operadora da tabela 'faleconosco'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class FaleconoscoDAO extends Model implements FaleconoscoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Faleconosco 
	 */
	public function load($id){
		$sql = 'SELECT * FROM faleconosco WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Faleconosco      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM faleconosco '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM faleconosco '.$criterio.'';
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
		$sql = 'SELECT * FROM faleconosco ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param faleconosco primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM faleconosco WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Faleconosco faleconosco
 	 */
	public function insert($faleconosco){
		$sql = 'INSERT INTO faleconosco (nome, email, telefone, mensagem, created, status) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($faleconosco->nome);
		$sqlQuery->set($faleconosco->email);
		$sqlQuery->set($faleconosco->telefone);
		$sqlQuery->set($faleconosco->mensagem);
		$sqlQuery->set($faleconosco->created);
		$sqlQuery->set($faleconosco->status);

		$id = $this->executeInsert($sqlQuery);	
		$faleconosco->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Faleconosco faleconosco
 	 */
	public function update($faleconosco){
		$campos = "";
        
        
		 if(!empty($faleconosco->nome)) $campos .=' nome = ?,';
		 if(!empty($faleconosco->email)) $campos .=' email = ?,';
		 if(!empty($faleconosco->telefone)) $campos .=' telefone = ?,';
		 if(!empty($faleconosco->mensagem)) $campos .=' mensagem = ?,';
		 if(!empty($faleconosco->created)) $campos .=' created = ?,';
		 if(!empty($faleconosco->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE faleconosco SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($faleconosco->nome)) 		$sqlQuery->set($faleconosco->nome);
		 if(!empty($faleconosco->email)) 		$sqlQuery->set($faleconosco->email);
		 if(!empty($faleconosco->telefone)) 		$sqlQuery->set($faleconosco->telefone);
		 if(!empty($faleconosco->mensagem)) 		$sqlQuery->set($faleconosco->mensagem);
		 if(!empty($faleconosco->created)) 		$sqlQuery->set($faleconosco->created);
		 if(!empty($faleconosco->status)) 		$sqlQuery->set($faleconosco->status);

		$sqlQuery->setNumber($faleconosco->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM faleconosco';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM faleconosco WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM faleconosco WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM faleconosco WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMensagem($value){
		$sql = 'SELECT * FROM faleconosco WHERE mensagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM faleconosco WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM faleconosco WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM faleconosco WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM faleconosco WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM faleconosco WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMensagem($value){
		$sql = 'DELETE FROM faleconosco WHERE mensagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM faleconosco WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM faleconosco WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Faleconosco 
	 */
	protected function readRow($row){
		$faleconosco = new Faleconosco();
		
		$faleconosco->id = $row['id'];
		$faleconosco->nome = $row['nome'];
		$faleconosco->email = $row['email'];
		$faleconosco->telefone = $row['telefone'];
		$faleconosco->mensagem = $row['mensagem'];
		$faleconosco->created = $row['created'];
		$faleconosco->status = $row['status'];

		return $faleconosco;
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
	 * @return Faleconosco 
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