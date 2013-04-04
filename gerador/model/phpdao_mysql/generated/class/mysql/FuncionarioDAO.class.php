<?php
/**
 * Classe operadora da tabela 'funcionario'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-02-02 11:43
 */
class FuncionarioDAO extends Model implements FuncionarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Funcionario 
	 */
	public function load($id){
		$sql = 'SELECT * FROM funcionario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Funcionario      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM funcionario '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM funcionario '.$criterio.'';
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
		$sql = 'SELECT * FROM funcionario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param funcionario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM funcionario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Funcionario funcionario
 	 */
	public function insert($funcionario){
		$sql = 'INSERT INTO funcionario (funcao_id, nome, telefone1, telefone2, email) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($funcionario->funcaoId);
		$sqlQuery->set($funcionario->nome);
		$sqlQuery->set($funcionario->telefone1);
		$sqlQuery->set($funcionario->telefone2);
		$sqlQuery->set($funcionario->email);

		$id = $this->executeInsert($sqlQuery);	
		$funcionario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Funcionario funcionario
 	 */
	public function update($funcionario){
		$campos = "";
        
        
		 if(!empty($funcionario->funcaoId)) $campos .=' funcao_id = ?,';
		 if(!empty($funcionario->nome)) $campos .=' nome = ?,';
		 if(!empty($funcionario->telefone1)) $campos .=' telefone1 = ?,';
		 if(!empty($funcionario->telefone2)) $campos .=' telefone2 = ?,';
		 if(!empty($funcionario->email)) $campos .=' email = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE funcionario SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($funcionario->funcaoId)) 		$sqlQuery->setNumber($funcionario->funcaoId);
		 if(!empty($funcionario->nome)) 		$sqlQuery->set($funcionario->nome);
		 if(!empty($funcionario->telefone1)) 		$sqlQuery->set($funcionario->telefone1);
		 if(!empty($funcionario->telefone2)) 		$sqlQuery->set($funcionario->telefone2);
		 if(!empty($funcionario->email)) 		$sqlQuery->set($funcionario->email);

		$sqlQuery->setNumber($funcionario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM funcionario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFuncaoId($value){
		$sql = 'SELECT * FROM funcionario WHERE funcao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM funcionario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone1($value){
		$sql = 'SELECT * FROM funcionario WHERE telefone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone2($value){
		$sql = 'SELECT * FROM funcionario WHERE telefone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM funcionario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFuncaoId($value){
		$sql = 'DELETE FROM funcionario WHERE funcao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM funcionario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone1($value){
		$sql = 'DELETE FROM funcionario WHERE telefone1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone2($value){
		$sql = 'DELETE FROM funcionario WHERE telefone2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM funcionario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Funcionario 
	 */
	protected function readRow($row){
		$funcionario = new Funcionario();
		
		$funcionario->id = $row['id'];
		$funcionario->funcaoId = $row['funcao_id'];
		$funcionario->nome = $row['nome'];
		$funcionario->telefone1 = $row['telefone1'];
		$funcionario->telefone2 = $row['telefone2'];
		$funcionario->email = $row['email'];

		return $funcionario;
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
	 * @return Funcionario 
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