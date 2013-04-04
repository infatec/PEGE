<?php
/**
 * Classe operadora da tabela 'usuarios'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class UsuariosDAO extends Model implements UsuariosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Usuarios 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Usuarios      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM usuarios '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM usuarios '.$criterio.'';
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
		$sql = 'SELECT * FROM usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param usuario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Usuarios usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuarios (grupo_id, tipo, login, senha, nome, email, msn, orkut, fone, celular, foto, ultimoacesso, acessos, created, modified, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuario->grupoId);
		$sqlQuery->setNumber($usuario->tipo);
		$sqlQuery->set($usuario->login);
		$sqlQuery->set($usuario->senha);
		$sqlQuery->set($usuario->nome);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->msn);
		$sqlQuery->set($usuario->orkut);
		$sqlQuery->set($usuario->fone);
		$sqlQuery->set($usuario->celular);
		$sqlQuery->set($usuario->foto);
		$sqlQuery->set($usuario->ultimoacesso);
		$sqlQuery->setNumber($usuario->acesso);
		$sqlQuery->set($usuario->created);
		$sqlQuery->set($usuario->modified);
		$sqlQuery->setNumber($usuario->status);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Usuarios usuario
 	 */
	public function update($usuario){
		$campos = "";
        
        
		 if(!empty($usuario->grupoId)) $campos .=' grupo_id = ?,';
		 if(!empty($usuario->tipo)) $campos .=' tipo = ?,';
		 if(!empty($usuario->login)) $campos .=' login = ?,';
		 if(!empty($usuario->senha)) $campos .=' senha = ?,';
		 if(!empty($usuario->nome)) $campos .=' nome = ?,';
		 if(!empty($usuario->email)) $campos .=' email = ?,';
		 if(!empty($usuario->msn)) $campos .=' msn = ?,';
		 if(!empty($usuario->orkut)) $campos .=' orkut = ?,';
		 if(!empty($usuario->fone)) $campos .=' fone = ?,';
		 if(!empty($usuario->celular)) $campos .=' celular = ?,';
		 if(!empty($usuario->foto)) $campos .=' foto = ?,';
		 if(!empty($usuario->ultimoacesso)) $campos .=' ultimoacesso = ?,';
		 if(!empty($usuario->acesso)) $campos .=' acessos = ?,';
		 if(!empty($usuario->created)) $campos .=' created = ?,';
		 if(!empty($usuario->modified)) $campos .=' modified = ?,';
		 if(!empty($usuario->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE usuarios SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($usuario->grupoId)) 		$sqlQuery->setNumber($usuario->grupoId);
		 if(!empty($usuario->tipo)) 		$sqlQuery->setNumber($usuario->tipo);
		 if(!empty($usuario->login)) 		$sqlQuery->set($usuario->login);
		 if(!empty($usuario->senha)) 		$sqlQuery->set($usuario->senha);
		 if(!empty($usuario->nome)) 		$sqlQuery->set($usuario->nome);
		 if(!empty($usuario->email)) 		$sqlQuery->set($usuario->email);
		 if(!empty($usuario->msn)) 		$sqlQuery->set($usuario->msn);
		 if(!empty($usuario->orkut)) 		$sqlQuery->set($usuario->orkut);
		 if(!empty($usuario->fone)) 		$sqlQuery->set($usuario->fone);
		 if(!empty($usuario->celular)) 		$sqlQuery->set($usuario->celular);
		 if(!empty($usuario->foto)) 		$sqlQuery->set($usuario->foto);
		 if(!empty($usuario->ultimoacesso)) 		$sqlQuery->set($usuario->ultimoacesso);
		 if(!empty($usuario->acesso)) 		$sqlQuery->setNumber($usuario->acesso);
		 if(!empty($usuario->created)) 		$sqlQuery->set($usuario->created);
		 if(!empty($usuario->modified)) 		$sqlQuery->set($usuario->modified);
		 if(!empty($usuario->status)) 		$sqlQuery->setNumber($usuario->status);

		$sqlQuery->setNumber($usuario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGrupoId($value){
		$sql = 'SELECT * FROM usuarios WHERE grupo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM usuarios WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogin($value){
		$sql = 'SELECT * FROM usuarios WHERE login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM usuarios WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM usuarios WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM usuarios WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMsn($value){
		$sql = 'SELECT * FROM usuarios WHERE msn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrkut($value){
		$sql = 'SELECT * FROM usuarios WHERE orkut = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFone($value){
		$sql = 'SELECT * FROM usuarios WHERE fone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM usuarios WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM usuarios WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimoacesso($value){
		$sql = 'SELECT * FROM usuarios WHERE ultimoacesso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAcessos($value){
		$sql = 'SELECT * FROM usuarios WHERE acessos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM usuarios WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModified($value){
		$sql = 'SELECT * FROM usuarios WHERE modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM usuarios WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGrupoId($value){
		$sql = 'DELETE FROM usuarios WHERE grupo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM usuarios WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogin($value){
		$sql = 'DELETE FROM usuarios WHERE login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM usuarios WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM usuarios WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM usuarios WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMsn($value){
		$sql = 'DELETE FROM usuarios WHERE msn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrkut($value){
		$sql = 'DELETE FROM usuarios WHERE orkut = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFone($value){
		$sql = 'DELETE FROM usuarios WHERE fone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM usuarios WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM usuarios WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimoacesso($value){
		$sql = 'DELETE FROM usuarios WHERE ultimoacesso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAcessos($value){
		$sql = 'DELETE FROM usuarios WHERE acessos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM usuarios WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModified($value){
		$sql = 'DELETE FROM usuarios WHERE modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM usuarios WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Usuarios 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->id = $row['id'];
		$usuario->grupoId = $row['grupo_id'];
		$usuario->tipo = $row['tipo'];
		$usuario->login = $row['login'];
		$usuario->senha = $row['senha'];
		$usuario->nome = $row['nome'];
		$usuario->email = $row['email'];
		$usuario->msn = $row['msn'];
		$usuario->orkut = $row['orkut'];
		$usuario->fone = $row['fone'];
		$usuario->celular = $row['celular'];
		$usuario->foto = $row['foto'];
		$usuario->ultimoacesso = $row['ultimoacesso'];
		$usuario->acesso = $row['acessos'];
		$usuario->created = $row['created'];
		$usuario->modified = $row['modified'];
		$usuario->status = $row['status'];

		return $usuario;
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
	 * @return Usuarios 
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