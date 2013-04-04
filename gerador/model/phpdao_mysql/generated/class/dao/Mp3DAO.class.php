<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-06-23 08:39
 */
interface Mp3I{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Mp3 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Mp3      
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
 	 * @param mp3 primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Mp3 mp3
 	 */
	public function insert($mp3);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Mp3 mp3
 	 */
	public function update($mp3);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByBanda($value);

	public function queryByCantor($value);

	public function queryByArquivo($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByMusica($value);

	public function queryByLinkDownload($value);


	public function deleteByBanda($value);

	public function deleteByCantor($value);

	public function deleteByArquivo($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByMusica($value);

	public function deleteByLinkDownload($value);


}
?>