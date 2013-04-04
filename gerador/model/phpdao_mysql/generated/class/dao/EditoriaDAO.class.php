<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface EditoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Editoria 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Editoria      
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
 	 * @param editoria primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Editoria editoria
 	 */
	public function insert($editoria);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Editoria editoria
 	 */
	public function update($editoria);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTipoEditoriaId($value);

	public function queryByLink($value);

	public function queryByDescricao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByNome($value);

	public function queryByPalavraChave($value);


	public function deleteByTipoEditoriaId($value);

	public function deleteByLink($value);

	public function deleteByDescricao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByNome($value);

	public function deleteByPalavraChave($value);


}
?>