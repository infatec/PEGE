<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface CedI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Ced 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Ced      
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
 	 * @param ced primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Ced ced
 	 */
	public function insert($ced);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Ced ced
 	 */
	public function update($ced);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByEscolaId($value);

	public function queryByServidorId($value);

	public function queryByAlunoId($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByEscolaId($value);

	public function deleteByServidorId($value);

	public function deleteByAlunoId($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>