<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-07-02 08:49
 */
interface SubcategoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Subcategoria 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Subcategoria      
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
 	 * @param subcategoria primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Subcategoria subcategoria
 	 */
	public function insert($subcategoria);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Subcategoria subcategoria
 	 */
	public function update($subcategoria);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCategoriaId($value);

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByUrl($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCategoriaId($value);

	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByUrl($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>