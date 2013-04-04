<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface AnuncioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Anuncio 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Anuncio      
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
 	 * @param anuncio primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Anuncio anuncio
 	 */
	public function insert($anuncio);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Anuncio anuncio
 	 */
	public function update($anuncio);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByImg($value);

	public function queryByTitulo($value);

	public function queryByPrecoNormal($value);

	public function queryByPrecoDesconto($value);

	public function queryByPorcentoDesconto($value);

	public function queryByDescricaoAnuncio($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByEstado($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByCompraColetivaId($value);

	public function queryByDataInicio($value);

	public function queryByDataFim($value);

	public function queryByLatitude($value);

	public function queryByLongitude($value);


	public function deleteByImg($value);

	public function deleteByTitulo($value);

	public function deleteByPrecoNormal($value);

	public function deleteByPrecoDesconto($value);

	public function deleteByPorcentoDesconto($value);

	public function deleteByDescricaoAnuncio($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByEstado($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByCompraColetivaId($value);

	public function deleteByDataInicio($value);

	public function deleteByDataFim($value);

	public function deleteByLatitude($value);

	public function deleteByLongitude($value);


}
?>