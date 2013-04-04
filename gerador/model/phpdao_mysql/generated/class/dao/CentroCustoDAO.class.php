<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface CentroCustoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CentroCusto 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CentroCusto      
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
 	 * @param centroCusto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CentroCusto centroCusto
 	 */
	public function insert($centroCusto);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CentroCusto centroCusto
 	 */
	public function update($centroCusto);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByUsuariosId($value);

	public function queryByCodigo($value);

	public function queryByCentroCustoSupId($value);

	public function queryByTipoNivel($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByUsuariosId($value);

	public function deleteByCodigo($value);

	public function deleteByCentroCustoSupId($value);

	public function deleteByTipoNivel($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>