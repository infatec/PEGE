<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TurmaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Turma 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Turma      
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
 	 * @param turma primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Turma turma
 	 */
	public function insert($turma);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Turma turma
 	 */
	public function update($turma);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCodigo($value);

	public function queryByNivelEnsinoMecId($value);

	public function queryByTurnoId($value);

	public function queryByAnoId($value);

	public function queryByNumMaxAluno($value);

	public function queryByEscolaId($value);

	public function queryByAnoLetivoId($value);

	public function queryBySalaId($value);


	public function deleteByCodigo($value);

	public function deleteByNivelEnsinoMecId($value);

	public function deleteByTurnoId($value);

	public function deleteByAnoId($value);

	public function deleteByNumMaxAluno($value);

	public function deleteByEscolaId($value);

	public function deleteByAnoLetivoId($value);

	public function deleteBySalaId($value);


}
?>