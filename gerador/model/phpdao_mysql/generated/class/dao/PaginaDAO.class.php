<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface PaginaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Pagina 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Pagina      
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
 	 * @param pagina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Pagina pagina
 	 */
	public function insert($pagina);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Pagina pagina
 	 */
	public function update($pagina);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByMenuId($value);

	public function queryByNome($value);

	public function queryByTitulo($value);

	public function queryByKeyword($value);

	public function queryByConteudo($value);

	public function queryByOrdem($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByUrl($value);


	public function deleteByMenuId($value);

	public function deleteByNome($value);

	public function deleteByTitulo($value);

	public function deleteByKeyword($value);

	public function deleteByConteudo($value);

	public function deleteByOrdem($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByUrl($value);


}
?>