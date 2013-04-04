<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface CategoriaTransacaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CategoriaTransacao 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CategoriaTransacao      
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
 	 * @param categoriaTransacao primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CategoriaTransacao categoriaTransacao
 	 */
	public function insert($categoriaTransacao);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CategoriaTransacao categoriaTransacao
 	 */
	public function update($categoriaTransacao);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByTipo($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByTipo($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>