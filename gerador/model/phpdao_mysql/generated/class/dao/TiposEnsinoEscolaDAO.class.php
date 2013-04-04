<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TiposEnsinoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposEnsinoEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposEnsinoEscola      
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
 	 * @param tiposEnsinoEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposEnsinoEscola tiposEnsinoEscola
 	 */
	public function insert($tiposEnsinoEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposEnsinoEscola tiposEnsinoEscola
 	 */
	public function update($tiposEnsinoEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTiposEnsinoMecId($value);

	public function queryByEscolaId($value);


	public function deleteByTiposEnsinoMecId($value);

	public function deleteByEscolaId($value);


}
?>