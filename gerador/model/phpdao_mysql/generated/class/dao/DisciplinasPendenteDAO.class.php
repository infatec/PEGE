<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface DisciplinasPendenteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisciplinasPendente 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisciplinasPendente      
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
 	 * @param disciplinasPendente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisciplinasPendente disciplinasPendente
 	 */
	public function insert($disciplinasPendente);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisciplinasPendente disciplinasPendente
 	 */
	public function update($disciplinasPendente);	

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