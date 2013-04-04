<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-06-23 08:39
 */
interface CdDoDiaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CdDoDia 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CdDoDia      
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
 	 * @param cdDoDia primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CdDoDia cdDoDia
 	 */
	public function insert($cdDoDia);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CdDoDia cdDoDia
 	 */
	public function update($cdDoDia);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByTitulo($value);

	public function queryByLink($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNome($value);

	public function deleteByTitulo($value);

	public function deleteByLink($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>