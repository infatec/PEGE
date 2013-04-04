<?php
/**
 * Classe operadora da tabela 'pizzaria'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class PizzariaDAO extends Model implements PizzariaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Pizzaria 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pizzaria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Pizzaria      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM pizzaria '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM pizzaria '.$criterio.'';
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
		$sql = 'SELECT * FROM pizzaria ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param pizzaria primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pizzaria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Pizzaria pizzaria
 	 */
	public function insert($pizzaria){
		$sql = 'INSERT INTO pizzaria (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, latitude, longitude, identificacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pizzaria->cidadeId);
		$sqlQuery->set($pizzaria->nome);
		$sqlQuery->set($pizzaria->descricao);
		$sqlQuery->set($pizzaria->foto);
		$sqlQuery->set($pizzaria->endereco);
		$sqlQuery->set($pizzaria->bairro);
		$sqlQuery->set($pizzaria->cidade);
		$sqlQuery->set($pizzaria->estado);
		$sqlQuery->set($pizzaria->created);
		$sqlQuery->set($pizzaria->status);
		$sqlQuery->set($pizzaria->latitude);
		$sqlQuery->set($pizzaria->longitude);
		$sqlQuery->set($pizzaria->identificacao);

		$id = $this->executeInsert($sqlQuery);	
		$pizzaria->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Pizzaria pizzaria
 	 */
	public function update($pizzaria){
		$campos = "";
        
        
		 if(!empty($pizzaria->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($pizzaria->nome)) $campos .=' nome = ?,';
		 if(!empty($pizzaria->descricao)) $campos .=' descricao = ?,';
		 if(!empty($pizzaria->foto)) $campos .=' foto = ?,';
		 if(!empty($pizzaria->endereco)) $campos .=' endereco = ?,';
		 if(!empty($pizzaria->bairro)) $campos .=' bairro = ?,';
		 if(!empty($pizzaria->cidade)) $campos .=' cidade = ?,';
		 if(!empty($pizzaria->estado)) $campos .=' estado = ?,';
		 if(!empty($pizzaria->created)) $campos .=' created = ?,';
		 if(!empty($pizzaria->status)) $campos .=' status = ?,';
		 if(!empty($pizzaria->latitude)) $campos .=' latitude = ?,';
		 if(!empty($pizzaria->longitude)) $campos .=' longitude = ?,';
		 if(!empty($pizzaria->identificacao)) $campos .=' identificacao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE pizzaria SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($pizzaria->cidadeId)) 		$sqlQuery->setNumber($pizzaria->cidadeId);
		 if(!empty($pizzaria->nome)) 		$sqlQuery->set($pizzaria->nome);
		 if(!empty($pizzaria->descricao)) 		$sqlQuery->set($pizzaria->descricao);
		 if(!empty($pizzaria->foto)) 		$sqlQuery->set($pizzaria->foto);
		 if(!empty($pizzaria->endereco)) 		$sqlQuery->set($pizzaria->endereco);
		 if(!empty($pizzaria->bairro)) 		$sqlQuery->set($pizzaria->bairro);
		 if(!empty($pizzaria->cidade)) 		$sqlQuery->set($pizzaria->cidade);
		 if(!empty($pizzaria->estado)) 		$sqlQuery->set($pizzaria->estado);
		 if(!empty($pizzaria->created)) 		$sqlQuery->set($pizzaria->created);
		 if(!empty($pizzaria->status)) 		$sqlQuery->set($pizzaria->status);
		 if(!empty($pizzaria->latitude)) 		$sqlQuery->set($pizzaria->latitude);
		 if(!empty($pizzaria->longitude)) 		$sqlQuery->set($pizzaria->longitude);
		 if(!empty($pizzaria->identificacao)) 		$sqlQuery->set($pizzaria->identificacao);

		$sqlQuery->setNumber($pizzaria->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM pizzaria';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM pizzaria WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM pizzaria WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM pizzaria WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM pizzaria WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM pizzaria WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM pizzaria WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM pizzaria WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM pizzaria WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM pizzaria WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pizzaria WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM pizzaria WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM pizzaria WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM pizzaria WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM pizzaria WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM pizzaria WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM pizzaria WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM pizzaria WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM pizzaria WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM pizzaria WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM pizzaria WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM pizzaria WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM pizzaria WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pizzaria WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM pizzaria WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM pizzaria WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM pizzaria WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Pizzaria 
	 */
	protected function readRow($row){
		$pizzaria = new Pizzaria();
		
		$pizzaria->id = $row['id'];
		$pizzaria->cidadeId = $row['cidade_id'];
		$pizzaria->nome = $row['nome'];
		$pizzaria->descricao = $row['descricao'];
		$pizzaria->foto = $row['foto'];
		$pizzaria->endereco = $row['endereco'];
		$pizzaria->bairro = $row['bairro'];
		$pizzaria->cidade = $row['cidade'];
		$pizzaria->estado = $row['estado'];
		$pizzaria->created = $row['created'];
		$pizzaria->status = $row['status'];
		$pizzaria->latitude = $row['latitude'];
		$pizzaria->longitude = $row['longitude'];
		$pizzaria->identificacao = $row['identificacao'];

		return $pizzaria;
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
	 * @return Pizzaria 
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