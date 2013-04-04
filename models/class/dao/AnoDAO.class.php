<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface AnoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Ano 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Ano      
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
 	 * @param ano primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Ano ano
 	 */
	public function insert($ano);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Ano ano
 	 */
	public function update($ano);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNivelEnsinoMecId($value);

	public function queryByCodigo($value);

	public function queryByNome($value);

	public function queryByIndividualEscola($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByIdadeCorreta($value);


	public function deleteByNivelEnsinoMecId($value);

	public function deleteByCodigo($value);

	public function deleteByNome($value);

	public function deleteByIndividualEscola($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByIdadeCorreta($value);


}
?>