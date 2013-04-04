<?php
/**
 * Classe operadora da tabela '${table_name}'. banco msSql.
 *
 * @author:frame arser
 * @date: ${date}
 */
class ${dao_clazz_name}DAO extends Model implements ${idao_clazz_name}I{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ${dao_clazz_name} 
	 */
	public function load(${pks}){
		$sql = 'SELECT * FROM ${table_name} WHERE ${pk_where}';
		$sqlQuery = new SqlQuery($sql);
		${pk_set}
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ${dao_clazz_name}      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM ${table_name} '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM ${table_name} '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		$rs=$this->execute($sqlQuery);
        return $rs[0]["qtd"];
	} 
     
     
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ${table_name} ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
	public function delete(${pks}){
		$sql = 'DELETE FROM ${table_name} WHERE ${pk_where}';
		$sqlQuery = new SqlQuery($sql);
		${pk_set}
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function insert($${var_name}){
		$sql = 'INSERT INTO ${table_name} (${insert_fields2}) VALUES (${question_marks2})';
		$sqlQuery = new SqlQuery($sql);
		${parameter_setter}
		${pk_set_update}
		$this->executeInsert($sqlQuery);	
		//$${var_name}->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function update($${var_name}){
	    $campos = "";
        
        ${parameter_setter_str}
        
        $campos = substr($campos,0,-1);
        
		$sql = 'UPDATE ${table_name} SET '.$campos.' WHERE ${pk_where}';
		$sqlQuery = new SqlQuery($sql);
		${parameter_setter_up}
        
		${pk_set_update}
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ${table_name}';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

${queryByFieldFunctions}
${deleteByFieldFunctions}
	
	/**
	 * Read row
	 *
	 * @return ${dao_clazz_name} 
	 */
	protected function readRow($row){
		$${var_name} = new ${domain_clazz_name}();
		${read_row}
		return $${var_name};
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
	 * Get row
	 *
	 * @return ${dao_clazz_name} 
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
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>