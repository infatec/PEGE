<?php
/**
 * Classe operadora da tabela 'tipos_dependencia_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TiposDependenciaMecDAO extends Model implements TiposDependenciaMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposDependenciaMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipos_dependencia_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposDependenciaMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tipos_dependencia_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tipos_dependencia_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM tipos_dependencia_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tiposDependenciaMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipos_dependencia_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposDependenciaMec tiposDependenciaMec
 	 */
	public function insert($tiposDependenciaMec){
		$sql = 'INSERT INTO tipos_dependencia_mec (codigo, nome, individual_escola, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tiposDependenciaMec->codigo);
		$sqlQuery->set($tiposDependenciaMec->nome);
		$sqlQuery->set($tiposDependenciaMec->individualEscola);
		$sqlQuery->set($tiposDependenciaMec->created);
		$sqlQuery->set($tiposDependenciaMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$tiposDependenciaMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposDependenciaMec tiposDependenciaMec
 	 */
	public function update($tiposDependenciaMec){
		$campos = "";
        
        
		 if(!empty($tiposDependenciaMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($tiposDependenciaMec->nome)) $campos .=' nome = ?,';
		 if(!empty($tiposDependenciaMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($tiposDependenciaMec->created)) $campos .=' created = ?,';
		 if(!empty($tiposDependenciaMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tipos_dependencia_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tiposDependenciaMec->codigo)) 		$sqlQuery->set($tiposDependenciaMec->codigo);
		 if(!empty($tiposDependenciaMec->nome)) 		$sqlQuery->set($tiposDependenciaMec->nome);
		 if(!empty($tiposDependenciaMec->individualEscola)) 		$sqlQuery->set($tiposDependenciaMec->individualEscola);
		 if(!empty($tiposDependenciaMec->created)) 		$sqlQuery->set($tiposDependenciaMec->created);
		 if(!empty($tiposDependenciaMec->status)) 		$sqlQuery->set($tiposDependenciaMec->status);

		$sqlQuery->setNumber($tiposDependenciaMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipos_dependencia_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM tipos_dependencia_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM tipos_dependencia_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM tipos_dependencia_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM tipos_dependencia_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tipos_dependencia_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM tipos_dependencia_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM tipos_dependencia_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM tipos_dependencia_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM tipos_dependencia_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tipos_dependencia_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return TiposDependenciaMec 
	 */
	protected function readRow($row){
		$tiposDependenciaMec = new TiposDependenciaMec();
		
		$tiposDependenciaMec->id = $row['id'];
		$tiposDependenciaMec->codigo = $row['codigo'];
		$tiposDependenciaMec->nome = $row['nome'];
		$tiposDependenciaMec->individualEscola = $row['individual_escola'];
		$tiposDependenciaMec->created = $row['created'];
		$tiposDependenciaMec->status = $row['status'];

		return $tiposDependenciaMec;
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
	 * @return TiposDependenciaMec 
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