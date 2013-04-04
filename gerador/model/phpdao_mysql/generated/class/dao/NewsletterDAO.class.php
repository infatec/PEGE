<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface NewsletterI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Newsletter 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Newsletter      
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
 	 * @param newsletter primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Newsletter newsletter
 	 */
	public function insert($newsletter);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Newsletter newsletter
 	 */
	public function update($newsletter);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEmail($value);

	public function queryByStatus($value);


	public function deleteByEmail($value);

	public function deleteByStatus($value);


}
?>