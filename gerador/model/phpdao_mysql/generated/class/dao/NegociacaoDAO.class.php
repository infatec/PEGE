<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface NegociacaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Negociacao 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Negociacao      
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
 	 * @param negociacao primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Negociacao negociacao
 	 */
	public function insert($negociacao);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Negociacao negociacao
 	 */
	public function update($negociacao);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByData($value);

	public function queryByValorTotal($value);

	public function queryByStatus($value);

	public function queryByAberturaFechamentoCaixaId($value);

	public function queryByCaixaId($value);


	public function deleteByData($value);

	public function deleteByValorTotal($value);

	public function deleteByStatus($value);

	public function deleteByAberturaFechamentoCaixaId($value);

	public function deleteByCaixaId($value);


}
?>