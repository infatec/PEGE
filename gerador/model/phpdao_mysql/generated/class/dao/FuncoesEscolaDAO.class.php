<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface FuncoesEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FuncoesEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FuncoesEscola      
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
 	 * @param funcoesEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FuncoesEscola funcoesEscola
 	 */
	public function insert($funcoesEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FuncoesEscola funcoesEscola
 	 */
	public function update($funcoesEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByFuncoesMecId($value);


	public function deleteByEscolaId($value);

	public function deleteByFuncoesMecId($value);


}
?>