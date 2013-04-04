<?php
/**
 * Classe operadora da tabela 'redireciona_blog'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-06-23 08:39
 */
class RedirecionaBlogDAO extends Model implements RedirecionaBlogI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return RedirecionaBlog 
	 */
	public function load($id){
		$sql = 'SELECT * FROM redireciona_blog WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return RedirecionaBlog      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM redireciona_blog '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM redireciona_blog '.$criterio.'';
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
		$sql = 'SELECT * FROM redireciona_blog ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param redirecionaBlog primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM redireciona_blog WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param RedirecionaBlog redirecionaBlog
 	 */
	public function insert($redirecionaBlog){
		$sql = 'INSERT INTO redireciona_blog (titulo, resumo, link, created, status, foto_destaque) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($redirecionaBlog->titulo);
		$sqlQuery->set($redirecionaBlog->resumo);
		$sqlQuery->set($redirecionaBlog->link);
		$sqlQuery->set($redirecionaBlog->created);
		$sqlQuery->set($redirecionaBlog->status);
		$sqlQuery->set($redirecionaBlog->fotoDestaque);

		$id = $this->executeInsert($sqlQuery);	
		$redirecionaBlog->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param RedirecionaBlog redirecionaBlog
 	 */
	public function update($redirecionaBlog){
		$campos = "";
        
        
		 if(!empty($redirecionaBlog->titulo)) $campos .=' titulo = ?,';
		 if(!empty($redirecionaBlog->resumo)) $campos .=' resumo = ?,';
		 if(!empty($redirecionaBlog->link)) $campos .=' link = ?,';
		 if(!empty($redirecionaBlog->created)) $campos .=' created = ?,';
		 if(!empty($redirecionaBlog->status)) $campos .=' status = ?,';
		 if(!empty($redirecionaBlog->fotoDestaque)) $campos .=' foto_destaque = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE redireciona_blog SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($redirecionaBlog->titulo)) 		$sqlQuery->set($redirecionaBlog->titulo);
		 if(!empty($redirecionaBlog->resumo)) 		$sqlQuery->set($redirecionaBlog->resumo);
		 if(!empty($redirecionaBlog->link)) 		$sqlQuery->set($redirecionaBlog->link);
		 if(!empty($redirecionaBlog->created)) 		$sqlQuery->set($redirecionaBlog->created);
		 if(!empty($redirecionaBlog->status)) 		$sqlQuery->set($redirecionaBlog->status);
		 if(!empty($redirecionaBlog->fotoDestaque)) 		$sqlQuery->set($redirecionaBlog->fotoDestaque);

		$sqlQuery->setNumber($redirecionaBlog->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM redireciona_blog';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM redireciona_blog WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByResumo($value){
		$sql = 'SELECT * FROM redireciona_blog WHERE resumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM redireciona_blog WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM redireciona_blog WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM redireciona_blog WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFotoDestaque($value){
		$sql = 'SELECT * FROM redireciona_blog WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM redireciona_blog WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByResumo($value){
		$sql = 'DELETE FROM redireciona_blog WHERE resumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM redireciona_blog WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM redireciona_blog WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM redireciona_blog WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFotoDestaque($value){
		$sql = 'DELETE FROM redireciona_blog WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return RedirecionaBlog 
	 */
	protected function readRow($row){
		$redirecionaBlog = new RedirecionaBlog();
		
		$redirecionaBlog->id = $row['id'];
		$redirecionaBlog->titulo = $row['titulo'];
		$redirecionaBlog->resumo = $row['resumo'];
		$redirecionaBlog->link = $row['link'];
		$redirecionaBlog->created = $row['created'];
		$redirecionaBlog->status = $row['status'];
		$redirecionaBlog->fotoDestaque = $row['foto_destaque'];

		return $redirecionaBlog;
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
	 * @return RedirecionaBlog 
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