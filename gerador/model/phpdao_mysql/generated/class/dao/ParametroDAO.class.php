<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface ParametroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Parametro 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Parametro      
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
 	 * @param parametro primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Parametro parametro
 	 */
	public function insert($parametro);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Parametro parametro
 	 */
	public function update($parametro);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTipo($value);

	public function queryByQtdRetidos($value);


	public function deleteByTipo($value);

	public function deleteByQtdRetidos($value);


}
?>