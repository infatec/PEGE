<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface PosicaoPublicidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PosicaoPublicidade 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PosicaoPublicidade      
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
 	 * @param posicaoPublicidade primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PosicaoPublicidade posicaoPublicidade
 	 */
	public function insert($posicaoPublicidade);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PosicaoPublicidade posicaoPublicidade
 	 */
	public function update($posicaoPublicidade);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>