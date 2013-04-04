<?php
/**
 * Classe operadora da tabela 'cinema'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class CinemaDAO extends Model implements CinemaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Cinema 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cinema WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Cinema      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM cinema '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM cinema '.$criterio.'';
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
		$sql = 'SELECT * FROM cinema ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param cinema primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cinema WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Cinema cinema
 	 */
	public function insert($cinema){
		$sql = 'INSERT INTO cinema (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, identificacao, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cinema->cidadeId);
		$sqlQuery->set($cinema->nome);
		$sqlQuery->set($cinema->descricao);
		$sqlQuery->set($cinema->foto);
		$sqlQuery->set($cinema->endereco);
		$sqlQuery->set($cinema->bairro);
		$sqlQuery->set($cinema->cidade);
		$sqlQuery->set($cinema->estado);
		$sqlQuery->set($cinema->created);
		$sqlQuery->setNumber($cinema->status);
		$sqlQuery->set($cinema->identificacao);
		$sqlQuery->set($cinema->latitude);
		$sqlQuery->set($cinema->longitude);

		$id = $this->executeInsert($sqlQuery);	
		$cinema->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Cinema cinema
 	 */
	public function update($cinema){
		$campos = "";
        
        
		 if(!empty($cinema->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($cinema->nome)) $campos .=' nome = ?,';
		 if(!empty($cinema->descricao)) $campos .=' descricao = ?,';
		 if(!empty($cinema->foto)) $campos .=' foto = ?,';
		 if(!empty($cinema->endereco)) $campos .=' endereco = ?,';
		 if(!empty($cinema->bairro)) $campos .=' bairro = ?,';
		 if(!empty($cinema->cidade)) $campos .=' cidade = ?,';
		 if(!empty($cinema->estado)) $campos .=' estado = ?,';
		 if(!empty($cinema->created)) $campos .=' created = ?,';
		 if(!empty($cinema->status)) $campos .=' status = ?,';
		 if(!empty($cinema->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($cinema->latitude)) $campos .=' latitude = ?,';
		 if(!empty($cinema->longitude)) $campos .=' longitude = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE cinema SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($cinema->cidadeId)) 		$sqlQuery->setNumber($cinema->cidadeId);
		 if(!empty($cinema->nome)) 		$sqlQuery->set($cinema->nome);
		 if(!empty($cinema->descricao)) 		$sqlQuery->set($cinema->descricao);
		 if(!empty($cinema->foto)) 		$sqlQuery->set($cinema->foto);
		 if(!empty($cinema->endereco)) 		$sqlQuery->set($cinema->endereco);
		 if(!empty($cinema->bairro)) 		$sqlQuery->set($cinema->bairro);
		 if(!empty($cinema->cidade)) 		$sqlQuery->set($cinema->cidade);
		 if(!empty($cinema->estado)) 		$sqlQuery->set($cinema->estado);
		 if(!empty($cinema->created)) 		$sqlQuery->set($cinema->created);
		 if(!empty($cinema->status)) 		$sqlQuery->setNumber($cinema->status);
		 if(!empty($cinema->identificacao)) 		$sqlQuery->set($cinema->identificacao);
		 if(!empty($cinema->latitude)) 		$sqlQuery->set($cinema->latitude);
		 if(!empty($cinema->longitude)) 		$sqlQuery->set($cinema->longitude);

		$sqlQuery->setNumber($cinema->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM cinema';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM cinema WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM cinema WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM cinema WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM cinema WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM cinema WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM cinema WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM cinema WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM cinema WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM cinema WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM cinema WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM cinema WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM cinema WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM cinema WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM cinema WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM cinema WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM cinema WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM cinema WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM cinema WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM cinema WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM cinema WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM cinema WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM cinema WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cinema WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM cinema WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM cinema WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM cinema WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Cinema 
	 */
	protected function readRow($row){
		$cinema = new Cinema();
		
		$cinema->id = $row['id'];
		$cinema->cidadeId = $row['cidade_id'];
		$cinema->nome = $row['nome'];
		$cinema->descricao = $row['descricao'];
		$cinema->foto = $row['foto'];
		$cinema->endereco = $row['endereco'];
		$cinema->bairro = $row['bairro'];
		$cinema->cidade = $row['cidade'];
		$cinema->estado = $row['estado'];
		$cinema->created = $row['created'];
		$cinema->status = $row['status'];
		$cinema->identificacao = $row['identificacao'];
		$cinema->latitude = $row['latitude'];
		$cinema->longitude = $row['longitude'];

		return $cinema;
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
	 * @return Cinema 
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