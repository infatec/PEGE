<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TurmaDisciplinaHorarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TurmaDisciplinaHorario 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TurmaDisciplinaHorario      
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
 	 * @param turmaDisciplinaHorario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TurmaDisciplinaHorario turmaDisciplinaHorario
 	 */
	public function insert($turmaDisciplinaHorario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TurmaDisciplinaHorario turmaDisciplinaHorario
 	 */
	public function update($turmaDisciplinaHorario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDiasSemana($value);

	public function queryByTurmaDisciplinaId($value);

	public function queryByHorarioId($value);


	public function deleteByDiasSemana($value);

	public function deleteByTurmaDisciplinaId($value);

	public function deleteByHorarioId($value);


}
?>