<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-07-02 08:49
 */
interface FonteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Fonte 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Fonte      
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
 	 * @param fonte primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Fonte fonte
 	 */
	public function insert($fonte);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Fonte fonte
 	 */
	public function update($fonte);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryBySubcategoriaId($value);

	public function queryByNome($value);

	public function queryByImagem($value);

	public function queryByDescricao($value);

	public function queryByArquivoRar($value);

	public function queryByArquivoTtf($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByUrl($value);


	public function deleteBySubcategoriaId($value);

	public function deleteByNome($value);

	public function deleteByImagem($value);

	public function deleteByDescricao($value);

	public function deleteByArquivoRar($value);

	public function deleteByArquivoTtf($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByUrl($value);


}
?>