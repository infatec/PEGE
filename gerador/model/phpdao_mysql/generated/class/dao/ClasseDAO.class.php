<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-02-17 20:15
 */
interface ClasseI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Classe 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Classe      
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
 	 * @param classe primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Classe classe
 	 */
	public function insert($classe);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Classe classe
 	 */
	public function update($classe);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByNome($value);

	public function queryByCapacidade($value);

	public function queryByLocalizacao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByEscolaId($value);

	public function deleteByNome($value);

	public function deleteByCapacidade($value);

	public function deleteByLocalizacao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>