<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface DisciplinasAprovadaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisciplinasAprovada 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisciplinasAprovada      
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
 	 * @param disciplinasAprovada primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisciplinasAprovada disciplinasAprovada
 	 */
	public function insert($disciplinasAprovada);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisciplinasAprovada disciplinasAprovada
 	 */
	public function update($disciplinasAprovada);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTransferenciaId($value);

	public function queryByDisciplinaId($value);

	public function queryByAlunoId($value);


	public function deleteByTransferenciaId($value);

	public function deleteByDisciplinaId($value);

	public function deleteByAlunoId($value);


}
?>