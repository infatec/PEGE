<?php
/**
 * Classe operadora da tabela 'cr_funcionario'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-02-02 11:43
 */
class CrFuncionarioDAO extends Model implements CrFuncionarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CrFuncionario 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cr_funcionario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CrFuncionario      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cr_funcionario '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cr_funcionario '.$criterio.'';
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
		$sql = 'SELECT * FROM cr_funcionario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param crFuncionario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cr_funcionario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CrFuncionario crFuncionario
 	 */
	public function insert($crFuncionario){
		$sql = 'INSERT INTO cr_funcionario (funcionario_id, contas_a_receber_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($crFuncionario->funcionarioId);
		$sqlQuery->setNumber($crFuncionario->contasAReceberId);

		$id = $this->executeInsert($sqlQuery);	
		$crFuncionario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CrFuncionario crFuncionario
 	 */
	public function update($crFuncionario){
		$campos = "";
        
        
		 if(!empty($crFuncionario->funcionarioId)) $campos .=' funcionario_id = ?,';
		 if(!empty($crFuncionario->contasAReceberId)) $campos .=' contas_a_receber_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cr_funcionario SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($crFuncionario->funcionarioId)) 		$sqlQuery->setNumber($crFuncionario->funcionarioId);
		 if(!empty($crFuncionario->contasAReceberId)) 		$sqlQuery->setNumber($crFuncionario->contasAReceberId);

		$sqlQuery->setNumber($crFuncionario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cr_funcionario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFuncionarioId($value){
		$sql = 'SELECT * FROM cr_funcionario WHERE funcionario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContasAReceberId($value){
		$sql = 'SELECT * FROM cr_funcionario WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFuncionarioId($value){
		$sql = 'DELETE FROM cr_funcionario WHERE funcionario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContasAReceberId($value){
		$sql = 'DELETE FROM cr_funcionario WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CrFuncionario 
	 */
	protected function readRow($row){
		$crFuncionario = new CrFuncionario();
		
		$crFuncionario->id = $row['id'];
		$crFuncionario->funcionarioId = $row['funcionario_id'];
		$crFuncionario->contasAReceberId = $row['contas_a_receber_id'];

		return $crFuncionario;
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
	 * @return CrFuncionario 
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