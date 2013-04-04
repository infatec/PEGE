<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface CardapioBarI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CardapioBar 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CardapioBar      
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
 	 * @param cardapioBar primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CardapioBar cardapioBar
 	 */
	public function insert($cardapioBar);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CardapioBar cardapioBar
 	 */
	public function update($cardapioBar);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByBarId($value);


	public function deleteByBarId($value);


}
?>