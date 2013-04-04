<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface LogI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Log 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Log      
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
 	 * @param log primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Log log
 	 */
	public function insert($log);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Log log
 	 */
	public function update($log);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByAcao($value);

	public function queryByFuncionarioId($value);

	public function queryByUsuarioId($value);

	public function queryByData($value);

	public function queryByCreated($value);


	public function deleteByAcao($value);

	public function deleteByFuncionarioId($value);

	public function deleteByUsuarioId($value);

	public function deleteByData($value);

	public function deleteByCreated($value);


}
?>