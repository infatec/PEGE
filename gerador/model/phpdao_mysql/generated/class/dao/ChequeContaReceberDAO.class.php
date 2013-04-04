<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ChequeContaReceberI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ChequeContaReceber 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ChequeContaReceber      
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
 	 * @param chequeContaReceber primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ChequeContaReceber chequeContaReceber
 	 */
	public function insert($chequeContaReceber);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ChequeContaReceber chequeContaReceber
 	 */
	public function update($chequeContaReceber);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDataCompensacao($value);

	public function queryByValor($value);

	public function queryByContasAReceberId($value);

	public function queryByCancelado($value);


	public function deleteByDataCompensacao($value);

	public function deleteByValor($value);

	public function deleteByContasAReceberId($value);

	public function deleteByCancelado($value);


}
?>