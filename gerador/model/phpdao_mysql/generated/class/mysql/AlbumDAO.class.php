<?php
/**
 * Classe operadora da tabela 'album'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class AlbumDAO extends Model implements AlbumI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Album 
	 */
	public function load($id){
		$sql = 'SELECT * FROM album WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Album      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM album '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM album '.$criterio.'';
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
		$sql = 'SELECT * FROM album ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param album primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM album WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Album album
 	 */
	public function insert($album){
		$sql = 'INSERT INTO album (titulo, subtitulo, data_entrada, created, status, foto_destaque, url, clicks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($album->titulo);
		$sqlQuery->set($album->subtitulo);
		$sqlQuery->set($album->dataEntrada);
		$sqlQuery->set($album->created);
		$sqlQuery->set($album->status);
		$sqlQuery->set($album->fotoDestaque);
		$sqlQuery->set($album->url);
		$sqlQuery->setNumber($album->click);

		$id = $this->executeInsert($sqlQuery);	
		$album->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Album album
 	 */
	public function update($album){
		$campos = "";
        
        
		 if(!empty($album->titulo)) $campos .=' titulo = ?,';
		 if(!empty($album->subtitulo)) $campos .=' subtitulo = ?,';
		 if(!empty($album->dataEntrada)) $campos .=' data_entrada = ?,';
		 if(!empty($album->created)) $campos .=' created = ?,';
		 if(!empty($album->status)) $campos .=' status = ?,';
		 if(!empty($album->fotoDestaque)) $campos .=' foto_destaque = ?,';
		 if(!empty($album->url)) $campos .=' url = ?,';
		 if(!empty($album->click)) $campos .=' clicks = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE album SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($album->titulo)) 		$sqlQuery->set($album->titulo);
		 if(!empty($album->subtitulo)) 		$sqlQuery->set($album->subtitulo);
		 if(!empty($album->dataEntrada)) 		$sqlQuery->set($album->dataEntrada);
		 if(!empty($album->created)) 		$sqlQuery->set($album->created);
		 if(!empty($album->status)) 		$sqlQuery->set($album->status);
		 if(!empty($album->fotoDestaque)) 		$sqlQuery->set($album->fotoDestaque);
		 if(!empty($album->url)) 		$sqlQuery->set($album->url);
		 if(!empty($album->click)) 		$sqlQuery->setNumber($album->click);

		$sqlQuery->setNumber($album->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM album';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM album WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubtitulo($value){
		$sql = 'SELECT * FROM album WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEntrada($value){
		$sql = 'SELECT * FROM album WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM album WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM album WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFotoDestaque($value){
		$sql = 'SELECT * FROM album WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrl($value){
		$sql = 'SELECT * FROM album WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClicks($value){
		$sql = 'SELECT * FROM album WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM album WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubtitulo($value){
		$sql = 'DELETE FROM album WHERE subtitulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEntrada($value){
		$sql = 'DELETE FROM album WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM album WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM album WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFotoDestaque($value){
		$sql = 'DELETE FROM album WHERE foto_destaque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrl($value){
		$sql = 'DELETE FROM album WHERE url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClicks($value){
		$sql = 'DELETE FROM album WHERE clicks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Album 
	 */
	protected function readRow($row){
		$album = new Album();
		
		$album->id = $row['id'];
		$album->titulo = $row['titulo'];
		$album->subtitulo = $row['subtitulo'];
		$album->dataEntrada = $row['data_entrada'];
		$album->created = $row['created'];
		$album->status = $row['status'];
		$album->fotoDestaque = $row['foto_destaque'];
		$album->url = $row['url'];
		$album->click = $row['clicks'];

		return $album;
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
	 * @return Album 
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