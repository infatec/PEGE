<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface FaltaAlunoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FaltaAluno 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FaltaAluno      
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
 	 * @param faltaAluno primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FaltaAluno faltaAluno
 	 */
	public function insert($faltaAluno);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FaltaAluno faltaAluno
 	 */
	public function update($faltaAluno);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByAulaId($value);

	public function queryByMatriculaId($value);

	public function queryByAula($value);


	public function deleteByAulaId($value);

	public function deleteByMatriculaId($value);

	public function deleteByAula($value);


}
?>