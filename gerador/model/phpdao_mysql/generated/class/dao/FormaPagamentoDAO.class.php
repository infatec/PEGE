<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface FormaPagamentoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FormaPagamento 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FormaPagamento      
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
 	 * @param formaPagamento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FormaPagamento formaPagamento
 	 */
	public function insert($formaPagamento);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FormaPagamento formaPagamento
 	 */
	public function update($formaPagamento);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByCaixa($value);

	public function queryByNegociacao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByCartao($value);

	public function queryByCheque($value);


	public function deleteByDescricao($value);

	public function deleteByCaixa($value);

	public function deleteByNegociacao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByCartao($value);

	public function deleteByCheque($value);


}
?>