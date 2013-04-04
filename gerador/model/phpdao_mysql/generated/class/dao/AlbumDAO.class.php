<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:46
 */
interface AlbumI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Album 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Album      
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
 	 * @param album primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Album album
 	 */
	public function insert($album);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Album album
 	 */
	public function update($album);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryBySubtitulo($value);

	public function queryByDataEntrada($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByFotoDestaque($value);

	public function queryByUrl($value);

	public function queryByClicks($value);


	public function deleteByTitulo($value);

	public function deleteBySubtitulo($value);

	public function deleteByDataEntrada($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByFotoDestaque($value);

	public function deleteByUrl($value);

	public function deleteByClicks($value);


}
?>