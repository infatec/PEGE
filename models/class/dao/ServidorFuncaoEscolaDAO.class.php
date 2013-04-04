<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface ServidorFuncaoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ServidorFuncaoEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ServidorFuncaoEscola      
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
 	 * @param servidorFuncaoEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ServidorFuncaoEscola servidorFuncaoEscola
 	 */
	public function insert($servidorFuncaoEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ServidorFuncaoEscola servidorFuncaoEscola
 	 */
	public function update($servidorFuncaoEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByServidorId($value);

	public function queryByEscolaId($value);

	public function queryByFuncoesMecId($value);


	public function deleteByServidorId($value);

	public function deleteByEscolaId($value);

	public function deleteByFuncoesMecId($value);


}
?>