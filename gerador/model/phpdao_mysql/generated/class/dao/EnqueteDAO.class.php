<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-06-23 08:39
 */
interface EnqueteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Enquete 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Enquete      
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
 	 * @param enquete primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Enquete enquete
 	 */
	public function insert($enquete);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Enquete enquete
 	 */
	public function update($enquete);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByVotos($value);

	public function queryByDataEntrada($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByTitulo($value);

	public function deleteByVotos($value);

	public function deleteByDataEntrada($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>