<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface FestaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Festa 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Festa      
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
 	 * @param festa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Festa festa
 	 */
	public function insert($festa);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Festa festa
 	 */
	public function update($festa);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByClubeId($value);

	public function queryByBarId($value);

	public function queryByRestauranteId($value);

	public function queryByCinemaId($value);

	public function queryByHotelId($value);

	public function queryByLocal($value);

	public function queryByBoateId($value);

	public function queryByCidadeId($value);

	public function queryByDataFesta($value);

	public function queryByHoraInicio($value);

	public function queryByDescricao($value);

	public function queryByFoto($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByClubeId($value);

	public function deleteByBarId($value);

	public function deleteByRestauranteId($value);

	public function deleteByCinemaId($value);

	public function deleteByHotelId($value);

	public function deleteByLocal($value);

	public function deleteByBoateId($value);

	public function deleteByCidadeId($value);

	public function deleteByDataFesta($value);

	public function deleteByHoraInicio($value);

	public function deleteByDescricao($value);

	public function deleteByFoto($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>