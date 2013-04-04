<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ChequeCaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ChequeCaixa 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ChequeCaixa      
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
 	 * @param chequeCaixa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ChequeCaixa chequeCaixa
 	 */
	public function insert($chequeCaixa);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ChequeCaixa chequeCaixa
 	 */
	public function update($chequeCaixa);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByValor($value);

	public function queryByDataEntrada($value);

	public function queryByCaixaId($value);

	public function queryByChequeContaReceberId($value);

	public function queryByCancelado($value);


	public function deleteByValor($value);

	public function deleteByDataEntrada($value);

	public function deleteByCaixaId($value);

	public function deleteByChequeContaReceberId($value);

	public function deleteByCancelado($value);


}
?>