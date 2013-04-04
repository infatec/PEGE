<?php
/**
 * Classe operadora da tabela 'log'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class LogDAO extends Model implements LogI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Log 
	 */
	public function load($id){
		$sql = 'SELECT * FROM log WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Log      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM log '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM log '.$criterio.'';
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
		$sql = 'SELECT * FROM log ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param log primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM log WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Log log
 	 */
	public function insert($log){
		$sql = 'INSERT INTO log (acao, funcionario_id, usuario_id, data, created) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($log->acao);
		$sqlQuery->setNumber($log->funcionarioId);
		$sqlQuery->setNumber($log->usuarioId);
		$sqlQuery->set($log->data);
		$sqlQuery->set($log->created);

		$id = $this->executeInsert($sqlQuery);	
		$log->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Log log
 	 */
	public function update($log){
		$campos = "";
        
        
		 if(!empty($log->acao)) $campos .=' acao = ?,';
		 if(!empty($log->funcionarioId)) $campos .=' funcionario_id = ?,';
		 if(!empty($log->usuarioId)) $campos .=' usuario_id = ?,';
		 if(!empty($log->data)) $campos .=' data = ?,';
		 if(!empty($log->created)) $campos .=' created = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE log SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($log->acao)) 		$sqlQuery->set($log->acao);
		 if(!empty($log->funcionarioId)) 		$sqlQuery->setNumber($log->funcionarioId);
		 if(!empty($log->usuarioId)) 		$sqlQuery->setNumber($log->usuarioId);
		 if(!empty($log->data)) 		$sqlQuery->set($log->data);
		 if(!empty($log->created)) 		$sqlQuery->set($log->created);

		$sqlQuery->setNumber($log->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM log';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAcao($value){
		$sql = 'SELECT * FROM log WHERE acao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncionarioId($value){
		$sql = 'SELECT * FROM log WHERE funcionario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioId($value){
		$sql = 'SELECT * FROM log WHERE usuario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM log WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM log WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAcao($value){
		$sql = 'DELETE FROM log WHERE acao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncionarioId($value){
		$sql = 'DELETE FROM log WHERE funcionario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioId($value){
		$sql = 'DELETE FROM log WHERE usuario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM log WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM log WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Log 
	 */
	protected function readRow($row){
		$log = new Log();
		
		$log->id = $row['id'];
		$log->acao = $row['acao'];
		$log->funcionarioId = $row['funcionario_id'];
		$log->usuarioId = $row['usuario_id'];
		$log->data = $row['data'];
		$log->created = $row['created'];

		return $log;
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
	 * @return Log 
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