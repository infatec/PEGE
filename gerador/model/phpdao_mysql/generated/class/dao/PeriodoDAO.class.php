<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface PeriodoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Periodo 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Periodo      
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
 	 * @param periodo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Periodo periodo
 	 */
	public function insert($periodo);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Periodo periodo
 	 */
	public function update($periodo);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByReferencia($value);

	public function queryByTipo($value);

	public function queryByDataInicio($value);

	public function queryByDataFim($value);

	public function queryByDataLimiteMatricula($value);

	public function queryByDataInicioMatricula($value);

	public function queryByDataFimMatricula($value);

	public function queryBySituacao($value);

	public function queryByObservacao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByReferencia($value);

	public function deleteByTipo($value);

	public function deleteByDataInicio($value);

	public function deleteByDataFim($value);

	public function deleteByDataLimiteMatricula($value);

	public function deleteByDataInicioMatricula($value);

	public function deleteByDataFimMatricula($value);

	public function deleteBySituacao($value);

	public function deleteByObservacao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>