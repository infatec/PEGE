<?php
/**
 * Classe operadora da tabela 'sushi'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class SushiDAO extends Model implements SushiI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Sushi 
	 */
	public function load($id){
		$sql = 'SELECT * FROM sushi WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Sushi      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM sushi '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM sushi '.$criterio.'';
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
		$sql = 'SELECT * FROM sushi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param sushi primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM sushi WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Sushi sushi
 	 */
	public function insert($sushi){
		$sql = 'INSERT INTO sushi (nome, descricao, foto, endereco, bairro, cidade, estado, created, status, identificacao, latitude, longitude, cidade_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($sushi->nome);
		$sqlQuery->set($sushi->descricao);
		$sqlQuery->set($sushi->foto);
		$sqlQuery->set($sushi->endereco);
		$sqlQuery->set($sushi->bairro);
		$sqlQuery->set($sushi->cidade);
		$sqlQuery->set($sushi->estado);
		$sqlQuery->set($sushi->created);
		$sqlQuery->set($sushi->status);
		$sqlQuery->set($sushi->identificacao);
		$sqlQuery->set($sushi->latitude);
		$sqlQuery->set($sushi->longitude);
		$sqlQuery->setNumber($sushi->cidadeId);

		$id = $this->executeInsert($sqlQuery);	
		$sushi->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Sushi sushi
 	 */
	public function update($sushi){
		$campos = "";
        
        
		 if(!empty($sushi->nome)) $campos .=' nome = ?,';
		 if(!empty($sushi->descricao)) $campos .=' descricao = ?,';
		 if(!empty($sushi->foto)) $campos .=' foto = ?,';
		 if(!empty($sushi->endereco)) $campos .=' endereco = ?,';
		 if(!empty($sushi->bairro)) $campos .=' bairro = ?,';
		 if(!empty($sushi->cidade)) $campos .=' cidade = ?,';
		 if(!empty($sushi->estado)) $campos .=' estado = ?,';
		 if(!empty($sushi->created)) $campos .=' created = ?,';
		 if(!empty($sushi->status)) $campos .=' status = ?,';
		 if(!empty($sushi->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($sushi->latitude)) $campos .=' latitude = ?,';
		 if(!empty($sushi->longitude)) $campos .=' longitude = ?,';
		 if(!empty($sushi->cidadeId)) $campos .=' cidade_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE sushi SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($sushi->nome)) 		$sqlQuery->set($sushi->nome);
		 if(!empty($sushi->descricao)) 		$sqlQuery->set($sushi->descricao);
		 if(!empty($sushi->foto)) 		$sqlQuery->set($sushi->foto);
		 if(!empty($sushi->endereco)) 		$sqlQuery->set($sushi->endereco);
		 if(!empty($sushi->bairro)) 		$sqlQuery->set($sushi->bairro);
		 if(!empty($sushi->cidade)) 		$sqlQuery->set($sushi->cidade);
		 if(!empty($sushi->estado)) 		$sqlQuery->set($sushi->estado);
		 if(!empty($sushi->created)) 		$sqlQuery->set($sushi->created);
		 if(!empty($sushi->status)) 		$sqlQuery->set($sushi->status);
		 if(!empty($sushi->identificacao)) 		$sqlQuery->set($sushi->identificacao);
		 if(!empty($sushi->latitude)) 		$sqlQuery->set($sushi->latitude);
		 if(!empty($sushi->longitude)) 		$sqlQuery->set($sushi->longitude);
		 if(!empty($sushi->cidadeId)) 		$sqlQuery->setNumber($sushi->cidadeId);

		$sqlQuery->setNumber($sushi->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM sushi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM sushi WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM sushi WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM sushi WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM sushi WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM sushi WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM sushi WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM sushi WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM sushi WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM sushi WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM sushi WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM sushi WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM sushi WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM sushi WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM sushi WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM sushi WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM sushi WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM sushi WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM sushi WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM sushi WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM sushi WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM sushi WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM sushi WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM sushi WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM sushi WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM sushi WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM sushi WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Sushi 
	 */
	protected function readRow($row){
		$sushi = new Sushi();
		
		$sushi->id = $row['id'];
		$sushi->nome = $row['nome'];
		$sushi->descricao = $row['descricao'];
		$sushi->foto = $row['foto'];
		$sushi->endereco = $row['endereco'];
		$sushi->bairro = $row['bairro'];
		$sushi->cidade = $row['cidade'];
		$sushi->estado = $row['estado'];
		$sushi->created = $row['created'];
		$sushi->status = $row['status'];
		$sushi->identificacao = $row['identificacao'];
		$sushi->latitude = $row['latitude'];
		$sushi->longitude = $row['longitude'];
		$sushi->cidadeId = $row['cidade_id'];

		return $sushi;
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
	 * @return Sushi 
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