<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface ImagemDestaqueI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ImagemDestaque 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ImagemDestaque      
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
 	 * @param imagemDestaque primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ImagemDestaque imagemDestaque
 	 */
	public function insert($imagemDestaque);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ImagemDestaque imagemDestaque
 	 */
	public function update($imagemDestaque);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByPosicao($value);

	public function queryByImagem($value);

	public function queryByStatus($value);


	public function deleteByPosicao($value);

	public function deleteByImagem($value);

	public function deleteByStatus($value);


}
?>