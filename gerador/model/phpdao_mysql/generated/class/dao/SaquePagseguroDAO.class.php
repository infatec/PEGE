<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface SaquePagseguroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return SaquePagseguro 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return SaquePagseguro      
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
 	 * @param saquePagseguro primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param SaquePagseguro saquePagseguro
 	 */
	public function insert($saquePagseguro);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param SaquePagseguro saquePagseguro
 	 */
	public function update($saquePagseguro);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByData($value);

	public function queryByUsuariosId($value);

	public function queryByValor($value);

	public function queryByCaixaId($value);


	public function deleteByData($value);

	public function deleteByUsuariosId($value);

	public function deleteByValor($value);

	public function deleteByCaixaId($value);


}
?>