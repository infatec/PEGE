<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface ModalidadeEnsinoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ModalidadeEnsinoEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ModalidadeEnsinoEscola      
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
 	 * @param modalidadeEnsinoEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ModalidadeEnsinoEscola modalidadeEnsinoEscola
 	 */
	public function insert($modalidadeEnsinoEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ModalidadeEnsinoEscola modalidadeEnsinoEscola
 	 */
	public function update($modalidadeEnsinoEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByModalidadeEnsinoMecId($value);


	public function deleteByEscolaId($value);

	public function deleteByModalidadeEnsinoMecId($value);


}
?>