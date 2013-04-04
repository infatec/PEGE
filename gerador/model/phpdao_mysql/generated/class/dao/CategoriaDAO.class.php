<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-07-16 14:25
 */
interface CategoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Categoria 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Categoria      
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
 	 * @param categoria primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Categoria categoria
 	 */
	public function insert($categoria);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Categoria categoria
 	 */
	public function update($categoria);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByClassificacaoId($value);

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByUrl($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByClassificacaoId($value);

	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByUrl($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>