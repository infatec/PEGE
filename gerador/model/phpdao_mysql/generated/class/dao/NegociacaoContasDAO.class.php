<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface NegociacaoContasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return NegociacaoContas 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return NegociacaoContas      
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
 	 * @param negociacaoConta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param NegociacaoContas negociacaoConta
 	 */
	public function insert($negociacaoConta);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param NegociacaoContas negociacaoConta
 	 */
	public function update($negociacaoConta);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNegociacaoId($value);

	public function queryByContasAReceberId($value);

	public function queryByContaAPagarId($value);


	public function deleteByNegociacaoId($value);

	public function deleteByContasAReceberId($value);

	public function deleteByContaAPagarId($value);


}
?>