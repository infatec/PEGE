<?php
/**
 * Classe operadora da tabela 'restaurante'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class RestauranteDAO extends Model implements RestauranteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Restaurante 
	 */
	public function load($id){
		$sql = 'SELECT * FROM restaurante WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Restaurante      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM restaurante '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM restaurante '.$criterio.'';
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
		$sql = 'SELECT * FROM restaurante ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param restaurante primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM restaurante WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Restaurante restaurante
 	 */
	public function insert($restaurante){
		$sql = 'INSERT INTO restaurante (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, identificacao, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($restaurante->cidadeId);
		$sqlQuery->set($restaurante->nome);
		$sqlQuery->set($restaurante->descricao);
		$sqlQuery->set($restaurante->foto);
		$sqlQuery->set($restaurante->endereco);
		$sqlQuery->set($restaurante->bairro);
		$sqlQuery->set($restaurante->cidade);
		$sqlQuery->set($restaurante->estado);
		$sqlQuery->set($restaurante->created);
		$sqlQuery->set($restaurante->status);
		$sqlQuery->set($restaurante->identificacao);
		$sqlQuery->set($restaurante->latitude);
		$sqlQuery->set($restaurante->longitude);

		$id = $this->executeInsert($sqlQuery);	
		$restaurante->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Restaurante restaurante
 	 */
	public function update($restaurante){
		$campos = "";
        
        
		 if(!empty($restaurante->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($restaurante->nome)) $campos .=' nome = ?,';
		 if(!empty($restaurante->descricao)) $campos .=' descricao = ?,';
		 if(!empty($restaurante->foto)) $campos .=' foto = ?,';
		 if(!empty($restaurante->endereco)) $campos .=' endereco = ?,';
		 if(!empty($restaurante->bairro)) $campos .=' bairro = ?,';
		 if(!empty($restaurante->cidade)) $campos .=' cidade = ?,';
		 if(!empty($restaurante->estado)) $campos .=' estado = ?,';
		 if(!empty($restaurante->created)) $campos .=' created = ?,';
		 if(!empty($restaurante->status)) $campos .=' status = ?,';
		 if(!empty($restaurante->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($restaurante->latitude)) $campos .=' latitude = ?,';
		 if(!empty($restaurante->longitude)) $campos .=' longitude = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE restaurante SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($restaurante->cidadeId)) 		$sqlQuery->setNumber($restaurante->cidadeId);
		 if(!empty($restaurante->nome)) 		$sqlQuery->set($restaurante->nome);
		 if(!empty($restaurante->descricao)) 		$sqlQuery->set($restaurante->descricao);
		 if(!empty($restaurante->foto)) 		$sqlQuery->set($restaurante->foto);
		 if(!empty($restaurante->endereco)) 		$sqlQuery->set($restaurante->endereco);
		 if(!empty($restaurante->bairro)) 		$sqlQuery->set($restaurante->bairro);
		 if(!empty($restaurante->cidade)) 		$sqlQuery->set($restaurante->cidade);
		 if(!empty($restaurante->estado)) 		$sqlQuery->set($restaurante->estado);
		 if(!empty($restaurante->created)) 		$sqlQuery->set($restaurante->created);
		 if(!empty($restaurante->status)) 		$sqlQuery->set($restaurante->status);
		 if(!empty($restaurante->identificacao)) 		$sqlQuery->set($restaurante->identificacao);
		 if(!empty($restaurante->latitude)) 		$sqlQuery->set($restaurante->latitude);
		 if(!empty($restaurante->longitude)) 		$sqlQuery->set($restaurante->longitude);

		$sqlQuery->setNumber($restaurante->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM restaurante';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM restaurante WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM restaurante WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM restaurante WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM restaurante WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM restaurante WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM restaurante WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM restaurante WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM restaurante WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM restaurante WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM restaurante WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM restaurante WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM restaurante WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM restaurante WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM restaurante WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM restaurante WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM restaurante WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM restaurante WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM restaurante WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM restaurante WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM restaurante WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM restaurante WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM restaurante WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM restaurante WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM restaurante WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM restaurante WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM restaurante WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Restaurante 
	 */
	protected function readRow($row){
		$restaurante = new Restaurante();
		
		$restaurante->id = $row['id'];
		$restaurante->cidadeId = $row['cidade_id'];
		$restaurante->nome = $row['nome'];
		$restaurante->descricao = $row['descricao'];
		$restaurante->foto = $row['foto'];
		$restaurante->endereco = $row['endereco'];
		$restaurante->bairro = $row['bairro'];
		$restaurante->cidade = $row['cidade'];
		$restaurante->estado = $row['estado'];
		$restaurante->created = $row['created'];
		$restaurante->status = $row['status'];
		$restaurante->identificacao = $row['identificacao'];
		$restaurante->latitude = $row['latitude'];
		$restaurante->longitude = $row['longitude'];

		return $restaurante;
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
	 * @return Restaurante 
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