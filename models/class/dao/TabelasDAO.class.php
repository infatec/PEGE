<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TabelasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Tabelas 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Tabelas      
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
 	 * @param tabela primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Tabelas tabela
 	 */
	public function insert($tabela);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Tabelas tabela
 	 */
	public function update($tabela);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTabelaId($value);

	public function queryByMenuId($value);

	public function queryByNome($value);

	public function queryByTipo($value);

	public function queryByPasta($value);

	public function queryByStatus($value);

	public function queryByOrdem($value);


	public function deleteByTabelaId($value);

	public function deleteByMenuId($value);

	public function deleteByNome($value);

	public function deleteByTipo($value);

	public function deleteByPasta($value);

	public function deleteByStatus($value);

	public function deleteByOrdem($value);


}
?>