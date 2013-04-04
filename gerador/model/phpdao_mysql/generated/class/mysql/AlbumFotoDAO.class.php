<?php
/**
 * Classe operadora da tabela 'album_foto'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class AlbumFotoDAO extends Model implements AlbumFotoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AlbumFoto 
	 */
	public function load($id){
		$sql = 'SELECT * FROM album_foto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AlbumFoto      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM album_foto '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM album_foto '.$criterio.'';
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
		$sql = 'SELECT * FROM album_foto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param albumFoto primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM album_foto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AlbumFoto albumFoto
 	 */
	public function insert($albumFoto){
		$sql = 'INSERT INTO album_foto (foto, legenda, album_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($albumFoto->foto);
		$sqlQuery->set($albumFoto->legenda);
		$sqlQuery->setNumber($albumFoto->albumId);

		$id = $this->executeInsert($sqlQuery);	
		$albumFoto->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AlbumFoto albumFoto
 	 */
	public function update($albumFoto){
		$campos = "";
        
        
		 if(!empty($albumFoto->foto)) $campos .=' foto = ?,';
		 if(!empty($albumFoto->legenda)) $campos .=' legenda = ?,';
		 if(!empty($albumFoto->albumId)) $campos .=' album_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE album_foto SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($albumFoto->foto)) 		$sqlQuery->set($albumFoto->foto);
		 if(!empty($albumFoto->legenda)) 		$sqlQuery->set($albumFoto->legenda);
		 if(!empty($albumFoto->albumId)) 		$sqlQuery->setNumber($albumFoto->albumId);

		$sqlQuery->setNumber($albumFoto->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM album_foto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM album_foto WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLegenda($value){
		$sql = 'SELECT * FROM album_foto WHERE legenda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlbumId($value){
		$sql = 'SELECT * FROM album_foto WHERE album_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFoto($value){
		$sql = 'DELETE FROM album_foto WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLegenda($value){
		$sql = 'DELETE FROM album_foto WHERE legenda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlbumId($value){
		$sql = 'DELETE FROM album_foto WHERE album_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return AlbumFoto 
	 */
	protected function readRow($row){
		$albumFoto = new AlbumFoto();
		
		$albumFoto->id = $row['id'];
		$albumFoto->foto = $row['foto'];
		$albumFoto->legenda = $row['legenda'];
		$albumFoto->albumId = $row['album_id'];

		return $albumFoto;
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
	 * @return AlbumFoto 
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