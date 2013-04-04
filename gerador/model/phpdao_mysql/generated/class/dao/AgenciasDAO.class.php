<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface AgenciasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Agencias 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Agencias      
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
 	 * @param agencia primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Agencias agencia
 	 */
	public function insert($agencia);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Agencias agencia
 	 */
	public function update($agencia);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByCidadeId($value);

	public function queryByEstadoId($value);

	public function queryByCep($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByFone($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByBancoId($value);


	public function deleteByDescricao($value);

	public function deleteByCidadeId($value);

	public function deleteByEstadoId($value);

	public function deleteByCep($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByFone($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByBancoId($value);


}
?>