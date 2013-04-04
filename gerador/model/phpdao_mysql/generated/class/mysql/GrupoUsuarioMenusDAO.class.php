<?php
/**
 * Classe operadora da tabela 'grupo_usuario_menus'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class GrupoUsuarioMenusDAO extends Model implements GrupoUsuarioMenusI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return GrupoUsuarioMenus 
	 */
	public function load($id, $grupoId, $menuId){
		$sql = 'SELECT * FROM grupo_usuario_menus WHERE id = ?  AND grupo_id = ?  AND menu_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($grupoId);
		$sqlQuery->setNumber($menuId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return GrupoUsuarioMenus      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM grupo_usuario_menus '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM grupo_usuario_menus '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		$rs=$this->execute($sqlQuery);
        return $rs[0]["qtd"];
	} 
     
     
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM grupo_usuario_menus ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
	public function delete($id, $grupoId, $menuId){
		$sql = 'DELETE FROM grupo_usuario_menus WHERE id = ?  AND grupo_id = ?  AND menu_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($grupoId);
		$sqlQuery->setNumber($menuId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function insert($grupoUsuarioMenu){
		$sql = 'INSERT INTO grupo_usuario_menus (permissao, id, grupo_id, menu_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($grupoUsuarioMenu->permissao);

		
		$sqlQuery->setNumber($grupoUsuarioMenu->id);

		$sqlQuery->setNumber($grupoUsuarioMenu->grupoId);

		$sqlQuery->setNumber($grupoUsuarioMenu->menuId);

		$this->executeInsert($sqlQuery);	
		//$grupoUsuarioMenu->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GrupoUsuarioMenus grupoUsuarioMenu
 	 */
	public function update($grupoUsuarioMenu){
	    $campos = "";
        
        
		 if(!empty($grupoUsuarioMenu->permissao)) $campos .=' permissao = ?,';

        
        $campos = substr($campos,0,-1);
        
		$sql = 'UPDATE grupo_usuario_menus SET '.$campos.' WHERE id = ?  AND grupo_id = ?  AND menu_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($grupoUsuarioMenu->permissao)) 		$sqlQuery->setNumber($grupoUsuarioMenu->permissao);

        
		
		$sqlQuery->setNumber($grupoUsuarioMenu->id);

		$sqlQuery->setNumber($grupoUsuarioMenu->grupoId);

		$sqlQuery->setNumber($grupoUsuarioMenu->menuId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM grupo_usuario_menus';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPermissao($value){
		$sql = 'SELECT * FROM grupo_usuario_menus WHERE permissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPermissao($value){
		$sql = 'DELETE FROM grupo_usuario_menus WHERE permissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GrupoUsuarioMenus 
	 */
	protected function readRow($row){
		$grupoUsuarioMenu = new GrupoUsuarioMenu();
		
		$grupoUsuarioMenu->id = $row['id'];
		$grupoUsuarioMenu->grupoId = $row['grupo_id'];
		$grupoUsuarioMenu->menuId = $row['menu_id'];
		$grupoUsuarioMenu->permissao = $row['permissao'];

		return $grupoUsuarioMenu;
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
	 * Get row
	 *
	 * @return GrupoUsuarioMenus 
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
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>