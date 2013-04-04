<?php
/**
 * Classe operadora da tabela 'hotel'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class HotelDAO extends Model implements HotelI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Hotel 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hotel WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Hotel      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM hotel '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM hotel '.$criterio.'';
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
		$sql = 'SELECT * FROM hotel ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param hotel primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM hotel WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Hotel hotel
 	 */
	public function insert($hotel){
		$sql = 'INSERT INTO hotel (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, identificacao, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hotel->cidadeId);
		$sqlQuery->set($hotel->nome);
		$sqlQuery->set($hotel->descricao);
		$sqlQuery->set($hotel->foto);
		$sqlQuery->set($hotel->endereco);
		$sqlQuery->set($hotel->bairro);
		$sqlQuery->set($hotel->cidade);
		$sqlQuery->set($hotel->estado);
		$sqlQuery->set($hotel->created);
		$sqlQuery->set($hotel->status);
		$sqlQuery->set($hotel->identificacao);
		$sqlQuery->set($hotel->latitude);
		$sqlQuery->set($hotel->longitude);

		$id = $this->executeInsert($sqlQuery);	
		$hotel->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Hotel hotel
 	 */
	public function update($hotel){
		$campos = "";
        
        
		 if(!empty($hotel->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($hotel->nome)) $campos .=' nome = ?,';
		 if(!empty($hotel->descricao)) $campos .=' descricao = ?,';
		 if(!empty($hotel->foto)) $campos .=' foto = ?,';
		 if(!empty($hotel->endereco)) $campos .=' endereco = ?,';
		 if(!empty($hotel->bairro)) $campos .=' bairro = ?,';
		 if(!empty($hotel->cidade)) $campos .=' cidade = ?,';
		 if(!empty($hotel->estado)) $campos .=' estado = ?,';
		 if(!empty($hotel->created)) $campos .=' created = ?,';
		 if(!empty($hotel->status)) $campos .=' status = ?,';
		 if(!empty($hotel->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($hotel->latitude)) $campos .=' latitude = ?,';
		 if(!empty($hotel->longitude)) $campos .=' longitude = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE hotel SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($hotel->cidadeId)) 		$sqlQuery->setNumber($hotel->cidadeId);
		 if(!empty($hotel->nome)) 		$sqlQuery->set($hotel->nome);
		 if(!empty($hotel->descricao)) 		$sqlQuery->set($hotel->descricao);
		 if(!empty($hotel->foto)) 		$sqlQuery->set($hotel->foto);
		 if(!empty($hotel->endereco)) 		$sqlQuery->set($hotel->endereco);
		 if(!empty($hotel->bairro)) 		$sqlQuery->set($hotel->bairro);
		 if(!empty($hotel->cidade)) 		$sqlQuery->set($hotel->cidade);
		 if(!empty($hotel->estado)) 		$sqlQuery->set($hotel->estado);
		 if(!empty($hotel->created)) 		$sqlQuery->set($hotel->created);
		 if(!empty($hotel->status)) 		$sqlQuery->set($hotel->status);
		 if(!empty($hotel->identificacao)) 		$sqlQuery->set($hotel->identificacao);
		 if(!empty($hotel->latitude)) 		$sqlQuery->set($hotel->latitude);
		 if(!empty($hotel->longitude)) 		$sqlQuery->set($hotel->longitude);

		$sqlQuery->setNumber($hotel->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM hotel';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM hotel WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM hotel WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM hotel WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM hotel WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM hotel WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM hotel WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM hotel WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM hotel WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM hotel WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM hotel WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM hotel WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM hotel WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM hotel WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM hotel WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM hotel WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM hotel WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM hotel WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM hotel WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM hotel WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM hotel WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM hotel WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM hotel WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM hotel WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM hotel WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM hotel WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM hotel WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Hotel 
	 */
	protected function readRow($row){
		$hotel = new Hotel();
		
		$hotel->id = $row['id'];
		$hotel->cidadeId = $row['cidade_id'];
		$hotel->nome = $row['nome'];
		$hotel->descricao = $row['descricao'];
		$hotel->foto = $row['foto'];
		$hotel->endereco = $row['endereco'];
		$hotel->bairro = $row['bairro'];
		$hotel->cidade = $row['cidade'];
		$hotel->estado = $row['estado'];
		$hotel->created = $row['created'];
		$hotel->status = $row['status'];
		$hotel->identificacao = $row['identificacao'];
		$hotel->latitude = $row['latitude'];
		$hotel->longitude = $row['longitude'];

		return $hotel;
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
	 * @return Hotel 
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