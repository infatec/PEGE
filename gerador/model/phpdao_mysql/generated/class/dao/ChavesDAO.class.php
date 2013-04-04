<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface ChavesI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Chaves 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Chaves      
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
 	 * @param chave primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Chaves chave
 	 */
	public function insert($chave);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Chaves chave
 	 */
	public function update($chave);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNumero($value);

	public function queryByChave($value);

	public function queryByQtd($value);


	public function deleteByNumero($value);

	public function deleteByChave($value);

	public function deleteByQtd($value);


}
?>