<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface ClienteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Cliente 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Cliente      
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
 	 * @param cliente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Cliente cliente
 	 */
	public function insert($cliente);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Cliente cliente
 	 */
	public function update($cliente);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByRg($value);

	public function queryByCpf($value);

	public function queryByDataNascimento($value);

	public function queryByTelefone($value);

	public function queryByUsuarioId($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNome($value);

	public function deleteByRg($value);

	public function deleteByCpf($value);

	public function deleteByDataNascimento($value);

	public function deleteByTelefone($value);

	public function deleteByUsuarioId($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>