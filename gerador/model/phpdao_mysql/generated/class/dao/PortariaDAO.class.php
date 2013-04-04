<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface PortariaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Portaria 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Portaria      
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
 	 * @param portaria primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Portaria portaria
 	 */
	public function insert($portaria);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Portaria portaria
 	 */
	public function update($portaria);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByServidorId($value);

	public function queryByDataEntrada($value);

	public function queryByHoraEntrada($value);

	public function queryByRg($value);

	public function queryByAlunoId($value);

	public function queryByModalidade($value);


	public function deleteByServidorId($value);

	public function deleteByDataEntrada($value);

	public function deleteByHoraEntrada($value);

	public function deleteByRg($value);

	public function deleteByAlunoId($value);

	public function deleteByModalidade($value);


}
?>