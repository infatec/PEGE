<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-07-02 08:49
 */
interface PosicaoCategoriaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PosicaoCategoria 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PosicaoCategoria      
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
 	 * @param posicaoCategoria primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PosicaoCategoria posicaoCategoria
 	 */
	public function insert($posicaoCategoria);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PosicaoCategoria posicaoCategoria
 	 */
	public function update($posicaoCategoria);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCategoriaId($value);

	public function queryByPosicao($value);


	public function deleteByCategoriaId($value);

	public function deleteByPosicao($value);


}
?>