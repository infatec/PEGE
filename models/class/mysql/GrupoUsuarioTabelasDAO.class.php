<?php
/**
 * Classe operadora da tabela 'grupo_usuario_tabelas'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class GrupoUsuarioTabelasDAO extends Model implements GrupoUsuarioTabelasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return GrupoUsuarioTabelas 
	 */
	public function load($id){
		$sql = 'SELECT * FROM grupo_usuario_tabelas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return GrupoUsuarioTabelas      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM grupo_usuario_tabelas '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM grupo_usuario_tabelas '.$criterio.'';
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
		$sql = 'SELECT * FROM grupo_usuario_tabelas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param grupoUsuarioTabela primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM grupo_usuario_tabelas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param GrupoUsuarioTabelas grupoUsuarioTabela
 	 */
	public function insert($grupoUsuarioTabela){
		$sql = 'INSERT INTO grupo_usuario_tabelas (grupo_id, tabela_id, permissao) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($grupoUsuarioTabela->grupoId);
		$sqlQuery->setNumber($grupoUsuarioTabela->tabelaId);
		$sqlQuery->setNumber($grupoUsuarioTabela->permissao);

		$id = $this->executeInsert($sqlQuery);	
		$grupoUsuarioTabela->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param GrupoUsuarioTabelas grupoUsuarioTabela
 	 */
	public function update($grupoUsuarioTabela){
		$campos = "";
        
        
		 if(!empty($grupoUsuarioTabela->grupoId)) $campos .=' grupo_id = ?,';
		 if(!empty($grupoUsuarioTabela->tabelaId)) $campos .=' tabela_id = ?,';
		 if(!empty($grupoUsuarioTabela->permissao)) $campos .=' permissao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE grupo_usuario_tabelas SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($grupoUsuarioTabela->grupoId)) 		$sqlQuery->setNumber($grupoUsuarioTabela->grupoId);
		 if(!empty($grupoUsuarioTabela->tabelaId)) 		$sqlQuery->setNumber($grupoUsuarioTabela->tabelaId);
		 if(!empty($grupoUsuarioTabela->permissao)) 		$sqlQuery->setNumber($grupoUsuarioTabela->permissao);

		$sqlQuery->setNumber($grupoUsuarioTabela->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM grupo_usuario_tabelas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGrupoId($value){
		$sql = 'SELECT * FROM grupo_usuario_tabelas WHERE grupo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTabelaId($value){
		$sql = 'SELECT * FROM grupo_usuario_tabelas WHERE tabela_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPermissao($value){
		$sql = 'SELECT * FROM grupo_usuario_tabelas WHERE permissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGrupoId($value){
		$sql = 'DELETE FROM grupo_usuario_tabelas WHERE grupo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTabelaId($value){
		$sql = 'DELETE FROM grupo_usuario_tabelas WHERE tabela_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPermissao($value){
		$sql = 'DELETE FROM grupo_usuario_tabelas WHERE permissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return GrupoUsuarioTabelas 
	 */
	protected function readRow($row){
		$grupoUsuarioTabela = new GrupoUsuarioTabela();
		
		$grupoUsuarioTabela->id = $row['id'];
		$grupoUsuarioTabela->grupoId = $row['grupo_id'];
		$grupoUsuarioTabela->tabelaId = $row['tabela_id'];
		$grupoUsuarioTabela->permissao = $row['permissao'];

		return $grupoUsuarioTabela;
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
	 * @return GrupoUsuarioTabelas 
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