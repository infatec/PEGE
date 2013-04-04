<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface HorarioAulaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return HorarioAula 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return HorarioAula      
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
 	 * @param horarioAula primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param HorarioAula horarioAula
 	 */
	public function insert($horarioAula);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param HorarioAula horarioAula
 	 */
	public function update($horarioAula);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByGradeHorarioId($value);

	public function queryByHoraInicio($value);

	public function queryByHoraFim($value);

	public function queryByOrdem($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByGradeHorarioId($value);

	public function deleteByHoraInicio($value);

	public function deleteByHoraFim($value);

	public function deleteByOrdem($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>