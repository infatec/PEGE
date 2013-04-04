<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface CidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Cidade 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Cidade      
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
 	 * @param cidade primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Cidade cidade
 	 */
	public function insert($cidade);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Cidade cidade
 	 */
	public function update($cidade);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEstadosId($value);

	public function queryByUf($value);

	public function queryByNome($value);


	public function deleteByEstadosId($value);

	public function deleteByUf($value);

	public function deleteByNome($value);


}
?>