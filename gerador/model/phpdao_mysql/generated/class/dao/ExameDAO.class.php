<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface ExameI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Exame 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Exame      
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
 	 * @param exame primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Exame exame
 	 */
	public function insert($exame);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Exame exame
 	 */
	public function update($exame);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>