<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface ServidorCargoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ServidorCargoEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ServidorCargoEscola      
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
 	 * @param servidorCargoEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ServidorCargoEscola servidorCargoEscola
 	 */
	public function insert($servidorCargoEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ServidorCargoEscola servidorCargoEscola
 	 */
	public function update($servidorCargoEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByServidorId($value);

	public function queryByEscolaId($value);

	public function queryByCargosMecId($value);

	public function queryByDataAdmissao($value);

	public function queryByDataEntradaExercicio($value);

	public function queryByMatricula($value);

	public function queryByVinculo($value);

	public function queryByNumDecreto($value);


	public function deleteByServidorId($value);

	public function deleteByEscolaId($value);

	public function deleteByCargosMecId($value);

	public function deleteByDataAdmissao($value);

	public function deleteByDataEntradaExercicio($value);

	public function deleteByMatricula($value);

	public function deleteByVinculo($value);

	public function deleteByNumDecreto($value);


}
?>