<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface DistritosMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DistritosMec 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DistritosMec      
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
 	 * @param distritosMec primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DistritosMec distritosMec
 	 */
	public function insert($distritosMec);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DistritosMec distritosMec
 	 */
	public function update($distritosMec);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCodigo($value);

	public function queryByNome($value);

	public function queryByMunicipio($value);

	public function queryByUf($value);

	public function queryByIndividualEscola($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCodigo($value);

	public function deleteByNome($value);

	public function deleteByMunicipio($value);

	public function deleteByUf($value);

	public function deleteByIndividualEscola($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>