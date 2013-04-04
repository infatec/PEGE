<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface LogacessoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Logacesso 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Logacesso      
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
 	 * @param logacesso primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Logacesso logacesso
 	 */
	public function insert($logacesso);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Logacesso logacesso
 	 */
	public function update($logacesso);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByLogin($value);

	public function queryBySenha($value);

	public function queryByIp($value);

	public function queryByCreated($value);


	public function deleteByLogin($value);

	public function deleteBySenha($value);

	public function deleteByIp($value);

	public function deleteByCreated($value);


}
?>