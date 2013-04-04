<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface ComentarioI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Comentario 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Comentario      
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
 	 * @param comentario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Comentario comentario
 	 */
	public function insert($comentario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Comentario comentario
 	 */
	public function update($comentario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNoticiaId($value);

	public function queryByNome($value);

	public function queryByEmail($value);

	public function queryByMensagem($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNoticiaId($value);

	public function deleteByNome($value);

	public function deleteByEmail($value);

	public function deleteByMensagem($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>