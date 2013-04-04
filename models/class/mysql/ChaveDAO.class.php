<?php
/**
 * Classe operadora da tabela 'chaves'. banco msSql.
 *
 * @author:frame arser
 * @date: 2010-07-20 21:10
 */
class ChavesDAO extends Model implements ChavesI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Chaves 
	 */
	public function load($id){
		$sql = 'SELECT * FROM chaves WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Chaves      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM chaves '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM chaves '.$criterio.'';
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
		$sql = 'SELECT * FROM chaves ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param chave primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM chaves WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Chaves chave
 	 */
	public function insert($chave){
		$sql = 'INSERT INTO chaves (numero, chave, qtd) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($chave->numero);
		$sqlQuery->set($chave->chave);
		$sqlQuery->setNumber($chave->qtd);

		$id = $this->executeInsert($sqlQuery);	
		$chave->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Chaves chave
 	 */
	public function update($chave){
		$campos = "";
        
        
		 if(!empty($chave->numero)) $campos .=' numero = ?,';
		 if(!empty($chave->chave)) $campos .=' chave = ?,';
		 if(!empty($chave->qtd)) $campos .=' qtd = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE chaves SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($chave->numero)) 		$sqlQuery->setNumber($chave->numero);
		 if(!empty($chave->chave)) 		$sqlQuery->set($chave->chave);
		 if(!empty($chave->qtd)) 		$sqlQuery->setNumber($chave->qtd);

		$sqlQuery->setNumber($chave->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM chaves';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM chaves WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChave($value){
		$sql = 'SELECT * FROM chaves WHERE chave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtd($value){
		$sql = 'SELECT * FROM chaves WHERE qtd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNumero($value){
		$sql = 'DELETE FROM chaves WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChave($value){
		$sql = 'DELETE FROM chaves WHERE chave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtd($value){
		$sql = 'DELETE FROM chaves WHERE qtd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Chaves 
	 */
	protected function readRow($row){
		$chave = new Chave();
		
		$chave->id = $row['id'];
		$chave->numero = $row['numero'];
		$chave->chave = $row['chave'];
		$chave->qtd = $row['qtd'];

		return $chave;
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
	 * @return Chaves 
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