<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface AulaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Aula 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Aula      
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
 	 * @param aula primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Aula aula
 	 */
	public function insert($aula);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Aula aula
 	 */
	public function update($aula);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTurmaDisciplinaId($value);

	public function queryByDataAula($value);

	public function queryByHoraInicio($value);

	public function queryByHoraFim($value);

	public function queryByQtdAula($value);

	public function queryByAtividade($value);


	public function deleteByTurmaDisciplinaId($value);

	public function deleteByDataAula($value);

	public function deleteByHoraInicio($value);

	public function deleteByHoraFim($value);

	public function deleteByQtdAula($value);

	public function deleteByAtividade($value);


}
?>