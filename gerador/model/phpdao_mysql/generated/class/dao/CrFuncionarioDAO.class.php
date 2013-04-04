<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-02-02 11:44
 */
interface CrFuncionarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CrFuncionario 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CrFuncionario      
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
 	 * @param crFuncionario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CrFuncionario crFuncionario
 	 */
	public function insert($crFuncionario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CrFuncionario crFuncionario
 	 */
	public function update($crFuncionario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByFuncionarioId($value);

	public function queryByContasAReceberId($value);


	public function deleteByFuncionarioId($value);

	public function deleteByContasAReceberId($value);


}
?>