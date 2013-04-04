<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TurmaDisciplinaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TurmaDisciplina 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TurmaDisciplina      
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
 	 * @param turmaDisciplina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TurmaDisciplina turmaDisciplina
 	 */
	public function insert($turmaDisciplina);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TurmaDisciplina turmaDisciplina
 	 */
	public function update($turmaDisciplina);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTurmaId($value);

	public function queryByDisciplinasMecId($value);

	public function queryByServidorId($value);

	public function queryByHorasAulaSemestre1($value);

	public function queryByHorasAulaSemestre2($value);


	public function deleteByTurmaId($value);

	public function deleteByDisciplinasMecId($value);

	public function deleteByServidorId($value);

	public function deleteByHorasAulaSemestre1($value);

	public function deleteByHorasAulaSemestre2($value);


}
?>