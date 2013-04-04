<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-07-16 14:25
 */
interface JogoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Jogo 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Jogo      
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
 	 * @param jogo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Jogo jogo
 	 */
	public function insert($jogo);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Jogo jogo
 	 */
	public function update($jogo);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCategoriaId($value);

	public function queryByNome($value);

	public function queryBySubtitulo($value);

	public function queryByDescricao($value);

	public function queryByComoJogar($value);

	public function queryByLinkJogo($value);

	public function queryByVotos($value);

	public function queryByMedia($value);

	public function queryByClick($value);

	public function queryByUrl($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByFotoDestaque($value);


	public function deleteByCategoriaId($value);

	public function deleteByNome($value);

	public function deleteBySubtitulo($value);

	public function deleteByDescricao($value);

	public function deleteByComoJogar($value);

	public function deleteByLinkJogo($value);

	public function deleteByVotos($value);

	public function deleteByMedia($value);

	public function deleteByClick($value);

	public function deleteByUrl($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByFotoDestaque($value);


}
?>