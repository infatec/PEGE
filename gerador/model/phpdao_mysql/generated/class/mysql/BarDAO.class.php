<?php
/**
 * Classe operadora da tabela 'bar'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-23 22:00
 */
class BarDAO extends Model implements BarI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Bar 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bar WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Bar      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM bar '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM bar '.$criterio.'';
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
		$sql = 'SELECT * FROM bar ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param bar primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM bar WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Bar bar
 	 */
	public function insert($bar){
		$sql = 'INSERT INTO bar (cidade_id, nome, descricao, foto, endereco, bairro, cidade, estado, created, status, identificacao, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($bar->cidadeId);
		$sqlQuery->set($bar->nome);
		$sqlQuery->set($bar->descricao);
		$sqlQuery->set($bar->foto);
		$sqlQuery->set($bar->endereco);
		$sqlQuery->set($bar->bairro);
		$sqlQuery->set($bar->cidade);
		$sqlQuery->set($bar->estado);
		$sqlQuery->set($bar->created);
		$sqlQuery->setNumber($bar->status);
		$sqlQuery->set($bar->identificacao);
		$sqlQuery->set($bar->latitude);
		$sqlQuery->set($bar->longitude);

		$id = $this->executeInsert($sqlQuery);	
		$bar->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Bar bar
 	 */
	public function update($bar){
		$campos = "";
        
        
		 if(!empty($bar->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($bar->nome)) $campos .=' nome = ?,';
		 if(!empty($bar->descricao)) $campos .=' descricao = ?,';
		 if(!empty($bar->foto)) $campos .=' foto = ?,';
		 if(!empty($bar->endereco)) $campos .=' endereco = ?,';
		 if(!empty($bar->bairro)) $campos .=' bairro = ?,';
		 if(!empty($bar->cidade)) $campos .=' cidade = ?,';
		 if(!empty($bar->estado)) $campos .=' estado = ?,';
		 if(!empty($bar->created)) $campos .=' created = ?,';
		 if(!empty($bar->status)) $campos .=' status = ?,';
		 if(!empty($bar->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($bar->latitude)) $campos .=' latitude = ?,';
		 if(!empty($bar->longitude)) $campos .=' longitude = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE bar SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($bar->cidadeId)) 		$sqlQuery->setNumber($bar->cidadeId);
		 if(!empty($bar->nome)) 		$sqlQuery->set($bar->nome);
		 if(!empty($bar->descricao)) 		$sqlQuery->set($bar->descricao);
		 if(!empty($bar->foto)) 		$sqlQuery->set($bar->foto);
		 if(!empty($bar->endereco)) 		$sqlQuery->set($bar->endereco);
		 if(!empty($bar->bairro)) 		$sqlQuery->set($bar->bairro);
		 if(!empty($bar->cidade)) 		$sqlQuery->set($bar->cidade);
		 if(!empty($bar->estado)) 		$sqlQuery->set($bar->estado);
		 if(!empty($bar->created)) 		$sqlQuery->set($bar->created);
		 if(!empty($bar->status)) 		$sqlQuery->setNumber($bar->status);
		 if(!empty($bar->identificacao)) 		$sqlQuery->set($bar->identificacao);
		 if(!empty($bar->latitude)) 		$sqlQuery->set($bar->latitude);
		 if(!empty($bar->longitude)) 		$sqlQuery->set($bar->longitude);

		$sqlQuery->setNumber($bar->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM bar';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM bar WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM bar WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM bar WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM bar WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM bar WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM bar WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM bar WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM bar WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM bar WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM bar WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM bar WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM bar WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM bar WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM bar WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM bar WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM bar WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM bar WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM bar WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM bar WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM bar WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM bar WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM bar WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM bar WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM bar WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM bar WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM bar WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Bar 
	 */
	protected function readRow($row){
		$bar = new Bar();
		
		$bar->id = $row['id'];
		$bar->cidadeId = $row['cidade_id'];
		$bar->nome = $row['nome'];
		$bar->descricao = $row['descricao'];
		$bar->foto = $row['foto'];
		$bar->endereco = $row['endereco'];
		$bar->bairro = $row['bairro'];
		$bar->cidade = $row['cidade'];
		$bar->estado = $row['estado'];
		$bar->created = $row['created'];
		$bar->status = $row['status'];
		$bar->identificacao = $row['identificacao'];
		$bar->latitude = $row['latitude'];
		$bar->longitude = $row['longitude'];

		return $bar;
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
	 * @return Bar 
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