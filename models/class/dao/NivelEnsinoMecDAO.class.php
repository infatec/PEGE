<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface NivelEnsinoMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return NivelEnsinoMec 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return NivelEnsinoMec      
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
 	 * @param nivelEnsinoMec primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param NivelEnsinoMec nivelEnsinoMec
 	 */
	public function insert($nivelEnsinoMec);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param NivelEnsinoMec nivelEnsinoMec
 	 */
	public function update($nivelEnsinoMec);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByModalidadeEnsinoMecId($value);

	public function queryByCodigo($value);

	public function queryByIndividualEscola($value);

	public function queryByNome($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByModalidadeEnsinoMecId($value);

	public function deleteByCodigo($value);

	public function deleteByIndividualEscola($value);

	public function deleteByNome($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>