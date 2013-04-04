<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface OcorreAcadI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return OcorreAcad 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return OcorreAcad      
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
 	 * @param ocorreAcad primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param OcorreAcad ocorreAcad
 	 */
	public function insert($ocorreAcad);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param OcorreAcad ocorreAcad
 	 */
	public function update($ocorreAcad);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryBySigla($value);

	public function queryByDescricao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteBySigla($value);

	public function deleteByDescricao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>