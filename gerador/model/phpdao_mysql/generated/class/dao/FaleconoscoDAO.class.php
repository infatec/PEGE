<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface FaleconoscoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Faleconosco 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Faleconosco      
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
 	 * @param faleconosco primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Faleconosco faleconosco
 	 */
	public function insert($faleconosco);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Faleconosco faleconosco
 	 */
	public function update($faleconosco);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByEmail($value);

	public function queryByTelefone($value);

	public function queryByMensagem($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNome($value);

	public function deleteByEmail($value);

	public function deleteByTelefone($value);

	public function deleteByMensagem($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>