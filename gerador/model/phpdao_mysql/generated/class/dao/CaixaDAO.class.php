<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface CaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Caixa 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Caixa      
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
 	 * @param caixa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Caixa caixa
 	 */
	public function insert($caixa);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Caixa caixa
 	 */
	public function update($caixa);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByEntrada($value);

	public function queryBySaida($value);

	public function queryByTransferencia($value);

	public function queryByCaixaCentral($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByEntrada($value);

	public function deleteBySaida($value);

	public function deleteByTransferencia($value);

	public function deleteByCaixaCentral($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>