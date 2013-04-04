<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface HorarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Horario 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Horario      
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
 	 * @param horario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Horario horario
 	 */
	public function insert($horario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Horario horario
 	 */
	public function update($horario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByHoraInicio($value);

	public function queryByHoraFim($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByHoraInicio($value);

	public function deleteByHoraFim($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>