<?php
/**
 * Classe operadora da tabela 'festa'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class FestaDAO extends Model implements FestaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Festa 
	 */
	public function load($id){
		$sql = 'SELECT * FROM festa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Festa      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM festa '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM festa '.$criterio.'';
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
		$sql = 'SELECT * FROM festa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param festa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM festa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Festa festa
 	 */
	public function insert($festa){
		$sql = 'INSERT INTO festa (clube_id, bar_id, restaurante_id, cinema_id, hotel_id, local, boate_id, cidade_id, data_festa, hora_inicio, descricao, foto, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($festa->clubeId);
		$sqlQuery->setNumber($festa->barId);
		$sqlQuery->setNumber($festa->restauranteId);
		$sqlQuery->setNumber($festa->cinemaId);
		$sqlQuery->setNumber($festa->hotelId);
		$sqlQuery->set($festa->local);
		$sqlQuery->setNumber($festa->boateId);
		$sqlQuery->setNumber($festa->cidadeId);
		$sqlQuery->set($festa->dataFesta);
		$sqlQuery->set($festa->horaInicio);
		$sqlQuery->set($festa->descricao);
		$sqlQuery->set($festa->foto);
		$sqlQuery->set($festa->created);
		$sqlQuery->set($festa->status);

		$id = $this->executeInsert($sqlQuery);	
		$festa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Festa festa
 	 */
	public function update($festa){
		$campos = "";
        
        
		 if(!empty($festa->clubeId)) $campos .=' clube_id = ?,';
		 if(!empty($festa->barId)) $campos .=' bar_id = ?,';
		 if(!empty($festa->restauranteId)) $campos .=' restaurante_id = ?,';
		 if(!empty($festa->cinemaId)) $campos .=' cinema_id = ?,';
		 if(!empty($festa->hotelId)) $campos .=' hotel_id = ?,';
		 if(!empty($festa->local)) $campos .=' local = ?,';
		 if(!empty($festa->boateId)) $campos .=' boate_id = ?,';
		 if(!empty($festa->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($festa->dataFesta)) $campos .=' data_festa = ?,';
		 if(!empty($festa->horaInicio)) $campos .=' hora_inicio = ?,';
		 if(!empty($festa->descricao)) $campos .=' descricao = ?,';
		 if(!empty($festa->foto)) $campos .=' foto = ?,';
		 if(!empty($festa->created)) $campos .=' created = ?,';
		 if(!empty($festa->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE festa SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($festa->clubeId)) 		$sqlQuery->setNumber($festa->clubeId);
		 if(!empty($festa->barId)) 		$sqlQuery->setNumber($festa->barId);
		 if(!empty($festa->restauranteId)) 		$sqlQuery->setNumber($festa->restauranteId);
		 if(!empty($festa->cinemaId)) 		$sqlQuery->setNumber($festa->cinemaId);
		 if(!empty($festa->hotelId)) 		$sqlQuery->setNumber($festa->hotelId);
		 if(!empty($festa->local)) 		$sqlQuery->set($festa->local);
		 if(!empty($festa->boateId)) 		$sqlQuery->setNumber($festa->boateId);
		 if(!empty($festa->cidadeId)) 		$sqlQuery->setNumber($festa->cidadeId);
		 if(!empty($festa->dataFesta)) 		$sqlQuery->set($festa->dataFesta);
		 if(!empty($festa->horaInicio)) 		$sqlQuery->set($festa->horaInicio);
		 if(!empty($festa->descricao)) 		$sqlQuery->set($festa->descricao);
		 if(!empty($festa->foto)) 		$sqlQuery->set($festa->foto);
		 if(!empty($festa->created)) 		$sqlQuery->set($festa->created);
		 if(!empty($festa->status)) 		$sqlQuery->set($festa->status);

		$sqlQuery->setNumber($festa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM festa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByClubeId($value){
		$sql = 'SELECT * FROM festa WHERE clube_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBarId($value){
		$sql = 'SELECT * FROM festa WHERE bar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRestauranteId($value){
		$sql = 'SELECT * FROM festa WHERE restaurante_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCinemaId($value){
		$sql = 'SELECT * FROM festa WHERE cinema_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHotelId($value){
		$sql = 'SELECT * FROM festa WHERE hotel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocal($value){
		$sql = 'SELECT * FROM festa WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBoateId($value){
		$sql = 'SELECT * FROM festa WHERE boate_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM festa WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFesta($value){
		$sql = 'SELECT * FROM festa WHERE data_festa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraInicio($value){
		$sql = 'SELECT * FROM festa WHERE hora_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM festa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM festa WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM festa WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM festa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByClubeId($value){
		$sql = 'DELETE FROM festa WHERE clube_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBarId($value){
		$sql = 'DELETE FROM festa WHERE bar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRestauranteId($value){
		$sql = 'DELETE FROM festa WHERE restaurante_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCinemaId($value){
		$sql = 'DELETE FROM festa WHERE cinema_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHotelId($value){
		$sql = 'DELETE FROM festa WHERE hotel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocal($value){
		$sql = 'DELETE FROM festa WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBoateId($value){
		$sql = 'DELETE FROM festa WHERE boate_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM festa WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFesta($value){
		$sql = 'DELETE FROM festa WHERE data_festa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraInicio($value){
		$sql = 'DELETE FROM festa WHERE hora_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM festa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM festa WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM festa WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM festa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Festa 
	 */
	protected function readRow($row){
		$festa = new Festa();
		
		$festa->id = $row['id'];
		$festa->clubeId = $row['clube_id'];
		$festa->barId = $row['bar_id'];
		$festa->restauranteId = $row['restaurante_id'];
		$festa->cinemaId = $row['cinema_id'];
		$festa->hotelId = $row['hotel_id'];
		$festa->local = $row['local'];
		$festa->boateId = $row['boate_id'];
		$festa->cidadeId = $row['cidade_id'];
		$festa->dataFesta = $row['data_festa'];
		$festa->horaInicio = $row['hora_inicio'];
		$festa->descricao = $row['descricao'];
		$festa->foto = $row['foto'];
		$festa->created = $row['created'];
		$festa->status = $row['status'];

		return $festa;
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
	 * @return Festa 
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