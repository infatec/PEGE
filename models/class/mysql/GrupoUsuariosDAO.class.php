<?php
/**
 * Classe operadora da tabela 'grupo_usuarios'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class GrupoUsuariosDAO extends Model implements GrupoUsuariosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return GrupoUsuarios 
	 */
	public function load($id){
		$sql = 'SELECT * FROM grupo_usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return GrupoUsuarios      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM grupo_usuarios '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM grupo_usuarios '.$criterio.'';
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
		$sql = 'SELECT * FROM grupo_usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param grupoUsuario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM grupo_usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param GrupoUsuarios grupoUsuario
 	 */
	public function insert($grupoUsuario){
		$sql = 'INSERT INTO grupo_usuarios (tipo, nome, descricao, created, status, setor_id, funcionario, cargo_id, admin_parcela) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($grupoUsuario->tipo);
		$sqlQuery->set($grupoUsuario->nome);
		$sqlQuery->set($grupoUsuario->descricao);
		$sqlQuery->set($grupoUsuario->created);
		$sqlQuery->setNumber($grupoUsuario->status);
		$sqlQuery->setNumber($grupoUsuario->setorId);
		$sqlQuery->setNumber($grupoUsuario->funcionario);
		$sqlQuery->setNumber($grupoUsuario->cargoId);
		$sqlQuery->set($grupoUsuario->adminParcela);

		$id = $this->executeInsert($sqlQuery);	
		$grupoUsuario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param GrupoUsuarios grupoUsuario
 	 */
	public function update($grupoUsuario){
		$campos = "";
        
        
		 if(!empty($grupoUsuario->tipo)) $campos .=' tipo = ?,';
		 if(!empty($grupoUsuario->nome)) $campos .=' nome = ?,';
		 if(!empty($grupoUsuario->descricao)) $campos .=' descricao = ?,';
		 if(!empty($grupoUsuario->created)) $campos .=' created = ?,';
		 if(!empty($grupoUsuario->status)) $campos .=' status = ?,';
		 if(!empty($grupoUsuario->setorId)) $campos .=' setor_id = ?,';
		 if(!empty($grupoUsuario->funcionario)) $campos .=' funcionario = ?,';
		 if(!empty($grupoUsuario->cargoId)) $campos .=' cargo_id = ?,';
		 if(!empty($grupoUsuario->adminParcela)) $campos .=' admin_parcela = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE grupo_usuarios SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($grupoUsuario->tipo)) 		$sqlQuery->setNumber($grupoUsuario->tipo);
		 if(!empty($grupoUsuario->nome)) 		$sqlQuery->set($grupoUsuario->nome);
		 if(!empty($grupoUsuario->descricao)) 		$sqlQuery->set($grupoUsuario->descricao);
		 if(!empty($grupoUsuario->created)) 		$sqlQuery->set($grupoUsuario->created);
		 if(!empty($grupoUsuario->status)) 		$sqlQuery->setNumber($grupoUsuario->status);
		 if(!empty($grupoUsuario->setorId)) 		$sqlQuery->setNumber($grupoUsuario->setorId);
		 if(!empty($grupoUsuario->funcionario)) 		$sqlQuery->setNumber($grupoUsuario->funcionario);
		 if(!empty($grupoUsuario->cargoId)) 		$sqlQuery->setNumber($grupoUsuario->cargoId);
		 if(!empty($grupoUsuario->adminParcela)) 		$sqlQuery->set($grupoUsuario->adminParcela);

		$sqlQuery->setNumber($grupoUsuario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM grupo_usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySetorId($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE setor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncionario($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE funcionario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargoId($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE cargo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdminParcela($value){
		$sql = 'SELECT * FROM grupo_usuarios WHERE admin_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTipo($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySetorId($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE setor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncionario($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE funcionario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargoId($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE cargo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdminParcela($value){
		$sql = 'DELETE FROM grupo_usuarios WHERE admin_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return GrupoUsuarios 
	 */
	protected function readRow($row){
		$grupoUsuario = new GrupoUsuario();
		
		$grupoUsuario->id = $row['id'];
		$grupoUsuario->tipo = $row['tipo'];
		$grupoUsuario->nome = $row['nome'];
		$grupoUsuario->descricao = $row['descricao'];
		$grupoUsuario->created = $row['created'];
		$grupoUsuario->status = $row['status'];
		$grupoUsuario->setorId = $row['setor_id'];
		$grupoUsuario->funcionario = $row['funcionario'];
		$grupoUsuario->cargoId = $row['cargo_id'];
		$grupoUsuario->adminParcela = $row['admin_parcela'];

		return $grupoUsuario;
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
	 * @return GrupoUsuarios 
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