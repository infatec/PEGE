<?php
/**
 * Classe operadora da tabela 'caixa_usuarios'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class CaixaUsuariosDAO extends Model implements CaixaUsuariosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CaixaUsuarios 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caixa_usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CaixaUsuarios      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM caixa_usuarios '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM caixa_usuarios '.$criterio.'';
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
		$sql = 'SELECT * FROM caixa_usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param caixaUsuario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM caixa_usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CaixaUsuarios caixaUsuario
 	 */
	public function insert($caixaUsuario){
		$sql = 'INSERT INTO caixa_usuarios (usuarios_id, caixa_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($caixaUsuario->usuariosId);
		$sqlQuery->setNumber($caixaUsuario->caixaId);

		$id = $this->executeInsert($sqlQuery);	
		$caixaUsuario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CaixaUsuarios caixaUsuario
 	 */
	public function update($caixaUsuario){
		$campos = "";
        
        
		 if(!empty($caixaUsuario->usuariosId)) $campos .=' usuarios_id = ?,';
		 if(!empty($caixaUsuario->caixaId)) $campos .=' caixa_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE caixa_usuarios SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($caixaUsuario->usuariosId)) 		$sqlQuery->setNumber($caixaUsuario->usuariosId);
		 if(!empty($caixaUsuario->caixaId)) 		$sqlQuery->setNumber($caixaUsuario->caixaId);

		$sqlQuery->setNumber($caixaUsuario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM caixa_usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM caixa_usuarios WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM caixa_usuarios WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM caixa_usuarios WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM caixa_usuarios WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CaixaUsuarios 
	 */
	protected function readRow($row){
		$caixaUsuario = new CaixaUsuario();
		
		$caixaUsuario->id = $row['id'];
		$caixaUsuario->usuariosId = $row['usuarios_id'];
		$caixaUsuario->caixaId = $row['caixa_id'];

		return $caixaUsuario;
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
	 * @return CaixaUsuarios 
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