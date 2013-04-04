<?php
/**
 * Classe operadora da tabela 'ocorre_acad'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class OcorreAcadDAO extends Model implements OcorreAcadI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return OcorreAcad 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ocorre_acad WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return OcorreAcad      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM ocorre_acad '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM ocorre_acad '.$criterio.'';
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
		$sql = 'SELECT * FROM ocorre_acad ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param ocorreAcad primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ocorre_acad WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param OcorreAcad ocorreAcad
 	 */
	public function insert($ocorreAcad){
		$sql = 'INSERT INTO ocorre_acad (sigla, descricao, created, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ocorreAcad->sigla);
		$sqlQuery->set($ocorreAcad->descricao);
		$sqlQuery->set($ocorreAcad->created);
		$sqlQuery->setNumber($ocorreAcad->status);

		$id = $this->executeInsert($sqlQuery);	
		$ocorreAcad->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param OcorreAcad ocorreAcad
 	 */
	public function update($ocorreAcad){
		$campos = "";
        
        
		 if(!empty($ocorreAcad->sigla)) $campos .=' sigla = ?,';
		 if(!empty($ocorreAcad->descricao)) $campos .=' descricao = ?,';
		 if(!empty($ocorreAcad->created)) $campos .=' created = ?,';
		 if(!empty($ocorreAcad->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE ocorre_acad SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($ocorreAcad->sigla)) 		$sqlQuery->set($ocorreAcad->sigla);
		 if(!empty($ocorreAcad->descricao)) 		$sqlQuery->set($ocorreAcad->descricao);
		 if(!empty($ocorreAcad->created)) 		$sqlQuery->set($ocorreAcad->created);
		 if(!empty($ocorreAcad->status)) 		$sqlQuery->setNumber($ocorreAcad->status);

		$sqlQuery->setNumber($ocorreAcad->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM ocorre_acad';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySigla($value){
		$sql = 'SELECT * FROM ocorre_acad WHERE sigla = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM ocorre_acad WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM ocorre_acad WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM ocorre_acad WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySigla($value){
		$sql = 'DELETE FROM ocorre_acad WHERE sigla = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM ocorre_acad WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM ocorre_acad WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM ocorre_acad WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return OcorreAcad 
	 */
	protected function readRow($row){
		$ocorreAcad = new OcorreAcad();
		
		$ocorreAcad->id = $row['id'];
		$ocorreAcad->sigla = $row['sigla'];
		$ocorreAcad->descricao = $row['descricao'];
		$ocorreAcad->created = $row['created'];
		$ocorreAcad->status = $row['status'];

		return $ocorreAcad;
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
	 * @return OcorreAcad 
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