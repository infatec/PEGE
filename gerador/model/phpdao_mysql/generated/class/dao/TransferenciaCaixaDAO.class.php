<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface TransferenciaCaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TransferenciaCaixa 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TransferenciaCaixa      
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
 	 * @param transferenciaCaixa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TransferenciaCaixa transferenciaCaixa
 	 */
	public function insert($transferenciaCaixa);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TransferenciaCaixa transferenciaCaixa
 	 */
	public function update($transferenciaCaixa);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByData($value);

	public function queryByUsuariosId($value);

	public function queryByValor($value);

	public function queryByAberturaFechamentoCaixaEId($value);

	public function queryByAberturaFechamentoCaixaSId($value);

	public function queryByCaixaEId($value);

	public function queryByCaixaSId($value);


	public function deleteByData($value);

	public function deleteByUsuariosId($value);

	public function deleteByValor($value);

	public function deleteByAberturaFechamentoCaixaEId($value);

	public function deleteByAberturaFechamentoCaixaSId($value);

	public function deleteByCaixaEId($value);

	public function deleteByCaixaSId($value);


}
?>