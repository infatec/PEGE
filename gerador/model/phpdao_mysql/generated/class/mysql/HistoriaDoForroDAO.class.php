<?php
/**
 * Classe operadora da tabela 'historia_do_forro'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-06-23 08:39
 */
class HistoriaDoForroDAO extends Model implements HistoriaDoForroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return HistoriaDoForro 
	 */
	public function load($id){
		$sql = 'SELECT * FROM historia_do_forro WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return HistoriaDoForro      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM historia_do_forro '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM historia_do_forro '.$criterio.'';
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
		$sql = 'SELECT * FROM historia_do_forro ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param historiaDoForro primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM historia_do_forro WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param HistoriaDoForro historiaDoForro
 	 */
	public function insert($historiaDoForro){
		$sql = 'INSERT INTO historia_do_forro (texto) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($historiaDoForro->texto);

		$id = $this->executeInsert($sqlQuery);	
		$historiaDoForro->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param HistoriaDoForro historiaDoForro
 	 */
	public function update($historiaDoForro){
		$campos = "";
        
        
		 if(!empty($historiaDoForro->texto)) $campos .=' texto = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE historia_do_forro SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($historiaDoForro->texto)) 		$sqlQuery->set($historiaDoForro->texto);

		$sqlQuery->setNumber($historiaDoForro->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM historia_do_forro';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTexto($value){
		$sql = 'SELECT * FROM historia_do_forro WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTexto($value){
		$sql = 'DELETE FROM historia_do_forro WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return HistoriaDoForro 
	 */
	protected function readRow($row){
		$historiaDoForro = new HistoriaDoForro();
		
		$historiaDoForro->id = $row['id'];
		$historiaDoForro->texto = $row['texto'];

		return $historiaDoForro;
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
	 * @return HistoriaDoForro 
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