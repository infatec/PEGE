<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface ClubeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Clube 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Clube      
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
 	 * @param clube primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Clube clube
 	 */
	public function insert($clube);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Clube clube
 	 */
	public function update($clube);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCidadeId($value);

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByFoto($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByEstado($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByIdentificacao($value);

	public function queryByLatitude($value);

	public function queryByLongitude($value);


	public function deleteByCidadeId($value);

	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByFoto($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByEstado($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByIdentificacao($value);

	public function deleteByLatitude($value);

	public function deleteByLongitude($value);


}
?>