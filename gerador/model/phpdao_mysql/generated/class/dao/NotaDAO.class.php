<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface NotaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Nota 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Nota      
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
 	 * @param nota primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Nota nota
 	 */
	public function insert($nota);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Nota nota
 	 */
	public function update($nota);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByMatriculaId($value);

	public function queryByTurmaDisciplinaId($value);

	public function queryByNumNota($value);

	public function queryByConceito($value);

	public function queryByValor($value);


	public function deleteByMatriculaId($value);

	public function deleteByTurmaDisciplinaId($value);

	public function deleteByNumNota($value);

	public function deleteByConceito($value);

	public function deleteByValor($value);


}
?>