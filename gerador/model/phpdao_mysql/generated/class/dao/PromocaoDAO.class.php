<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface PromocaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Promocao 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Promocao      
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
 	 * @param promocao primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Promocao promocao
 	 */
	public function insert($promocao);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Promocao promocao
 	 */
	public function update($promocao);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDataInicio($value);

	public function queryByDataFim($value);

	public function queryByLocal($value);

	public function queryByDescricao($value);

	public function queryByFoto($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryBySushiId($value);

	public function queryByPizzariaId($value);

	public function queryByBarId($value);

	public function queryByRestauranteId($value);

	public function queryByCinemaId($value);

	public function queryByHotelId($value);

	public function queryByMaisServicosId($value);


	public function deleteByDataInicio($value);

	public function deleteByDataFim($value);

	public function deleteByLocal($value);

	public function deleteByDescricao($value);

	public function deleteByFoto($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteBySushiId($value);

	public function deleteByPizzariaId($value);

	public function deleteByBarId($value);

	public function deleteByRestauranteId($value);

	public function deleteByCinemaId($value);

	public function deleteByHotelId($value);

	public function deleteByMaisServicosId($value);


}
?>