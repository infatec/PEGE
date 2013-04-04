<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ClienteContasAReceberI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ClienteContasAReceber 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ClienteContasAReceber      
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
 	 * @param clienteContasAReceber primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ClienteContasAReceber clienteContasAReceber
 	 */
	public function insert($clienteContasAReceber);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ClienteContasAReceber clienteContasAReceber
 	 */
	public function update($clienteContasAReceber);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByClienteId($value);

	public function queryByContasAReceberId($value);


	public function deleteByClienteId($value);

	public function deleteByContasAReceberId($value);


}
?>