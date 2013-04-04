<?php
/**
 * Classe operadora da tabela 'filmes_cartaz'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class FilmesCartazDAO extends Model implements FilmesCartazI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FilmesCartaz 
	 */
	public function load($id){
		$sql = 'SELECT * FROM filmes_cartaz WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FilmesCartaz      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM filmes_cartaz '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM filmes_cartaz '.$criterio.'';
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
		$sql = 'SELECT * FROM filmes_cartaz ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param filmesCartaz primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM filmes_cartaz WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FilmesCartaz filmesCartaz
 	 */
	public function insert($filmesCartaz){
		$sql = 'INSERT INTO filmes_cartaz (cinema_id, titulo, descricao, sinopse, emped_youtube, status, created) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($filmesCartaz->cinemaId);
		$sqlQuery->set($filmesCartaz->titulo);
		$sqlQuery->set($filmesCartaz->descricao);
		$sqlQuery->set($filmesCartaz->sinopse);
		$sqlQuery->set($filmesCartaz->empedYoutube);
		$sqlQuery->set($filmesCartaz->status);
		$sqlQuery->set($filmesCartaz->created);

		$id = $this->executeInsert($sqlQuery);	
		$filmesCartaz->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FilmesCartaz filmesCartaz
 	 */
	public function update($filmesCartaz){
		$campos = "";
        
        
		 if(!empty($filmesCartaz->cinemaId)) $campos .=' cinema_id = ?,';
		 if(!empty($filmesCartaz->titulo)) $campos .=' titulo = ?,';
		 if(!empty($filmesCartaz->descricao)) $campos .=' descricao = ?,';
		 if(!empty($filmesCartaz->sinopse)) $campos .=' sinopse = ?,';
		 if(!empty($filmesCartaz->empedYoutube)) $campos .=' emped_youtube = ?,';
		 if(!empty($filmesCartaz->status)) $campos .=' status = ?,';
		 if(!empty($filmesCartaz->created)) $campos .=' created = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE filmes_cartaz SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($filmesCartaz->cinemaId)) 		$sqlQuery->setNumber($filmesCartaz->cinemaId);
		 if(!empty($filmesCartaz->titulo)) 		$sqlQuery->set($filmesCartaz->titulo);
		 if(!empty($filmesCartaz->descricao)) 		$sqlQuery->set($filmesCartaz->descricao);
		 if(!empty($filmesCartaz->sinopse)) 		$sqlQuery->set($filmesCartaz->sinopse);
		 if(!empty($filmesCartaz->empedYoutube)) 		$sqlQuery->set($filmesCartaz->empedYoutube);
		 if(!empty($filmesCartaz->status)) 		$sqlQuery->set($filmesCartaz->status);
		 if(!empty($filmesCartaz->created)) 		$sqlQuery->set($filmesCartaz->created);

		$sqlQuery->setNumber($filmesCartaz->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM filmes_cartaz';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCinemaId($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE cinema_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySinopse($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE sinopse = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpedYoutube($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE emped_youtube = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM filmes_cartaz WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCinemaId($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE cinema_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySinopse($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE sinopse = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpedYoutube($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE emped_youtube = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM filmes_cartaz WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return FilmesCartaz 
	 */
	protected function readRow($row){
		$filmesCartaz = new FilmesCartaz();
		
		$filmesCartaz->id = $row['id'];
		$filmesCartaz->cinemaId = $row['cinema_id'];
		$filmesCartaz->titulo = $row['titulo'];
		$filmesCartaz->descricao = $row['descricao'];
		$filmesCartaz->sinopse = $row['sinopse'];
		$filmesCartaz->empedYoutube = $row['emped_youtube'];
		$filmesCartaz->status = $row['status'];
		$filmesCartaz->created = $row['created'];

		return $filmesCartaz;
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
	 * @return FilmesCartaz 
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