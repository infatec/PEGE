<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-05-21 16:32
 */
interface EnqueteAlternativasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return EnqueteAlternativas 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return EnqueteAlternativas      
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
 	 * @param enqueteAlternativa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param EnqueteAlternativas enqueteAlternativa
 	 */
	public function insert($enqueteAlternativa);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param EnqueteAlternativas enqueteAlternativa
 	 */
	public function update($enqueteAlternativa);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEnqueteId($value);

	public function queryByResposta($value);

	public function queryByContator($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByEnqueteId($value);

	public function deleteByResposta($value);

	public function deleteByContator($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>