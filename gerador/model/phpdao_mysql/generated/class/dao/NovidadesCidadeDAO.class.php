<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface NovidadesCidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return NovidadesCidade 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return NovidadesCidade      
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
 	 * @param novidadesCidade primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param NovidadesCidade novidadesCidade
 	 */
	public function insert($novidadesCidade);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param NovidadesCidade novidadesCidade
 	 */
	public function update($novidadesCidade);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCidadeId($value);

	public function queryByTitulo($value);

	public function queryByTexto($value);

	public function queryByFoto($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCidadeId($value);

	public function deleteByTitulo($value);

	public function deleteByTexto($value);

	public function deleteByFoto($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>