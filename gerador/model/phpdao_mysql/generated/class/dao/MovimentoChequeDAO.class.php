<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface MovimentoChequeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return MovimentoCheque 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return MovimentoCheque      
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
 	 * @param movimentoCheque primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param MovimentoCheque movimentoCheque
 	 */
	public function insert($movimentoCheque);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param MovimentoCheque movimentoCheque
 	 */
	public function update($movimentoCheque);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDataMovimento($value);

	public function queryByChequeContaReceberId($value);

	public function queryBySituacaoChequeId($value);

	public function queryByCaixaId($value);

	public function queryByCancelado($value);

	public function queryByChequeContaPagarId($value);


	public function deleteByDataMovimento($value);

	public function deleteByChequeContaReceberId($value);

	public function deleteBySituacaoChequeId($value);

	public function deleteByCaixaId($value);

	public function deleteByCancelado($value);

	public function deleteByChequeContaPagarId($value);


}
?>