<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-02-02 11:44
 */
interface FuncionarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Funcionario 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Funcionario      
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
 	 * @param funcionario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Funcionario funcionario
 	 */
	public function insert($funcionario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Funcionario funcionario
 	 */
	public function update($funcionario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByFuncaoId($value);

	public function queryByNome($value);

	public function queryByTelefone1($value);

	public function queryByTelefone2($value);

	public function queryByEmail($value);


	public function deleteByFuncaoId($value);

	public function deleteByNome($value);

	public function deleteByTelefone1($value);

	public function deleteByTelefone2($value);

	public function deleteByEmail($value);


}
?>