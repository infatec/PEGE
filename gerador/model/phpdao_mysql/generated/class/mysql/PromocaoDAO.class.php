<?php
/**
 * Classe operadora da tabela 'promocao'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class PromocaoDAO extends Model implements PromocaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Promocao 
	 */
	public function load($id){
		$sql = 'SELECT * FROM promocao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Promocao      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM promocao '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM promocao '.$criterio.'';
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
		$sql = 'SELECT * FROM promocao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param promocao primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM promocao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Promocao promocao
 	 */
	public function insert($promocao){
		$sql = 'INSERT INTO promocao (data_inicio, data_fim, local, descricao, foto, created, status, sushi_id, pizzaria_id, bar_id, restaurante_id, cinema_id, hotel_id, mais_servicos_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($promocao->dataInicio);
		$sqlQuery->set($promocao->dataFim);
		$sqlQuery->set($promocao->local);
		$sqlQuery->set($promocao->descricao);
		$sqlQuery->set($promocao->foto);
		$sqlQuery->set($promocao->created);
		$sqlQuery->set($promocao->status);
		$sqlQuery->setNumber($promocao->sushiId);
		$sqlQuery->setNumber($promocao->pizzariaId);
		$sqlQuery->setNumber($promocao->barId);
		$sqlQuery->setNumber($promocao->restauranteId);
		$sqlQuery->setNumber($promocao->cinemaId);
		$sqlQuery->setNumber($promocao->hotelId);
		$sqlQuery->setNumber($promocao->maisServicosId);

		$id = $this->executeInsert($sqlQuery);	
		$promocao->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Promocao promocao
 	 */
	public function update($promocao){
		$campos = "";
        
        
		 if(!empty($promocao->dataInicio)) $campos .=' data_inicio = ?,';
		 if(!empty($promocao->dataFim)) $campos .=' data_fim = ?,';
		 if(!empty($promocao->local)) $campos .=' local = ?,';
		 if(!empty($promocao->descricao)) $campos .=' descricao = ?,';
		 if(!empty($promocao->foto)) $campos .=' foto = ?,';
		 if(!empty($promocao->created)) $campos .=' created = ?,';
		 if(!empty($promocao->status)) $campos .=' status = ?,';
		 if(!empty($promocao->sushiId)) $campos .=' sushi_id = ?,';
		 if(!empty($promocao->pizzariaId)) $campos .=' pizzaria_id = ?,';
		 if(!empty($promocao->barId)) $campos .=' bar_id = ?,';
		 if(!empty($promocao->restauranteId)) $campos .=' restaurante_id = ?,';
		 if(!empty($promocao->cinemaId)) $campos .=' cinema_id = ?,';
		 if(!empty($promocao->hotelId)) $campos .=' hotel_id = ?,';
		 if(!empty($promocao->maisServicosId)) $campos .=' mais_servicos_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE promocao SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($promocao->dataInicio)) 		$sqlQuery->set($promocao->dataInicio);
		 if(!empty($promocao->dataFim)) 		$sqlQuery->set($promocao->dataFim);
		 if(!empty($promocao->local)) 		$sqlQuery->set($promocao->local);
		 if(!empty($promocao->descricao)) 		$sqlQuery->set($promocao->descricao);
		 if(!empty($promocao->foto)) 		$sqlQuery->set($promocao->foto);
		 if(!empty($promocao->created)) 		$sqlQuery->set($promocao->created);
		 if(!empty($promocao->status)) 		$sqlQuery->set($promocao->status);
		 if(!empty($promocao->sushiId)) 		$sqlQuery->setNumber($promocao->sushiId);
		 if(!empty($promocao->pizzariaId)) 		$sqlQuery->setNumber($promocao->pizzariaId);
		 if(!empty($promocao->barId)) 		$sqlQuery->setNumber($promocao->barId);
		 if(!empty($promocao->restauranteId)) 		$sqlQuery->setNumber($promocao->restauranteId);
		 if(!empty($promocao->cinemaId)) 		$sqlQuery->setNumber($promocao->cinemaId);
		 if(!empty($promocao->hotelId)) 		$sqlQuery->setNumber($promocao->hotelId);
		 if(!empty($promocao->maisServicosId)) 		$sqlQuery->setNumber($promocao->maisServicosId);

		$sqlQuery->setNumber($promocao->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM promocao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataInicio($value){
		$sql = 'SELECT * FROM promocao WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFim($value){
		$sql = 'SELECT * FROM promocao WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocal($value){
		$sql = 'SELECT * FROM promocao WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM promocao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM promocao WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM promocao WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM promocao WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySushiId($value){
		$sql = 'SELECT * FROM promocao WHERE sushi_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPizzariaId($value){
		$sql = 'SELECT * FROM promocao WHERE pizzaria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBarId($value){
		$sql = 'SELECT * FROM promocao WHERE bar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRestauranteId($value){
		$sql = 'SELECT * FROM promocao WHERE restaurante_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCinemaId($value){
		$sql = 'SELECT * FROM promocao WHERE cinema_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHotelId($value){
		$sql = 'SELECT * FROM promocao WHERE hotel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaisServicosId($value){
		$sql = 'SELECT * FROM promocao WHERE mais_servicos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataInicio($value){
		$sql = 'DELETE FROM promocao WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFim($value){
		$sql = 'DELETE FROM promocao WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocal($value){
		$sql = 'DELETE FROM promocao WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM promocao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM promocao WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM promocao WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM promocao WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySushiId($value){
		$sql = 'DELETE FROM promocao WHERE sushi_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPizzariaId($value){
		$sql = 'DELETE FROM promocao WHERE pizzaria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBarId($value){
		$sql = 'DELETE FROM promocao WHERE bar_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRestauranteId($value){
		$sql = 'DELETE FROM promocao WHERE restaurante_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCinemaId($value){
		$sql = 'DELETE FROM promocao WHERE cinema_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHotelId($value){
		$sql = 'DELETE FROM promocao WHERE hotel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaisServicosId($value){
		$sql = 'DELETE FROM promocao WHERE mais_servicos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Promocao 
	 */
	protected function readRow($row){
		$promocao = new Promocao();
		
		$promocao->id = $row['id'];
		$promocao->dataInicio = $row['data_inicio'];
		$promocao->dataFim = $row['data_fim'];
		$promocao->local = $row['local'];
		$promocao->descricao = $row['descricao'];
		$promocao->foto = $row['foto'];
		$promocao->created = $row['created'];
		$promocao->status = $row['status'];
		$promocao->sushiId = $row['sushi_id'];
		$promocao->pizzariaId = $row['pizzaria_id'];
		$promocao->barId = $row['bar_id'];
		$promocao->restauranteId = $row['restaurante_id'];
		$promocao->cinemaId = $row['cinema_id'];
		$promocao->hotelId = $row['hotel_id'];
		$promocao->maisServicosId = $row['mais_servicos_id'];

		return $promocao;
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
	 * @return Promocao 
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