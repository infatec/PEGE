<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface MatriculaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Matricula 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Matricula      
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
 	 * @param matricula primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Matricula matricula
 	 */
	public function insert($matricula);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Matricula matricula
 	 */
	public function update($matricula);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDataMatricula($value);

	public function queryByMatricula($value);

	public function queryByAlunoId($value);

	public function queryByTurmaId($value);


	public function deleteByDataMatricula($value);

	public function deleteByMatricula($value);

	public function deleteByAlunoId($value);

	public function deleteByTurmaId($value);


}
?>