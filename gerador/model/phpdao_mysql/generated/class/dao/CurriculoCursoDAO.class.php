<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface CurriculoCursoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CurriculoCurso 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CurriculoCurso      
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
 	 * @param curriculoCurso primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CurriculoCurso curriculoCurso
 	 */
	public function insert($curriculoCurso);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CurriculoCurso curriculoCurso
 	 */
	public function update($curriculoCurso);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCursoId($value);

	public function queryByCurriculoId($value);

	public function queryByCargaHorariaDisciplina($value);

	public function queryByDuracaoMin($value);

	public function queryByDuracaoMed($value);

	public function queryByDuracaoMax($value);

	public function queryByCargaHorariaEstagio($value);

	public function queryByCargaHorariaExCurricular($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCursoId($value);

	public function deleteByCurriculoId($value);

	public function deleteByCargaHorariaDisciplina($value);

	public function deleteByDuracaoMin($value);

	public function deleteByDuracaoMed($value);

	public function deleteByDuracaoMax($value);

	public function deleteByCargaHorariaEstagio($value);

	public function deleteByCargaHorariaExCurricular($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>