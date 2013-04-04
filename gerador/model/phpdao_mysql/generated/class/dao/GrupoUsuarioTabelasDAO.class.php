<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface GrupoUsuarioTabelasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return GrupoUsuarioTabelas 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return GrupoUsuarioTabelas      
	 */
	public function queryAll($campos="*",$criterio="");
    
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio="");
	
    /**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Deleta registro da tabela
 	 * @param grupoUsuarioTabela primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param GrupoUsuarioTabelas grupoUsuarioTabela
 	 */
	public function insert($grupoUsuarioTabela);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param GrupoUsuarioTabelas grupoUsuarioTabela
 	 */
	public function update($grupoUsuarioTabela);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByGrupoId($value);

	public function queryByTabelaId($value);

	public function queryByPermissao($value);


	public function deleteByGrupoId($value);

	public function deleteByTabelaId($value);

	public function deleteByPermissao($value);


}
?>