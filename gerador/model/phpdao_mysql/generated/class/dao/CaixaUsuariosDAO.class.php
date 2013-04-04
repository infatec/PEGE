<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface CaixaUsuariosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CaixaUsuarios 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CaixaUsuarios      
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
 	 * @param caixaUsuario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CaixaUsuarios caixaUsuario
 	 */
	public function insert($caixaUsuario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CaixaUsuarios caixaUsuario
 	 */
	public function update($caixaUsuario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByUsuariosId($value);

	public function queryByCaixaId($value);


	public function deleteByUsuariosId($value);

	public function deleteByCaixaId($value);


}
?>