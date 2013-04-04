<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface ImagemDestaqueMenorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ImagemDestaqueMenor 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ImagemDestaqueMenor      
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
 	 * @param imagemDestaqueMenor primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ImagemDestaqueMenor imagemDestaqueMenor
 	 */
	public function insert($imagemDestaqueMenor);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ImagemDestaqueMenor imagemDestaqueMenor
 	 */
	public function update($imagemDestaqueMenor);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByImagem($value);

	public function queryByLink($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByTitulo($value);

	public function deleteByImagem($value);

	public function deleteByLink($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>