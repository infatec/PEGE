<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface SalaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Sala 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Sala      
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
 	 * @param sala primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Sala sala
 	 */
	public function insert($sala);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Sala sala
 	 */
	public function update($sala);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByNome($value);

	public function queryByCapacidade($value);

	public function queryByLocalizacao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByEscolaId($value);

	public function deleteByNome($value);

	public function deleteByCapacidade($value);

	public function deleteByLocalizacao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>