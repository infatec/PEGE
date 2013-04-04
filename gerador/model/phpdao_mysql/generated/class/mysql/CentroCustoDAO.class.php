<?php
/**
 * Classe operadora da tabela 'centro_custo'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class CentroCustoDAO extends Model implements CentroCustoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CentroCusto 
	 */
	public function load($id){
		$sql = 'SELECT * FROM centro_custo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CentroCusto      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM centro_custo '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM centro_custo '.$criterio.'';
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
		$sql = 'SELECT * FROM centro_custo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param centroCusto primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM centro_custo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CentroCusto centroCusto
 	 */
	public function insert($centroCusto){
		$sql = 'INSERT INTO centro_custo (descricao, usuarios_id, codigo, centro_custoSup_id, tipo_nivel, created, status) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($centroCusto->descricao);
		$sqlQuery->setNumber($centroCusto->usuariosId);
		$sqlQuery->set($centroCusto->codigo);
		$sqlQuery->setNumber($centroCusto->centroCustoSupId);
		$sqlQuery->set($centroCusto->tipoNivel);
		$sqlQuery->set($centroCusto->created);
		$sqlQuery->set($centroCusto->status);

		$id = $this->executeInsert($sqlQuery);	
		$centroCusto->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CentroCusto centroCusto
 	 */
	public function update($centroCusto){
		$campos = "";
        
        
		 if(!empty($centroCusto->descricao)) $campos .=' descricao = ?,';
		 if(!empty($centroCusto->usuariosId)) $campos .=' usuarios_id = ?,';
		 if(!empty($centroCusto->codigo)) $campos .=' codigo = ?,';
		 if(!empty($centroCusto->centroCustoSupId)) $campos .=' centro_custoSup_id = ?,';
		 if(!empty($centroCusto->tipoNivel)) $campos .=' tipo_nivel = ?,';
		 if(!empty($centroCusto->created)) $campos .=' created = ?,';
		 if(!empty($centroCusto->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE centro_custo SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($centroCusto->descricao)) 		$sqlQuery->set($centroCusto->descricao);
		 if(!empty($centroCusto->usuariosId)) 		$sqlQuery->setNumber($centroCusto->usuariosId);
		 if(!empty($centroCusto->codigo)) 		$sqlQuery->set($centroCusto->codigo);
		 if(!empty($centroCusto->centroCustoSupId)) 		$sqlQuery->setNumber($centroCusto->centroCustoSupId);
		 if(!empty($centroCusto->tipoNivel)) 		$sqlQuery->set($centroCusto->tipoNivel);
		 if(!empty($centroCusto->created)) 		$sqlQuery->set($centroCusto->created);
		 if(!empty($centroCusto->status)) 		$sqlQuery->set($centroCusto->status);

		$sqlQuery->setNumber($centroCusto->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM centro_custo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM centro_custo WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM centro_custo WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM centro_custo WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCentroCustoSupId($value){
		$sql = 'SELECT * FROM centro_custo WHERE centro_custoSup_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoNivel($value){
		$sql = 'SELECT * FROM centro_custo WHERE tipo_nivel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM centro_custo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM centro_custo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM centro_custo WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM centro_custo WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM centro_custo WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCentroCustoSupId($value){
		$sql = 'DELETE FROM centro_custo WHERE centro_custoSup_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoNivel($value){
		$sql = 'DELETE FROM centro_custo WHERE tipo_nivel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM centro_custo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM centro_custo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CentroCusto 
	 */
	protected function readRow($row){
		$centroCusto = new CentroCusto();
		
		$centroCusto->id = $row['id'];
		$centroCusto->descricao = $row['descricao'];
		$centroCusto->usuariosId = $row['usuarios_id'];
		$centroCusto->codigo = $row['codigo'];
		$centroCusto->centroCustoSupId = $row['centro_custoSup_id'];
		$centroCusto->tipoNivel = $row['tipo_nivel'];
		$centroCusto->created = $row['created'];
		$centroCusto->status = $row['status'];

		return $centroCusto;
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
	 * @return CentroCusto 
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