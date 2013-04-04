<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface VideoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Video 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Video      
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
 	 * @param video primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Video video
 	 */
	public function insert($video);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Video video
 	 */
	public function update($video);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByEmped($value);

	public function queryByDataEntrada($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByTitulo($value);

	public function deleteByEmped($value);

	public function deleteByDataEntrada($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>