<?php
/**
 * Classe operadora da tabela 'boate'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class BoateDAO extends Model implements BoateI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Boate 
	 */
	public function load($id){
		$sql = 'SELECT * FROM boate WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Boate      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM boate '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM boate '.$criterio.'';
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
		$sql = 'SELECT * FROM boate ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param boate primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM boate WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Boate boate
 	 */
	public function insert($boate){
		$sql = 'INSERT INTO boate (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, identificacao, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($boate->cidadeId);
		$sqlQuery->set($boate->nome);
		$sqlQuery->set($boate->descricao);
		$sqlQuery->set($boate->foto);
		$sqlQuery->set($boate->endereco);
		$sqlQuery->set($boate->bairro);
		$sqlQuery->set($boate->cidade);
		$sqlQuery->set($boate->estado);
		$sqlQuery->set($boate->created);
		$sqlQuery->set($boate->status);
		$sqlQuery->set($boate->identificacao);
		$sqlQuery->set($boate->latitude);
		$sqlQuery->set($boate->longitude);

		$id = $this->executeInsert($sqlQuery);	
		$boate->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Boate boate
 	 */
	public function update($boate){
		$campos = "";
        
        
		 if(!empty($boate->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($boate->nome)) $campos .=' nome = ?,';
		 if(!empty($boate->descricao)) $campos .=' descricao = ?,';
		 if(!empty($boate->foto)) $campos .=' foto = ?,';
		 if(!empty($boate->endereco)) $campos .=' endereco = ?,';
		 if(!empty($boate->bairro)) $campos .=' bairro = ?,';
		 if(!empty($boate->cidade)) $campos .=' cidade = ?,';
		 if(!empty($boate->estado)) $campos .=' estado = ?,';
		 if(!empty($boate->created)) $campos .=' created = ?,';
		 if(!empty($boate->status)) $campos .=' status = ?,';
		 if(!empty($boate->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($boate->latitude)) $campos .=' latitude = ?,';
		 if(!empty($boate->longitude)) $campos .=' longitude = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE boate SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($boate->cidadeId)) 		$sqlQuery->setNumber($boate->cidadeId);
		 if(!empty($boate->nome)) 		$sqlQuery->set($boate->nome);
		 if(!empty($boate->descricao)) 		$sqlQuery->set($boate->descricao);
		 if(!empty($boate->foto)) 		$sqlQuery->set($boate->foto);
		 if(!empty($boate->endereco)) 		$sqlQuery->set($boate->endereco);
		 if(!empty($boate->bairro)) 		$sqlQuery->set($boate->bairro);
		 if(!empty($boate->cidade)) 		$sqlQuery->set($boate->cidade);
		 if(!empty($boate->estado)) 		$sqlQuery->set($boate->estado);
		 if(!empty($boate->created)) 		$sqlQuery->set($boate->created);
		 if(!empty($boate->status)) 		$sqlQuery->set($boate->status);
		 if(!empty($boate->identificacao)) 		$sqlQuery->set($boate->identificacao);
		 if(!empty($boate->latitude)) 		$sqlQuery->set($boate->latitude);
		 if(!empty($boate->longitude)) 		$sqlQuery->set($boate->longitude);

		$sqlQuery->setNumber($boate->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM boate';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM boate WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM boate WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM boate WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM boate WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM boate WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM boate WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM boate WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM boate WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM boate WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM boate WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM boate WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM boate WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM boate WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM boate WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM boate WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM boate WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM boate WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM boate WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM boate WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM boate WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM boate WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM boate WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM boate WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM boate WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM boate WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM boate WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Boate 
	 */
	protected function readRow($row){
		$boate = new Boate();
		
		$boate->id = $row['id'];
		$boate->cidadeId = $row['cidade_id'];
		$boate->nome = $row['nome'];
		$boate->descricao = $row['descricao'];
		$boate->foto = $row['foto'];
		$boate->endereco = $row['endereco'];
		$boate->bairro = $row['bairro'];
		$boate->cidade = $row['cidade'];
		$boate->estado = $row['estado'];
		$boate->created = $row['created'];
		$boate->status = $row['status'];
		$boate->identificacao = $row['identificacao'];
		$boate->latitude = $row['latitude'];
		$boate->longitude = $row['longitude'];

		return $boate;
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
	 * @return Boate 
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