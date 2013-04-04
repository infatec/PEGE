<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-07-16 14:25
 */
interface DestaqueI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Destaque 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Destaque      
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
 	 * @param destaque primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Destaque destaque
 	 */
	public function insert($destaque);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Destaque destaque
 	 */
	public function update($destaque);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByPosicao($value);

	public function queryByJogoId($value);

	public function queryByTitulo($value);

	public function queryBySubtitulo($value);

	public function queryByImagem($value);

	public function queryByUrl($value);


	public function deleteByPosicao($value);

	public function deleteByJogoId($value);

	public function deleteByTitulo($value);

	public function deleteBySubtitulo($value);

	public function deleteByImagem($value);

	public function deleteByUrl($value);


}
?>