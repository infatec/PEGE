<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ChequeContaPagarI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ChequeContaPagar 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ChequeContaPagar      
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
 	 * @param chequeContaPagar primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ChequeContaPagar chequeContaPagar
 	 */
	public function insert($chequeContaPagar);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ChequeContaPagar chequeContaPagar
 	 */
	public function update($chequeContaPagar);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByChequeId($value);

	public function queryByDataSaida($value);

	public function queryByDataCompensacao($value);

	public function queryByValor($value);

	public function queryByCancelado($value);


	public function deleteByChequeId($value);

	public function deleteByDataSaida($value);

	public function deleteByDataCompensacao($value);

	public function deleteByValor($value);

	public function deleteByCancelado($value);


}
?>