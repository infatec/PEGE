<?php
/**
 * Classe operadora da tabela 'mp3'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-06-23 08:39
 */
class Mp3DAO extends Model implements Mp3I{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Mp3 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mp3 WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Mp3      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM mp3 '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM mp3 '.$criterio.'';
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
		$sql = 'SELECT * FROM mp3 ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param mp3 primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM mp3 WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Mp3 mp3
 	 */
	public function insert($mp3){
		$sql = 'INSERT INTO mp3 (banda, cantor, arquivo, created, status, musica, link_download) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mp3->banda);
		$sqlQuery->set($mp3->cantor);
		$sqlQuery->set($mp3->arquivo);
		$sqlQuery->set($mp3->created);
		$sqlQuery->set($mp3->status);
		$sqlQuery->set($mp3->musica);
		$sqlQuery->set($mp3->linkDownload);

		$id = $this->executeInsert($sqlQuery);	
		$mp3->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Mp3 mp3
 	 */
	public function update($mp3){
		$campos = "";
        
        
		 if(!empty($mp3->banda)) $campos .=' banda = ?,';
		 if(!empty($mp3->cantor)) $campos .=' cantor = ?,';
		 if(!empty($mp3->arquivo)) $campos .=' arquivo = ?,';
		 if(!empty($mp3->created)) $campos .=' created = ?,';
		 if(!empty($mp3->status)) $campos .=' status = ?,';
		 if(!empty($mp3->musica)) $campos .=' musica = ?,';
		 if(!empty($mp3->linkDownload)) $campos .=' link_download = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE mp3 SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($mp3->banda)) 		$sqlQuery->set($mp3->banda);
		 if(!empty($mp3->cantor)) 		$sqlQuery->set($mp3->cantor);
		 if(!empty($mp3->arquivo)) 		$sqlQuery->set($mp3->arquivo);
		 if(!empty($mp3->created)) 		$sqlQuery->set($mp3->created);
		 if(!empty($mp3->status)) 		$sqlQuery->set($mp3->status);
		 if(!empty($mp3->musica)) 		$sqlQuery->set($mp3->musica);
		 if(!empty($mp3->linkDownload)) 		$sqlQuery->set($mp3->linkDownload);

		$sqlQuery->setNumber($mp3->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM mp3';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByBanda($value){
		$sql = 'SELECT * FROM mp3 WHERE banda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantor($value){
		$sql = 'SELECT * FROM mp3 WHERE cantor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArquivo($value){
		$sql = 'SELECT * FROM mp3 WHERE arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM mp3 WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM mp3 WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMusica($value){
		$sql = 'SELECT * FROM mp3 WHERE musica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkDownload($value){
		$sql = 'SELECT * FROM mp3 WHERE link_download = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByBanda($value){
		$sql = 'DELETE FROM mp3 WHERE banda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantor($value){
		$sql = 'DELETE FROM mp3 WHERE cantor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArquivo($value){
		$sql = 'DELETE FROM mp3 WHERE arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM mp3 WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM mp3 WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMusica($value){
		$sql = 'DELETE FROM mp3 WHERE musica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkDownload($value){
		$sql = 'DELETE FROM mp3 WHERE link_download = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Mp3 
	 */
	protected function readRow($row){
		$mp3 = new Mp3();
		
		$mp3->id = $row['id'];
		$mp3->banda = $row['banda'];
		$mp3->cantor = $row['cantor'];
		$mp3->arquivo = $row['arquivo'];
		$mp3->created = $row['created'];
		$mp3->status = $row['status'];
		$mp3->musica = $row['musica'];
		$mp3->linkDownload = $row['link_download'];

		return $mp3;
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
	 * @return Mp3 
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