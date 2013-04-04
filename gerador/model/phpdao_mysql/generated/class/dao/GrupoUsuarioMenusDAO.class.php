<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface GrupoUsuarioMenusI{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GrupoUsuarioMenus 
	 */
	public function load($id, $grupoId, $menuId);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param grupoUsuarioMenu primary key
 	 */
	public function delete($id, $grupoId, $menuId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GrupoUsuarioMenus grupoUsuarioMenu
 	 */
	public function insert($grupoUsuarioMenu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GrupoUsuarioMenus grupoUsuarioMenu
 	 */
	public function update($grupoUsuarioMenu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPermissao($value);


	public function deleteByPermissao($value);


}
?>