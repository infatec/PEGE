<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface LigaContaRPSI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return LigaContaRPS 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return LigaContaRPS      
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
 	 * @param ligaContaRPS primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param LigaContaRPS ligaContaRPS
 	 */
	public function insert($ligaContaRPS);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param LigaContaRPS ligaContaRPS
 	 */
	public function update($ligaContaRPS);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCreated($value);


	public function deleteByCreated($value);


}
?>