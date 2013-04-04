<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface ProfessorTurmaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ProfessorTurma 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ProfessorTurma      
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
 	 * @param professorTurma primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ProfessorTurma professorTurma
 	 */
	public function insert($professorTurma);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ProfessorTurma professorTurma
 	 */
	public function update($professorTurma);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByProfessorId($value);

	public function queryByTurmaId($value);

	public function queryBySalaId($value);

	public function queryByHorarioAulaId($value);

	public function queryBySeg($value);

	public function queryByTer($value);

	public function queryByQuar($value);

	public function queryByQuint($value);

	public function queryBySexta($value);

	public function queryBySab($value);

	public function queryByDom($value);


	public function deleteByProfessorId($value);

	public function deleteByTurmaId($value);

	public function deleteBySalaId($value);

	public function deleteByHorarioAulaId($value);

	public function deleteBySeg($value);

	public function deleteByTer($value);

	public function deleteByQuar($value);

	public function deleteByQuint($value);

	public function deleteBySexta($value);

	public function deleteBySab($value);

	public function deleteByDom($value);


}
?>