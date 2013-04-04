<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-06-23 08:39
 */
interface RedirecionaBlogI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return RedirecionaBlog 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return RedirecionaBlog      
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
 	 * @param redirecionaBlog primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param RedirecionaBlog redirecionaBlog
 	 */
	public function insert($redirecionaBlog);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param RedirecionaBlog redirecionaBlog
 	 */
	public function update($redirecionaBlog);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByResumo($value);

	public function queryByLink($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByFotoDestaque($value);


	public function deleteByTitulo($value);

	public function deleteByResumo($value);

	public function deleteByLink($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByFotoDestaque($value);


}
?>