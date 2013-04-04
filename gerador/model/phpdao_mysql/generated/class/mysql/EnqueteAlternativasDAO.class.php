<?php
/**
 * Classe operadora da tabela 'enquete_alternativas'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-05-21 16:32
 */
class EnqueteAlternativasDAO extends Model implements EnqueteAlternativasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return EnqueteAlternativas 
	 */
	public function load($id){
		$sql = 'SELECT * FROM enquete_alternativas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return EnqueteAlternativas      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM enquete_alternativas '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM enquete_alternativas '.$criterio.'';
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
		$sql = 'SELECT * FROM enquete_alternativas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param enqueteAlternativa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM enquete_alternativas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param EnqueteAlternativas enqueteAlternativa
 	 */
	public function insert($enqueteAlternativa){
		$sql = 'INSERT INTO enquete_alternativas (enquete_id, resposta, contator, created, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($enqueteAlternativa->enqueteId);
		$sqlQuery->set($enqueteAlternativa->resposta);
		$sqlQuery->setNumber($enqueteAlternativa->contator);
		$sqlQuery->set($enqueteAlternativa->created);
		$sqlQuery->set($enqueteAlternativa->status);

		$id = $this->executeInsert($sqlQuery);	
		$enqueteAlternativa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param EnqueteAlternativas enqueteAlternativa
 	 */
	public function update($enqueteAlternativa){
		$campos = "";
        
        
		 if(!empty($enqueteAlternativa->enqueteId)) $campos .=' enquete_id = ?,';
		 if(!empty($enqueteAlternativa->resposta)) $campos .=' resposta = ?,';
		 if(!empty($enqueteAlternativa->contator)) $campos .=' contator = ?,';
		 if(!empty($enqueteAlternativa->created)) $campos .=' created = ?,';
		 if(!empty($enqueteAlternativa->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE enquete_alternativas SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($enqueteAlternativa->enqueteId)) 		$sqlQuery->setNumber($enqueteAlternativa->enqueteId);
		 if(!empty($enqueteAlternativa->resposta)) 		$sqlQuery->set($enqueteAlternativa->resposta);
		 if(!empty($enqueteAlternativa->contator)) 		$sqlQuery->setNumber($enqueteAlternativa->contator);
		 if(!empty($enqueteAlternativa->created)) 		$sqlQuery->set($enqueteAlternativa->created);
		 if(!empty($enqueteAlternativa->status)) 		$sqlQuery->set($enqueteAlternativa->status);

		$sqlQuery->setNumber($enqueteAlternativa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM enquete_alternativas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEnqueteId($value){
		$sql = 'SELECT * FROM enquete_alternativas WHERE enquete_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByResposta($value){
		$sql = 'SELECT * FROM enquete_alternativas WHERE resposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContator($value){
		$sql = 'SELECT * FROM enquete_alternativas WHERE contator = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM enquete_alternativas WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM enquete_alternativas WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEnqueteId($value){
		$sql = 'DELETE FROM enquete_alternativas WHERE enquete_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByResposta($value){
		$sql = 'DELETE FROM enquete_alternativas WHERE resposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContator($value){
		$sql = 'DELETE FROM enquete_alternativas WHERE contator = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM enquete_alternativas WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM enquete_alternativas WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return EnqueteAlternativas 
	 */
	protected function readRow($row){
		$enqueteAlternativa = new EnqueteAlternativa();
		
		$enqueteAlternativa->id = $row['id'];
		$enqueteAlternativa->enqueteId = $row['enquete_id'];
		$enqueteAlternativa->resposta = $row['resposta'];
		$enqueteAlternativa->contator = $row['contator'];
		$enqueteAlternativa->created = $row['created'];
		$enqueteAlternativa->status = $row['status'];

		return $enqueteAlternativa;
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
	 * @return EnqueteAlternativas 
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