<?php
/**
 * Classe operadora da tabela 'habilitacoes_mec'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class HabilitacoesMecDAO extends Model implements HabilitacoesMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return HabilitacoesMec 
	 */
	public function load($id){
		$sql = 'SELECT * FROM habilitacoes_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return HabilitacoesMec      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM habilitacoes_mec '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM habilitacoes_mec '.$criterio.'';
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
		$sql = 'SELECT * FROM habilitacoes_mec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param habilitacoesMec primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM habilitacoes_mec WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param HabilitacoesMec habilitacoesMec
 	 */
	public function insert($habilitacoesMec){
		$sql = 'INSERT INTO habilitacoes_mec (codigo, nome, individual_escola, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($habilitacoesMec->codigo);
		$sqlQuery->set($habilitacoesMec->nome);
		$sqlQuery->set($habilitacoesMec->individualEscola);
		$sqlQuery->set($habilitacoesMec->created);
		$sqlQuery->set($habilitacoesMec->status);

		$id = $this->executeInsert($sqlQuery);	
		$habilitacoesMec->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param HabilitacoesMec habilitacoesMec
 	 */
	public function update($habilitacoesMec){
		$campos = "";
        
        
		 if(!empty($habilitacoesMec->codigo)) $campos .=' codigo = ?,';
		 if(!empty($habilitacoesMec->nome)) $campos .=' nome = ?,';
		 if(!empty($habilitacoesMec->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($habilitacoesMec->created)) $campos .=' created = ?,';
		 if(!empty($habilitacoesMec->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE habilitacoes_mec SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($habilitacoesMec->codigo)) 		$sqlQuery->set($habilitacoesMec->codigo);
		 if(!empty($habilitacoesMec->nome)) 		$sqlQuery->set($habilitacoesMec->nome);
		 if(!empty($habilitacoesMec->individualEscola)) 		$sqlQuery->set($habilitacoesMec->individualEscola);
		 if(!empty($habilitacoesMec->created)) 		$sqlQuery->set($habilitacoesMec->created);
		 if(!empty($habilitacoesMec->status)) 		$sqlQuery->set($habilitacoesMec->status);

		$sqlQuery->setNumber($habilitacoesMec->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM habilitacoes_mec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM habilitacoes_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM habilitacoes_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM habilitacoes_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM habilitacoes_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM habilitacoes_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM habilitacoes_mec WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM habilitacoes_mec WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM habilitacoes_mec WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM habilitacoes_mec WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM habilitacoes_mec WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return HabilitacoesMec 
	 */
	protected function readRow($row){
		$habilitacoesMec = new HabilitacoesMec();
		
		$habilitacoesMec->id = $row['id'];
		$habilitacoesMec->codigo = $row['codigo'];
		$habilitacoesMec->nome = $row['nome'];
		$habilitacoesMec->individualEscola = $row['individual_escola'];
		$habilitacoesMec->created = $row['created'];
		$habilitacoesMec->status = $row['status'];

		return $habilitacoesMec;
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
	 * @return HabilitacoesMec 
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