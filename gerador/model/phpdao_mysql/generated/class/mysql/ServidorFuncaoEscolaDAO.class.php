<?php
/**
 * Classe operadora da tabela 'servidor_funcao_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class ServidorFuncaoEscolaDAO extends Model implements ServidorFuncaoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ServidorFuncaoEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM servidor_funcao_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ServidorFuncaoEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM servidor_funcao_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM servidor_funcao_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM servidor_funcao_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param servidorFuncaoEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM servidor_funcao_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ServidorFuncaoEscola servidorFuncaoEscola
 	 */
	public function insert($servidorFuncaoEscola){
		$sql = 'INSERT INTO servidor_funcao_escola (servidor_id, escola_id, funcoes_mec_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($servidorFuncaoEscola->servidorId);
		$sqlQuery->setNumber($servidorFuncaoEscola->escolaId);
		$sqlQuery->setNumber($servidorFuncaoEscola->funcoesMecId);

		$id = $this->executeInsert($sqlQuery);	
		$servidorFuncaoEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ServidorFuncaoEscola servidorFuncaoEscola
 	 */
	public function update($servidorFuncaoEscola){
		$campos = "";
        
        
		 if(!empty($servidorFuncaoEscola->servidorId)) $campos .=' servidor_id = ?,';
		 if(!empty($servidorFuncaoEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($servidorFuncaoEscola->funcoesMecId)) $campos .=' funcoes_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE servidor_funcao_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($servidorFuncaoEscola->servidorId)) 		$sqlQuery->setNumber($servidorFuncaoEscola->servidorId);
		 if(!empty($servidorFuncaoEscola->escolaId)) 		$sqlQuery->setNumber($servidorFuncaoEscola->escolaId);
		 if(!empty($servidorFuncaoEscola->funcoesMecId)) 		$sqlQuery->setNumber($servidorFuncaoEscola->funcoesMecId);

		$sqlQuery->setNumber($servidorFuncaoEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM servidor_funcao_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByServidorId($value){
		$sql = 'SELECT * FROM servidor_funcao_escola WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM servidor_funcao_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncoesMecId($value){
		$sql = 'SELECT * FROM servidor_funcao_escola WHERE funcoes_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByServidorId($value){
		$sql = 'DELETE FROM servidor_funcao_escola WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM servidor_funcao_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncoesMecId($value){
		$sql = 'DELETE FROM servidor_funcao_escola WHERE funcoes_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ServidorFuncaoEscola 
	 */
	protected function readRow($row){
		$servidorFuncaoEscola = new ServidorFuncaoEscola();
		
		$servidorFuncaoEscola->id = $row['id'];
		$servidorFuncaoEscola->servidorId = $row['servidor_id'];
		$servidorFuncaoEscola->escolaId = $row['escola_id'];
		$servidorFuncaoEscola->funcoesMecId = $row['funcoes_mec_id'];

		return $servidorFuncaoEscola;
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
	 * @return ServidorFuncaoEscola 
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