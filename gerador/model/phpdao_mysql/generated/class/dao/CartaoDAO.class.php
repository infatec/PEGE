<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface CartaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Cartao 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Cartao      
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
 	 * @param cartao primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Cartao cartao
 	 */
	public function insert($cartao);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Cartao cartao
 	 */
	public function update($cartao);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByBandera($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByBandera($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>