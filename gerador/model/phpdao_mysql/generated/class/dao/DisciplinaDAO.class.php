<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface DisciplinaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Disciplina 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Disciplina      
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
 	 * @param disciplina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Disciplina disciplina
 	 */
	public function insert($disciplina);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Disciplina disciplina
 	 */
	public function update($disciplina);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTipoDisciplinaId($value);

	public function queryByDescricao($value);

	public function queryByCargaHorarioTeorica($value);

	public function queryByCargaHorariaPratica($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByCursoId($value);

	public function queryByBloco($value);


	public function deleteByTipoDisciplinaId($value);

	public function deleteByDescricao($value);

	public function deleteByCargaHorarioTeorica($value);

	public function deleteByCargaHorariaPratica($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByCursoId($value);

	public function deleteByBloco($value);


}
?>