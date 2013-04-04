<?php
/**
 * Classe operadora da tabela 'agencias'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class AgenciasDAO extends Model implements AgenciasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Agencias 
	 */
	public function load($id){
		$sql = 'SELECT * FROM agencias WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Agencias      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM agencias '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM agencias '.$criterio.'';
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
		$sql = 'SELECT * FROM agencias ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param agencia primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM agencias WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Agencias agencia
 	 */
	public function insert($agencia){
		$sql = 'INSERT INTO agencias (descricao, cidade_id, estado_id, cep, endereco, bairro, fone, created, status, banco_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($agencia->descricao);
		$sqlQuery->setNumber($agencia->cidadeId);
		$sqlQuery->setNumber($agencia->estadoId);
		$sqlQuery->set($agencia->cep);
		$sqlQuery->set($agencia->endereco);
		$sqlQuery->set($agencia->bairro);
		$sqlQuery->set($agencia->fone);
		$sqlQuery->set($agencia->created);
		$sqlQuery->setNumber($agencia->status);
		$sqlQuery->setNumber($agencia->bancoId);

		$id = $this->executeInsert($sqlQuery);	
		$agencia->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Agencias agencia
 	 */
	public function update($agencia){
		$campos = "";
        
        
		 if(!empty($agencia->descricao)) $campos .=' descricao = ?,';
		 if(!empty($agencia->cidadeId)) $campos .=' cidade_id = ?,';
		 if(!empty($agencia->estadoId)) $campos .=' estado_id = ?,';
		 if(!empty($agencia->cep)) $campos .=' cep = ?,';
		 if(!empty($agencia->endereco)) $campos .=' endereco = ?,';
		 if(!empty($agencia->bairro)) $campos .=' bairro = ?,';
		 if(!empty($agencia->fone)) $campos .=' fone = ?,';
		 if(!empty($agencia->created)) $campos .=' created = ?,';
		 if(!empty($agencia->status)) $campos .=' status = ?,';
		 if(!empty($agencia->bancoId)) $campos .=' banco_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE agencias SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($agencia->descricao)) 		$sqlQuery->set($agencia->descricao);
		 if(!empty($agencia->cidadeId)) 		$sqlQuery->setNumber($agencia->cidadeId);
		 if(!empty($agencia->estadoId)) 		$sqlQuery->setNumber($agencia->estadoId);
		 if(!empty($agencia->cep)) 		$sqlQuery->set($agencia->cep);
		 if(!empty($agencia->endereco)) 		$sqlQuery->set($agencia->endereco);
		 if(!empty($agencia->bairro)) 		$sqlQuery->set($agencia->bairro);
		 if(!empty($agencia->fone)) 		$sqlQuery->set($agencia->fone);
		 if(!empty($agencia->created)) 		$sqlQuery->set($agencia->created);
		 if(!empty($agencia->status)) 		$sqlQuery->setNumber($agencia->status);
		 if(!empty($agencia->bancoId)) 		$sqlQuery->setNumber($agencia->bancoId);

		$sqlQuery->setNumber($agencia->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM agencias';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM agencias WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidadeId($value){
		$sql = 'SELECT * FROM agencias WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoId($value){
		$sql = 'SELECT * FROM agencias WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM agencias WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM agencias WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM agencias WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFone($value){
		$sql = 'SELECT * FROM agencias WHERE fone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM agencias WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM agencias WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBancoId($value){
		$sql = 'SELECT * FROM agencias WHERE banco_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM agencias WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidadeId($value){
		$sql = 'DELETE FROM agencias WHERE cidade_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoId($value){
		$sql = 'DELETE FROM agencias WHERE estado_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM agencias WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM agencias WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM agencias WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFone($value){
		$sql = 'DELETE FROM agencias WHERE fone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM agencias WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM agencias WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBancoId($value){
		$sql = 'DELETE FROM agencias WHERE banco_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Agencias 
	 */
	protected function readRow($row){
		$agencia = new Agencia();
		
		$agencia->id = $row['id'];
		$agencia->descricao = $row['descricao'];
		$agencia->cidadeId = $row['cidade_id'];
		$agencia->estadoId = $row['estado_id'];
		$agencia->cep = $row['cep'];
		$agencia->endereco = $row['endereco'];
		$agencia->bairro = $row['bairro'];
		$agencia->fone = $row['fone'];
		$agencia->created = $row['created'];
		$agencia->status = $row['status'];
		$agencia->bancoId = $row['banco_id'];

		return $agencia;
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
	 * @return Agencias 
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