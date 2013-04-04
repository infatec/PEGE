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
	public function load($id){
		$sql = 'SELECT * FROM ${table_name} WHERE ${pk} = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set${pk_number}($id);
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
    
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ${table_name} ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param ${var_name} primary key
 	 */
	public function delete($${pk}){
		$sql = 'DELETE FROM ${table_name} WHERE ${pk} = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set${pk_number}($${pk});
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function insert($${var_name}){
		$sql = 'INSERT INTO ${table_name} (${insert_fields}) VALUES (${question_marks})';
		$sqlQuery = new SqlQuery($sql);
		${parameter_setter}
		$id = $this->executeInsert($sqlQuery);	
		$${var_name}->${pk_php} = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function update($${var_name}){
		$campos = "";
        
        ${parameter_setter_str}
        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE ${table_name} SET '.$campos.' WHERE ${pk} = ?';
		$sqlQuery = new SqlQuery($sql);
		${parameter_setter_up}
		$sqlQuery->set${pk_number}($${var_name}->${pk_php});
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM ${table_name}';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

${queryByFieldFunctions}
${deleteByFieldFunctions}
	
	/**
	 * Ler um registro
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
	 * Get registro
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