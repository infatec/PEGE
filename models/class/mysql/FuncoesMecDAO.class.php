<?php
/**
 * Classe operadora da tabela 'funcoes_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class FuncoesMecDAO extends Model implements FuncoesMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FuncoesMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM funcoes_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FuncoesMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM funcoes_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM funcoes_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM funcoes_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param funcoesMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM funcoes_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FuncoesMec funcoesMec
 	 */
	public function insert($funcoesMec){
		$sql = 'INSERT INTO funcoes_mec (codigo, nome, individual_escola, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($funcoesMec->codigo);
		$sqlQuery->set($funcoesMec->nome);
		$sqlQuery->set($funcoesMec->individualEscola);
		$sqlQuery->set($funcoesMec->created);
		$sqlQuery->set($funcoesMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$funcoesMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FuncoesMec funcoesMec
 	 */
	public function update($funcoesMec){
		$campos = "";
        
        
		 if(!empty($funcoesMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($funcoesMec->nome)) $campos .=' nome = ?,';
		 if(!empty($funcoesMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($funcoesMec->created)) $campos .=' created = ?,';
		 if(!empty($funcoesMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE funcoes_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($funcoesMec->codigo)) 		$sqlQuery->set($funcoesMec->codigo);
		 if(!empty($funcoesMec->nome)) 		$sqlQuery->set($funcoesMec->nome);
		 if(!empty($funcoesMec->individualEscola)) 		$sqlQuery->set($funcoesMec->individualEscola);
		 if(!empty($funcoesMec->created)) 		$sqlQuery->set($funcoesMec->created);
		 if(!empty($funcoesMec->status)) 		$sqlQuery->set($funcoesMec->status);

		$sqlQuery->setNumber($funcoesMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM funcoes_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM funcoes_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM funcoes_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM funcoes_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM funcoes_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM funcoes_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM funcoes_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM funcoes_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM funcoes_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM funcoes_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM funcoes_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return FuncoesMec 
	 */
	protected function readRow($row){
		$funcoesMec = new FuncoesMec();
		
		$funcoesMec->id = $row['id'];
		$funcoesMec->codigo = $row['codigo'];
		$funcoesMec->nome = $row['nome'];
		$funcoesMec->individualEscola = $row['individual_escola'];
		$funcoesMec->created = $row['created'];
		$funcoesMec->status = $row['status'];

		return $funcoesMec;
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
	 * @return FuncoesMec 
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