<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:46
 */
interface AlbumFotoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AlbumFoto 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AlbumFoto      
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
 	 * @param albumFoto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AlbumFoto albumFoto
 	 */
	public function insert($albumFoto);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AlbumFoto albumFoto
 	 */
	public function update($albumFoto);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByFoto($value);

	public function queryByLegenda($value);

	public function queryByAlbumId($value);


	public function deleteByFoto($value);

	public function deleteByLegenda($value);

	public function deleteByAlbumId($value);


}
?>