<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface PlanoContaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PlanoConta 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PlanoConta      
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
 	 * @param planoConta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PlanoConta planoConta
 	 */
	public function insert($planoConta);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PlanoConta planoConta
 	 */
	public function update($planoConta);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByNatureza($value);

	public function queryByTipoNivel($value);

	public function queryByCodigo($value);

	public function queryByPlanoContaSupId($value);

	public function queryByUsuariosId($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByNatureza($value);

	public function deleteByTipoNivel($value);

	public function deleteByCodigo($value);

	public function deleteByPlanoContaSupId($value);

	public function deleteByUsuariosId($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>