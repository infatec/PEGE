<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface FilmesCartazI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FilmesCartaz 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FilmesCartaz      
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
 	 * @param filmesCartaz primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FilmesCartaz filmesCartaz
 	 */
	public function insert($filmesCartaz);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FilmesCartaz filmesCartaz
 	 */
	public function update($filmesCartaz);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCinemaId($value);

	public function queryByTitulo($value);

	public function queryByDescricao($value);

	public function queryBySinopse($value);

	public function queryByEmpedYoutube($value);

	public function queryByStatus($value);

	public function queryByCreated($value);


	public function deleteByCinemaId($value);

	public function deleteByTitulo($value);

	public function deleteByDescricao($value);

	public function deleteBySinopse($value);

	public function deleteByEmpedYoutube($value);

	public function deleteByStatus($value);

	public function deleteByCreated($value);


}
?>