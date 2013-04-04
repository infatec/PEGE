<?php
/**
 * Classe operadora da tabela 'plano_conta'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class PlanoContaDAO extends Model implements PlanoContaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PlanoConta 
	 */
	public function load($id){
		$sql = 'SELECT * FROM plano_conta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PlanoConta      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM plano_conta '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM plano_conta '.$criterio.'';
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
		$sql = 'SELECT * FROM plano_conta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param planoConta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM plano_conta WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PlanoConta planoConta
 	 */
	public function insert($planoConta){
		$sql = 'INSERT INTO plano_conta (descricao, natureza, tipo_nivel, codigo, plano_contaSup_id, usuarios_id, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($planoConta->descricao);
		$sqlQuery->set($planoConta->natureza);
		$sqlQuery->set($planoConta->tipoNivel);
		$sqlQuery->set($planoConta->codigo);
		$sqlQuery->setNumber($planoConta->planoContaSupId);
		$sqlQuery->setNumber($planoConta->usuariosId);
		$sqlQuery->set($planoConta->created);
		$sqlQuery->set($planoConta->status);

		$id = $this->executeInsert($sqlQuery);	
		$planoConta->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PlanoConta planoConta
 	 */
	public function update($planoConta){
		$campos = "";
        
        
		 if(!empty($planoConta->descricao)) $campos .=' descricao = ?,';
		 if(!empty($planoConta->natureza)) $campos .=' natureza = ?,';
		 if(!empty($planoConta->tipoNivel)) $campos .=' tipo_nivel = ?,';
		 if(!empty($planoConta->codigo)) $campos .=' codigo = ?,';
		 if(!empty($planoConta->planoContaSupId)) $campos .=' plano_contaSup_id = ?,';
		 if(!empty($planoConta->usuariosId)) $campos .=' usuarios_id = ?,';
		 if(!empty($planoConta->created)) $campos .=' created = ?,';
		 if(!empty($planoConta->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE plano_conta SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($planoConta->descricao)) 		$sqlQuery->set($planoConta->descricao);
		 if(!empty($planoConta->natureza)) 		$sqlQuery->set($planoConta->natureza);
		 if(!empty($planoConta->tipoNivel)) 		$sqlQuery->set($planoConta->tipoNivel);
		 if(!empty($planoConta->codigo)) 		$sqlQuery->set($planoConta->codigo);
		 if(!empty($planoConta->planoContaSupId)) 		$sqlQuery->setNumber($planoConta->planoContaSupId);
		 if(!empty($planoConta->usuariosId)) 		$sqlQuery->setNumber($planoConta->usuariosId);
		 if(!empty($planoConta->created)) 		$sqlQuery->set($planoConta->created);
		 if(!empty($planoConta->status)) 		$sqlQuery->set($planoConta->status);

		$sqlQuery->setNumber($planoConta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM plano_conta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM plano_conta WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNatureza($value){
		$sql = 'SELECT * FROM plano_conta WHERE natureza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoNivel($value){
		$sql = 'SELECT * FROM plano_conta WHERE tipo_nivel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM plano_conta WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlanoContaSupId($value){
		$sql = 'SELECT * FROM plano_conta WHERE plano_contaSup_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM plano_conta WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM plano_conta WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM plano_conta WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM plano_conta WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNatureza($value){
		$sql = 'DELETE FROM plano_conta WHERE natureza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoNivel($value){
		$sql = 'DELETE FROM plano_conta WHERE tipo_nivel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM plano_conta WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlanoContaSupId($value){
		$sql = 'DELETE FROM plano_conta WHERE plano_contaSup_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM plano_conta WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM plano_conta WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM plano_conta WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return PlanoConta 
	 */
	protected function readRow($row){
		$planoConta = new PlanoConta();
		
		$planoConta->id = $row['id'];
		$planoConta->descricao = $row['descricao'];
		$planoConta->natureza = $row['natureza'];
		$planoConta->tipoNivel = $row['tipo_nivel'];
		$planoConta->codigo = $row['codigo'];
		$planoConta->planoContaSupId = $row['plano_contaSup_id'];
		$planoConta->usuariosId = $row['usuarios_id'];
		$planoConta->created = $row['created'];
		$planoConta->status = $row['status'];

		return $planoConta;
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
	 * @return PlanoConta 
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