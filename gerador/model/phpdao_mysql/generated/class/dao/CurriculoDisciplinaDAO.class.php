<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface CurriculoDisciplinaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CurriculoDisciplina 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CurriculoDisciplina      
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
 	 * @param curriculoDisciplina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CurriculoDisciplina curriculoDisciplina
 	 */
	public function insert($curriculoDisciplina);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CurriculoDisciplina curriculoDisciplina
 	 */
	public function update($curriculoDisciplina);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDisciplinaId($value);

	public function queryByCurriculoId($value);

	public function queryByCargaHoraria($value);

	public function queryByBloco($value);

	public function queryByCursoId($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDisciplinaId($value);

	public function deleteByCurriculoId($value);

	public function deleteByCargaHoraria($value);

	public function deleteByBloco($value);

	public function deleteByCursoId($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>