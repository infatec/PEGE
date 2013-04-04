<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-02-22 09:07
 */
interface DisicplinasAprovadaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return DisicplinasAprovada 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return DisicplinasAprovada      
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
 	 * @param disicplinasAprovada primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param DisicplinasAprovada disicplinasAprovada
 	 */
	public function insert($disicplinasAprovada);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param DisicplinasAprovada disicplinasAprovada
 	 */
	public function update($disicplinasAprovada);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTransferenciaId($value);

	public function queryByDisciplinaId($value);


	public function deleteByTransferenciaId($value);

	public function deleteByDisciplinaId($value);


}
?>